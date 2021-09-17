<?php
	class Advancedsearch_Model extends CI_Model
	{
		protected $table = 'zoning';
		protected $properties_table = 'nof5';
		protected $save_search = 'tbl_save_search';
		protected $users = 'tbl_users';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			date_default_timezone_set('Asia/Kolkata');
		}

	public function get_authors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('$this->table');

        return $query->result();
    }
	public function getAllZip(){
		$query = $this->db->get('zip');
		$result = $query->result_array();
		return  $result;
	}
	public function getAllZoning(){
		$query = $this->db->get('zoning');
		$result = $query->result_array();
		return  $result;
	}
	public function getAllProUse(){
		$query = $this->db->get('pro_use');
		$result = $query->result_array();
		return  $result;
	}
	public function getAllNeighborhood(){
		$query = $this->db->get('neighborhood');
		$result = $query->result_array();
		return  $result;
	}
	public function getAllward(){
		$query = $this->db->get('ward');
		$result = $query->result_array();
		return  $result;
	}
	public function getAllTaxDeduction(){
		$query = $this->db->get('tax_deduction');
		$result = $query->result_array();
		return  $result;
	}
	
   // Select total records
    public function getrecordCount($jsonPostData) {
		$unserialize = unserialize($jsonPostData);
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
		
		/*if(!empty($unserialize['property_owns_multiple'])){ 
			$where  .= " AND count >='3'";
		}*/
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
							$Sql ="SELECT *, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having;
							$query = $this->db->query($Sql);
							 $allcount = $query->num_rows();
							return  $allcount;
						}else{
							return  0;
				}
			  }else{ return  0;}
		}else{

				if(!empty($unserialize['place_id'])){
					$GetResult = $this->db->where('place_id',$unserialize['place_id'])->get($this->properties_table);
						$resultPremises = $GetResult->row_array();
						if(!empty($resultPremises['lat']) && !empty($resultPremises['lng'])){
							$lat = $resultPremises['lat'];
							$lon = $resultPremises['lng'];
							$having = " HAVING distance<='1'";
							$Sql ="SELECT *, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having;
							
							$query = $this->db->query($Sql);
							 $allcount = $query->num_rows();
							return  $allcount;
						}else{
							return  0;
				}
			  }else{

				$Sql ="select * from ".$this->properties_table.$where;
				$query = $this->db->query($Sql);
				$allcount = $query->num_rows();
				return  $allcount;
				}
			
		}
	 }

	//Save Search Data
	public function saveSearchData($jsonPostData){
	$searchName = 'zoningspace-'.rand();
	$post_array = $_POST;
	$totalrows =  $this->getrecordCount($jsonPostData);
	$search_data = json_encode($post_array);
	$single_record_id = 0;
	$empty_status = 0;
	$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'browser_id' => session_id(),
					'searchName' => $searchName,
					'search_data' => $search_data,
					'empty_status' => $empty_status,
					'single_record_id' => $single_record_id,
					'rowcount' => $totalrows,
					'created_date' => date("Y-m-d H:i:s")
				);
				
			$result = $this->db->insert('tbl_save_search', $data);
			$lastid = $this->db->insert_id();
			$updatesearchName = 'zoningspace-'.$lastid;
			$UpdateSql ="update tbl_save_search set searchName= '".$updatesearchName."' where search_id= '".$lastid."'";
		    $this->db->query($UpdateSql);
			if($_POST['mappage']=='1'){
				$lastid = $this->db->insert_id();
				if(!empty($lastid)) { return $lastid;}else{ return 0;}
				
			}else{
				if($result){ return 1;}else{ return 0;}
			}
	}
	

	function getLastSavedSearch(){
        $this->db->from('tbl_save_search');
        $this->db->order_by("search_id", "desc");
		if(!empty($this->session->userdata('user_id'))){ 
			$this->db->where('user_id', $this->session->userdata('user_id'));
		}else{
			$this->db->where('browser_id', session_id());
		}
        $this->db->where('user_id', $this->session->userdata('user_id'));
        //$this->db->where('single_record_id', 0);
        $this->db->where('status', 'pending');
        $query = $this->db->get();
        return $query->row_array();
    }
	
	
    // Select total records Buyer
    public function getrecordCountForSearch() {
		if(!empty($_POST['formdata'])){
			parse_str($_POST['formdata'], $searcharray);
		}
		$where  = ' where 1';
		if(!empty($searcharray['propertyCheck'])){
			 $propertyCheck =implode("','",$searcharray['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		
		
		if(!empty($searcharray['zoning'])){
			 $zoning =implode("','",$searcharray['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($searcharray['use'])){
			 $use =implode("','",$searcharray['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
			}
			if(!empty($searcharray['zip'])){
			 $zip =implode("','",$searcharray['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		    }
			if(!empty($searcharray['neighborhood'])){
			 $neighborhood =implode("','",$searcharray['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
			}
			if(!empty($searcharray['ward'])){
			 $ward =implode("','",$searcharray['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
			}
			if(!empty($searcharray['taxDeduction'])){
			 $taxDeduction =implode("','",$searcharray['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
			}
			if(!empty($searcharray['land_range_start']) && !empty($searcharray['land_range_end'])){
			$where  .= " AND (land_area >='".$searcharray['land_range_start']."' AND land_area <='".$searcharray['land_range_end']."')";
			}
			if(!empty($searcharray['fromSaleDate']) && !empty($searcharray['toSaleDate'])){
			$where  .= " AND (sale_date >='".$searcharray['fromSaleDate']."' AND sale_date <='".$searcharray['toSaleDate']."')";
		   }
		   if(!empty($searcharray['sale_price_start']) && $searcharray['sale_price_end']){ 
			$where  .= " AND (sale_price >='".$searcharray['sale_price_start']."' AND sale_price <='".$searcharray['sale_price_end']."')";
			}
		   
		   if(!empty($searcharray['taxable_value_start']) && $searcharray['taxable_value_end']){ 
			$where  .= " AND (taxable_value_total >='".$searcharray['taxable_value_start']."' AND taxable_value_total <='".$searcharray['taxable_value_end']."')";
			}
			if(!empty($searcharray['count_start']) && $searcharray['count_end']){ 
			$where  .= " AND (count >='".$searcharray['count_start']."' AND count <='".$searcharray['count_end']."')";
			}
			if(!empty($searcharray['square_feet_start']) && $searcharray['square_feet_end']){ 
			$where  .= " AND (square_feet >='".$searcharray['square_feet_start']."' AND square_feet <='".$searcharray['square_feet_end']."')";
			}
			if(!empty($searcharray['price_per_square_feet_start']) && $searcharray['price_per_square_feet_end']){ 
			$where  .= " AND (price_per_square_feet >='".$searcharray['price_per_square_feet_start']."' AND price_per_square_feet <='".$searcharray['price_per_square_feet_end']."')";
			}
			if(!empty($searcharray['year_renovated_start']) && $searcharray['year_renovated_end']){ 
			$where  .= " AND (year_renovated >='".$searcharray['year_renovated_start']."' AND year_renovated <='".$searcharray['year_renovated_end']."')";
			}
			if(!empty($searcharray['year_built_start']) && $searcharray['year_built_end']){ 
			$where  .= " AND (year_built >='".$searcharray['year_built_start']."' AND year_built <='".$searcharray['year_built_end']."')";
			}
		
			if(!empty($searcharray['beds']) && $searcharray['beds'] > 0){  
			$where  .= " AND beds ='".$searcharray['beds']."'";
			}
			if(!empty($searcharray['bath']) && $searcharray['bath'] > 0){ 
			$where  .= " AND bath ='".$searcharray['bath']."'";
			}
			if(!empty($searcharray['miles']) && !empty($searcharray['place_id'])){ 
				$GetResult = $this->db->where('place_id',$searcharray['place_id'])->get($this->properties_table);
						$resultPremises = $GetResult->row_array();
						if(!empty($resultPremises['lat']) && !empty($resultPremises['lng'])){
							$lat = $resultPremises['lat'];
							$lon = $resultPremises['lng'];
							$having = " HAVING distance<='".$searcharray['miles']."'";
							$Sql ="SELECT id,correct_address,short_address,long_address,zoning,pro_use,zip,land_area , ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where.$having ;
							$query = $this->db->query($Sql);
							$allcount = $query->num_rows();
							return  $allcount;
						}
			}else{
				  
				if(!empty($unserialize['place_id'])){
					$GetResult = $this->db->where('place_id',$unserialize['place_id'])->get($this->properties_table);
						$resultPremises = $GetResult->row_array();
						if(!empty($resultPremises['lat']) && !empty($resultPremises['lng'])){
							$lat = $resultPremises['lat'];
							$lon = $resultPremises['lng'];
							$having = " HAVING distance<='1'";
							$Sql ="SELECT *, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having;
							
							$query = $this->db->query($Sql);
							 $allcount = $query->num_rows();
							return  $allcount;
						}else{
							return  0;
				}
			  }else{
				$Sql ="select id,correct_address,short_address,long_address,zoning,pro_use,zip,land_area from ".$this->properties_table.$where;
				$query = $this->db->query($Sql);
				$allcount = $query->num_rows();
				return  $allcount;
				}

			}
		}
		public function getDataForSearch($rowno,$rowperpage) {
			if(!empty($_POST['formdata'])){
					parse_str($_POST['formdata'], $searcharray);
					
			}
			$where  = ' where 1';
			if(!empty($searcharray['propertyCheck'])){
			 $propertyCheck =implode("','",$searcharray['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		    }
			if(!empty($searcharray['zoning'])){
			 $zoning =implode("','",$searcharray['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
			}
			if(!empty($searcharray['use'])){
			 $use =implode("','",$searcharray['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
			}
			if(!empty($searcharray['zip'])){
			 $zip =implode("','",$searcharray['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		    }
			if(!empty($searcharray['neighborhood'])){
			 $neighborhood =implode("','",$searcharray['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
			}
			if(!empty($searcharray['ward'])){
			 $ward =implode("','",$searcharray['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
			}
			if(!empty($searcharray['taxDeduction'])){
			 $taxDeduction =implode("','",$searcharray['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
			}
			if(!empty($searcharray['land_range_start']) && !empty($searcharray['land_range_end'])){
			$where  .= " AND (land_area >='".$searcharray['land_range_start']."' AND land_area <='".$searcharray['land_range_end']."')";
			}
			if(!empty($searcharray['fromSaleDate']) && !empty($searcharray['toSaleDate'])){
			$where  .= " AND (sale_date >='".$searcharray['fromSaleDate']."' AND sale_date <='".$searcharray['toSaleDate']."')";
		   }
		    if(!empty($searcharray['sale_price_start']) && $searcharray['sale_price_end']){ 
			$where  .= " AND (sale_price >='".$searcharray['sale_price_start']."' AND sale_price <='".$searcharray['sale_price_end']."')";
			}
			if(!empty($searcharray['taxable_value_start']) && $searcharray['taxable_value_end']){ 
			$where  .= " AND (taxable_value_total >='".$searcharray['taxable_value_start']."' AND taxable_value_total <='".$searcharray['taxable_value_end']."')";
			}
			if(!empty($searcharray['count_start']) && $searcharray['count_end']){ 
			$where  .= " AND (count >='".$searcharray['count_start']."' AND count <='".$searcharray['count_end']."')";
		}
			if(!empty($searcharray['square_feet_start']) && $searcharray['square_feet_end']){ 
			$where  .= " AND (square_feet >='".$searcharray['square_feet_start']."' AND square_feet <='".$searcharray['square_feet_end']."')";
			}
			if(!empty($searcharray['price_per_square_feet_start']) && $searcharray['price_per_square_feet_end']){ 
			$where  .= " AND (price_per_square_feet >='".$searcharray['price_per_square_feet_start']."' AND price_per_square_feet <='".$searcharray['price_per_square_feet_end']."')";
			}
			if(!empty($searcharray['year_renovated_start']) && $searcharray['year_renovated_end']){ 
			$where  .= " AND (year_renovated >='".$searcharray['year_renovated_start']."' AND year_renovated <='".$searcharray['year_renovated_end']."')";
			}
			if(!empty($searcharray['year_built_start']) && $searcharray['year_built_end']){ 
			$where  .= " AND (year_built >='".$searcharray['year_built_start']."' AND year_built <='".$searcharray['year_built_end']."')";
			}
		
			if(!empty($searcharray['beds']) && $searcharray['beds'] > 0){  
			$where  .= " AND beds ='".$searcharray['beds']."'";
			}
			if(!empty($searcharray['bath']) && $searcharray['bath'] > 0){ 
			$where  .= " AND bath ='".$searcharray['bath']."'";
			}
			if(!empty($searcharray['miles']) && !empty($searcharray['place_id'])){ 
				$GetResult = $this->db->where('place_id',$searcharray['place_id'])->get($this->properties_table);
						$resultPremises = $GetResult->row_array();
						if(!empty($resultPremises['lat']) && !empty($resultPremises['lng'])){
							$lat = $resultPremises['lat'];
							$lon = $resultPremises['lng'];
							$having = " HAVING distance<='".$searcharray['miles']."'";
							$Sql ="SELECT id,correct_address,short_address,long_address,zoning,pro_use,zip,land_area , ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having. " ORDER BY ".$this->properties_table.".id DESC LIMIT ".$rowno." , ".$rowperpage;
							$query = $this->db->query($Sql);
							$numRow = $query->num_rows();
							$result = $query->result_array();
							return  $result;;
						}
			}  
			else{
				$Sql ="select id,correct_address,short_address,long_address,zoning,pro_use,zip,land_area from ".$this->properties_table.$where." ORDER BY ".$this->properties_table.".id DESC LIMIT ".$rowno." , ".$rowperpage;
				$query = $this->db->query($Sql);
				$numRow = $query->num_rows();
				$result = $query->result_array();
				return  $result;
			}
		}
		
		public function viewSingleRecord($id) {
			$id= base64_decode($id);
			$query = $this->db->where('id',$id)->get($this->properties_table);
			$result = $query->row_array();
			return  $result;
		}
		
		//Save Search Data
		public function saveSearch(){
		if(!empty($_POST['formdata'])){
			parse_str($_POST['formdata'], $searcharray);
		}
		$totalrows =  $this->getrecordCountForSearch();
		$data = array(
						
						'user_id' => $this->session->userdata('user_id'),
						'searchName' => $_POST['searchName'],
						'search_data' => json_encode($searcharray),
						'empty_status' => 0,
						'single_record_id' => 0,
						'rowcount' => $totalrows,
						'status' =>'save',
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
				if($result){ return 1;}else{ return 0;}
				
		}
		
		function updateUserid(){
			if(!empty($this->session->userdata('user_id'))){
				$date = array('user_id' => $this->session->userdata('user_id'));
				$this->db->where('browser_id', session_id());
				return $this->db->update($this->save_search, $date);
			}
    }
	
	
}