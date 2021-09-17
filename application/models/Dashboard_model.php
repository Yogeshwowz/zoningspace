<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
	
	protected $properties_table = 'nof5';
	protected $users = 'tbl_users';
	protected $save_search = 'tbl_save_search';
	
	
	
	public function getUsersInformation() {
		if( $this->session->userdata('roleId')==3){
			$query_1 = $this->db->select('createdBy')->where('userId',$this->session->userdata('user_id'))->get($this->users);
			$rId= $query_1->row_array();
			$id = 	$rId['createdBy'];
		}else{
			$id=  $this->session->userdata('user_id');
		}
		$query = $this->db->where('userId',$id)->get($this->users);
		return $query->row_array();
    }
	public function getMembers() {
        $query = $this->db->where('createdBy',$this->session->userdata('user_id'))->get($this->users);
		return $query->result_array();
    }
	
	
	//Buy Search Data
		public function buySearch(){
			$userData = $this->getUsersInformation();
		     $connects = $userData['connects'];
			 
			 
			
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $searcharray);
			}
			if(!empty($_POST['uncheckarr'])){
				$uncheckarr = json_encode($_POST['uncheckarr']);
			}else{
				$uncheckarr = '';
			}
			
			$searchName = 'zoningspace-'.rand();
			if(!empty($this->session->userdata('user_id'))){
				$status = 'complete';
			}else{
				$status = 'pending';
			}
			$data = array(
			   'browser_id' => session_id(),
				'user_id' => $this->session->userdata('user_id'),
				'searchName' => $searchName,
				'search_data' => json_encode($searcharray),
				'record_ids' => json_encode($_POST['checkrecordIds']),
				'empty_status' => 0,
				'connects' => $connects,
				'rowcount' => $_POST['allcount'],
				'allcount' => $_POST['allcount'],
				'Chkallcount' => $_POST['Chkallcount'],
				'uncheckarrCount' => $_POST['uncheckarrCount'],
				'uncheckarr' => $uncheckarr,
				'status' => $status,
				'created_date' => date("Y-m-d H:i:s")
			);
			if( $this->session->userdata('roleId')==3){
					$query_1 = $this->db->select('createdBy')->where('userId',$this->session->userdata('user_id'))->get($this->users);
					$rId= $query_1->row_array();
					$id = 	$rId['createdBy'];
					$data['company_id'] = 	$rId['createdBy'];
				}else{
					$id=  $this->session->userdata('user_id');
					$data['company_id'] = 	$this->session->userdata('user_id');
				}
			 
			 
			 
			
			$result = $this->db->insert($this->save_search, $data);
			if($result){ 
				if($connects >0){
				$leftConnets = $connects - $_POST['Chkallcount'];
				$UpdateSql ="update ".$this->users." set connects= '".$leftConnets."' where userId = '".$id."'";
				    $this->db->query($UpdateSql);
				}
				
				return 1;
			}else{ return 0;}
				
		}
	
	// Buy search Record
	function getbuySearch(){
		if( $this->session->userdata('roleId')==2){
			$where = "(user_id='".$this->session->userdata('user_id')."' OR company_id='".$this->session->userdata('user_id')."')";						
		}else{
				$where = " user_id='".$this->session->userdata('user_id')."'";
		}
		$where .= " And allcount > 0";
		$this->db->from($this->save_search);
		$this->db->order_by('search_id','desc');
        //$this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where($where);
        $this->db->where('status', 'complete');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	// Select total records
    public function downloadBuySearchRecord() {
		//error_reporting(1);
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		$array = array();
		$id = $_POST['sid'];
	
		$query = $this->db->where('search_id',$id)->get($this->save_search);
		$result = $query->row_array();
		
		$myObj = json_decode($result['search_data']);
		$unserialize = (array) $myObj;
		
		if($unserialize['Chkall']==1){
		$where  = ' where 1';
		if(!empty($unserialize['propertyCheck'])){
			 $propertyCheck =implode("','",$unserialize['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		if(!empty($unserialize['zip'])){
			 $zip =implode("','",$unserialize['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		}
		if(!empty($unserialize['use'])){
			 $use =implode("','",$unserialize['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
		}
		if(!empty($unserialize['zoning'])){
			 $zoning =implode("','",$unserialize['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($unserialize['neighborhood'])){
			 $neighborhood =implode("','",$unserialize['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
		}
		if(!empty($unserialize['ward'])){
			 $ward =implode("','",$unserialize['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
		}
		if(!empty($unserialize['taxDeduction'])){
			 $taxDeduction =implode("','",$unserialize['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
		}
		if(!empty($unserialize['land_range_start']) && !empty($unserialize['land_range_end'])){
			$where  .= " AND (land_area >='".$unserialize['land_range_start']."' AND land_area <='".$_POST['land_range_end']."')";
		}
		
		if(!empty($unserialize['simplesearch']) && !empty($unserialize['searchbox'])){
			 $where  .= " AND premises like '%".$_POST['searchbox']."%'";
		}
		if(!empty($unserialize['fromSaleDate']) && !empty($unserialize['toSaleDate']) ){ 
				$where  .= " AND (sale_date >='".$unserialize['fromSaleDate']."' AND sale_date <='".$unserialize['toSaleDate']."')";
			
		}
		if(!empty($unserialize['sale_price_start']) && $unserialize['sale_price_end']){ 
			$where  .= " AND (sale_price >='".$unserialize['sale_price_start']."' AND sale_price <='".$unserialize['sale_price_end']."')";
		}
		if(!empty($unserialize['taxable_value_start']) && $unserialize['taxable_value_end']){ 
			$where  .= " AND (taxable_value_total >='".$unserialize['taxable_value_start']."' AND taxable_value_total <='".$unserialize['taxable_value_end']."')";
		}
		if(!empty($unserialize['count_start']) && $unserialize['count_end']){ 
			$where  .= " AND (count >='".$unserialize['count_start']."' AND count <='".$unserialize['count_end']."')";
		}
		if(!empty($unserialize['square_feet_start']) && $unserialize['square_feet_end']){ 
			$where  .= " AND (square_feet >='".$unserialize['square_feet_start']."' AND square_feet <='".$unserialize['square_feet_end']."')";
		}
		if(!empty($unserialize['price_per_square_feet_start']) && $unserialize['price_per_square_feet_end']){ 
			$where  .= " AND (price_per_square_feet >='".$unserialize['price_per_square_feet_start']."' AND price_per_square_feet <='".$unserialize['price_per_square_feet_end']."')";
		}
		
		if(!empty($unserialize['year_renovated_start']) && $unserialize['year_renovated_end']){ 
			$where  .= " AND (year_renovated >='".$unserialize['year_renovated_start']."' AND year_renovated <='".$unserialize['year_renovated_end']."')";
		}
		if(!empty($unserialize['year_built_start']) && $unserialize['year_built_end']){ 
			$where  .= " AND (year_built >='".$unserialize['year_built_start']."' AND year_built <='".$unserialize['year_built_end']."')";
		}
		
		if(!empty($unserialize['beds']) && $unserialize['beds'] > 0){  
			$where  .= " AND beds ='".$unserialize['beds']."'";
		}
		if(!empty($unserialize['bath']) && $unserialize['bath'] > 0){ 
			$where  .= " AND bath ='".$unserialize['bath']."'";
		}
		
			
		if(!empty($unserialize['miles']) && !empty($unserialize['place_id'])){ 
			if(!empty($unserialize['place_id'])){
					$GetResult = $this->db->where('place_id',$unserialize['place_id'])->get($this->properties_table);
						$resultPremises = $GetResult->row_array();
						if(!empty($resultPremises['lat']) && !empty($resultPremises['lng'])){
							$lat = $resultPremises['lat'];
							$lon = $resultPremises['lng'];
							$having = " HAVING distance<='".$unserialize['miles']."'";
							$Sql ="SELECT id, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having;
							$query = $this->db->query($Sql);
							 $allcount = $query->num_rows();
							$result_d = $query->result_array();
							
						}else{
							return  0;
				}
			  }else{ return  0;}
		}else{
				$Sql ="select id from ".$this->properties_table.$where;
				
				$query = $this->db->query($Sql);
				$allcount = $query->num_rows();
				$result_d = $query->result_array();
		}
		
		
		foreach($result_d as $result_d){
			$array[] =$result_d['id'];
		}
		if(!empty($result['uncheckarr'])){
			$uncheckarr = json_decode($result['uncheckarr']);
			$leftresult=array_diff($array,$uncheckarr);
		}else{
			$leftresult = $array;
		}
		
        $UpdateSql ="update tbl_save_search set record_ids= '".json_encode($leftresult)."' where search_id= '".$id."'";
		$this->db->query($UpdateSql);
		
		$Searchid = implode(',',$leftresult);
		$whereR =" where id In(".$Searchid.")";
		
		$SqlR ="select * from ".$this->properties_table.$whereR;
		
				$queryR = $this->db->query($SqlR);
				$allcount = $queryR->num_rows();
				return $resultR = $queryR->result_array();
			
		}else{
			$Searchid = implode(',',$unserialize['checkrecords']);
			$whereR =" where id In(".$Searchid.")";
			$SqlR ="select * from ".$this->properties_table.$whereR;
			$queryR = $this->db->query($SqlR);
			$allcount = $queryR->num_rows();
			return $resultR = $queryR->result_array();
		}
		
	 }
	 public function purchasedDataList($id) {
		//error_reporting(1);
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		$array = array();
		//$id = $_POST['sid'];
	
		$query = $this->db->where('search_id',$id)->get($this->save_search);
		$result = $query->row_array();
		
		$myObj = json_decode($result['search_data']);
		$unserialize = (array) $myObj;
		
		if($unserialize['Chkall']==1){
		$where  = ' where 1';
		if(!empty($unserialize['propertyCheck'])){
			 $propertyCheck =implode("','",$unserialize['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		if(!empty($unserialize['zip'])){
			 $zip =implode("','",$unserialize['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		}
		if(!empty($unserialize['use'])){
			 $use =implode("','",$unserialize['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
		}
		if(!empty($unserialize['zoning'])){
			 $zoning =implode("','",$unserialize['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($unserialize['neighborhood'])){
			 $neighborhood =implode("','",$unserialize['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
		}
		if(!empty($unserialize['ward'])){
			 $ward =implode("','",$unserialize['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
		}
		if(!empty($unserialize['taxDeduction'])){
			 $taxDeduction =implode("','",$unserialize['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
		}
		if(!empty($unserialize['land_range_start']) && !empty($unserialize['land_range_end'])){
			$where  .= " AND (land_area >='".$unserialize['land_range_start']."' AND land_area <='".$_POST['land_range_end']."')";
		}
		
		if(!empty($unserialize['simplesearch']) && !empty($unserialize['searchbox'])){
			 $where  .= " AND premises like '%".$_POST['searchbox']."%'";
		}
		if(!empty($unserialize['fromSaleDate']) && !empty($unserialize['toSaleDate']) ){ 
				$where  .= " AND (sale_date >='".$unserialize['fromSaleDate']."' AND sale_date <='".$unserialize['toSaleDate']."')";
			
		}
		if(!empty($unserialize['sale_price_start']) && $unserialize['sale_price_end']){ 
			$where  .= " AND (sale_price >='".$unserialize['sale_price_start']."' AND sale_price <='".$unserialize['sale_price_end']."')";
		}
		if(!empty($unserialize['taxable_value_start']) && $unserialize['taxable_value_end']){ 
			$where  .= " AND (taxable_value_total >='".$unserialize['taxable_value_start']."' AND taxable_value_total <='".$unserialize['taxable_value_end']."')";
		}
		if(!empty($unserialize['count_start']) && $unserialize['count_end']){ 
			$where  .= " AND (count >='".$unserialize['count_start']."' AND count <='".$unserialize['count_end']."')";
		}
		if(!empty($unserialize['square_feet_start']) && $unserialize['square_feet_end']){ 
			$where  .= " AND (square_feet >='".$unserialize['square_feet_start']."' AND square_feet <='".$unserialize['square_feet_end']."')";
		}
		if(!empty($unserialize['price_per_square_feet_start']) && $unserialize['price_per_square_feet_end']){ 
			$where  .= " AND (price_per_square_feet >='".$unserialize['price_per_square_feet_start']."' AND price_per_square_feet <='".$unserialize['price_per_square_feet_end']."')";
		}
		
		if(!empty($unserialize['year_renovated_start']) && $unserialize['year_renovated_end']){ 
			$where  .= " AND (year_renovated >='".$unserialize['year_renovated_start']."' AND year_renovated <='".$unserialize['year_renovated_end']."')";
		}
		if(!empty($unserialize['year_built_start']) && $unserialize['year_built_end']){ 
			$where  .= " AND (year_built >='".$unserialize['year_built_start']."' AND year_built <='".$unserialize['year_built_end']."')";
		}
		
		if(!empty($unserialize['beds']) && $unserialize['beds'] > 0){  
			$where  .= " AND beds ='".$unserialize['beds']."'";
		}
		if(!empty($unserialize['bath']) && $unserialize['bath'] > 0){ 
			$where  .= " AND bath ='".$unserialize['bath']."'";
		}
		
			
		if(!empty($unserialize['miles']) && !empty($unserialize['place_id'])){ 
			if(!empty($unserialize['place_id'])){
					$GetResult = $this->db->where('place_id',$unserialize['place_id'])->get($this->properties_table);
						$resultPremises = $GetResult->row_array();
						if(!empty($resultPremises['lat']) && !empty($resultPremises['lng'])){
							$lat = $resultPremises['lat'];
							$lon = $resultPremises['lng'];
							$having = " HAVING distance<='".$unserialize['miles']."'";
							$Sql ="SELECT id, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having;
							$query = $this->db->query($Sql);
							 $allcount = $query->num_rows();
							$result_d = $query->result_array();
							
						}else{
							return  0;
				}
			  }else{ return  0;}
		}else{
				$Sql ="select id from ".$this->properties_table.$where;
				
				$query = $this->db->query($Sql);
				$allcount = $query->num_rows();
				$result_d = $query->result_array();
		}
		
		
		foreach($result_d as $result_d){
			$array[] =$result_d['id'];
		}
		if(!empty($result['uncheckarr'])){
			$uncheckarr = json_decode($result['uncheckarr']);
			$leftresult=array_diff($array,$uncheckarr);
		}else{
			$leftresult = $array;
		}
		
        $UpdateSql ="update tbl_save_search set record_ids= '".json_encode($leftresult)."' where search_id= '".$id."'";
		$this->db->query($UpdateSql);
		
		$Searchid = implode(',',$leftresult);
		$whereR =" where id In(".$Searchid.")";
		
		$SqlR ="select id,correct_address,short_address,long_address,zoning,pro_use,zip,land_area from ".$this->properties_table.$whereR;
		
				$queryR = $this->db->query($SqlR);
				$allcount = $queryR->num_rows();
				return $resultR = $queryR->result_array();
			
		}else{
			$Searchid = implode(',',$unserialize['checkrecords']);
			$whereR =" where id In(".$Searchid.")";
			$SqlR ="select id,correct_address,short_address,long_address,zoning,pro_use,zip,land_area from ".$this->properties_table.$whereR;
			$queryR = $this->db->query($SqlR);
			$allcount = $queryR->num_rows();
			return $resultR = $queryR->result_array();
		}
		
	 }
	public function viewPurchasedDataSingleRecord($id) {
			$id= base64_decode($id);
			$query = $this->db->where('id',$id)->get($this->properties_table);
			$result = $query->row_array();
			return  $result;
	}
	public function getMemberInformation($id) {
		$query = $this->db->where('userId',$id)->get($this->users);
		return $query->row_array();
    }
	function deleteMember(){
		$mid = $this->input->post('mid');
		$this->db->where('userId', $mid);
        return $this->db->delete($this->users);
    }
	
	function getSaveSearch(){
		if( $this->session->userdata('roleId')==2){
			$where = "(user_id='".$this->session->userdata('user_id')."' OR company_id='".$this->session->userdata('user_id')."')";						
		}else{
				$where = " user_id='".$this->session->userdata('user_id')."'";
		}
		$this->db->from($this->save_search);
		 $this->db->where($where);
        $this->db->where('status', 'save');
        $query = $this->db->get();
        return $query->result_array();
    }
	public function buySearchforFirstTime(){
			$userData = $this->getUsersInformation();
		    $connects = $userData['connects'];
			 
		$this->db->from('tbl_save_search');
        $this->db->order_by("search_id", "desc");
		if(!empty($this->session->userdata('user_id'))){ 
			$this->db->where('user_id', $this->session->userdata('user_id'));
		}else{
			$this->db->where('browser_id', session_id());
		}
       $this->db->where('status', 'pending');
       $query = $this->db->get();
       $searchdata = $query->row_array();
	   if($connects >0){
		  $leftConnets = $connects - $searchdata['Chkallcount'];
			$UpdateSql ="update ".$this->users." set connects= '".$leftConnets."' where userId = '".$this->session->userdata('user_id')."'";
			$this->db->query($UpdateSql);
			$Updatesqll ="update ".$this->save_search." set status= 'complete' where search_id = '".$searchdata['search_id']."'";
			$this->db->query($Updatesqll);
		}
			 
		}
		
		function getPurchasedSearch(){
		if( $this->session->userdata('roleId')==2){
			$where = "(user_id='".$this->session->userdata('user_id')."' OR company_id='".$this->session->userdata('user_id')."')";						
		}else{
				$where = " user_id='".$this->session->userdata('user_id')."'";
		}
		$where .= " And allcount > 0";
		$this->db->from($this->save_search);
		 $this->db->where($where);
        $this->db->where('status', 'complete');
        $query = $this->db->get();
        return $query->result_array();
    }
	
}

  