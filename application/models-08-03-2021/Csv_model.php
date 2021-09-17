<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Csv_model extends CI_Model{
	
		protected $properties_table = 'nof5';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			date_default_timezone_set('Asia/Kolkata');
		}
	// Get Save Search 
    function CreateCsvFile(){
		$searchid = $_POST['searchid'];
		$single_record_id = $_POST['single_record_id'];
		$this->db->from('tbl_save_search');
       if(!empty($this->session->userdata('user_id'))){  $this->db->where('user_id', $this->session->userdata('user_id'));}else{}
      
        $this->db->where('search_id', $searchid);
        $this->db->where('status', 'complete');
        $query = $this->db->get();
        $Record = $query->row_array();
		
		if($single_record_id ==0){
			$myObj = json_decode($Record['search_data']);
			$GetRecord = (array) $myObj;
		}
			
		$userId =$Record['user_id'];
		//Applied Search Data//
		$ResultArray = array();
		$ResultArray['userID'] = $userId;
		if($single_record_id ==0){
			$where  = ' where 1';
		}else{
			$where  = ' where id='.$single_record_id;
		}
		
		if(!empty($GetRecord['propertyCheck'])){
			 $propertyCheck =implode("','",$GetRecord['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		if(!empty($GetRecord['zip'])){
			 $zip =implode("','",$GetRecord['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		}
		if(!empty($GetRecord['use'])){
			 $use =implode("','",$GetRecord['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
		}
		if(!empty($GetRecord['zoning'])){
			 $zoning =implode("','",$GetRecord['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($GetRecord['neighborhood'])){
			 $neighborhood =implode("','",$GetRecord['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
		}
		if(!empty($GetRecord['ward'])){
			 $ward =implode("','",$GetRecord['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
		}
		if(!empty($GetRecord['taxDeduction'])){
			 $taxDeduction =implode("','",$GetRecord['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
		}
		if(!empty($GetRecord['land_range_start']) && !empty($GetRecord['land_range_end'])){
			
			 $where  .= " AND (land_area >='".$GetRecord['land_range_start']."' OR land_area <='".$GetRecord['land_range_end']."')";
		}
		if(!empty($GetRecord['fromSaleDate']) && !empty($GetRecord['toSaleDate'])){
			
			// $where  .= " AND (sale_date >='".$GetRecord['fromSaleDate']."' OR sale_date <='".$GetRecord['toSaleDate']."')";
		}
		
		if(!empty($GetRecord['simplesearch']) && !empty($GetRecord['searchbox'])){
			 
			 $where  .= " AND address like '%".$GetRecord['searchbox']."%'";
		}
		
		if(!empty($GetRecord['square_start']) && !empty($GetRecord['square_end'])){
			$where  .= " AND (square_feet >='".$GetRecord['square_start']."' OR square_feet <='".$GetRecord['square_end']."')";
		}
		if(!empty($GetRecord['simplesearch']) && !empty($GetRecord['searchbox'])){
			 
			 $where  .= " AND address like '%".$GetRecord['searchbox']."%'";
		}
		
			if(!empty($GetRecord['sale_price_start']) && $GetRecord['sale_price_end']){ 
			$where  .= " AND (sale_price >='".$GetRecord['sale_price_start']."' OR sale_price <='".$GetRecord['sale_price_end']."')";
		}
		if(!empty($GetRecord['taxable_value_start']) && $GetRecord['taxable_value_end']){ 
			$where  .= " AND (taxable_value_total >='".$GetRecord['taxable_value_start']."' OR taxable_value_total <='".$GetRecord['taxable_value_end']."')";
		}
		if(!empty($GetRecord['count_start']) && $GetRecord['count_end']){ 
			$where  .= " AND (count >='".$GetRecord['count_start']."' OR count <='".$GetRecord['count_end']."')";
		}
		if(!empty($GetRecord['square_feet_start']) && $GetRecord['square_feet_end']){ 
			$where  .= " AND (square_feet >='".$GetRecord['square_feet_start']."' OR square_feet <='".$GetRecord['square_feet_end']."')";
		}
		if(!empty($GetRecord['price_per_square_feet_start']) && $GetRecord['price_per_square_feet_end']){ 
			$where  .= " AND (price_per_square_feet >='".$GetRecord['price_per_square_feet_start']."' OR price_per_square_feet <='".$GetRecord['price_per_square_feet_end']."')";
		}
		
		if(!empty($GetRecord['year_renovated_start']) && $GetRecord['year_renovated_end']){ 
			$where  .= " AND (year_renovated >='".$GetRecord['year_renovated_start']."' OR year_renovated <='".$GetRecord['year_renovated_end']."')";
		}
		if(!empty($GetRecord['year_built_start']) && $GetRecord['year_built_end']){ 
			$where  .= " AND (year_built >='".$GetRecord['year_built_start']."' OR year_built <='".$GetRecord['year_built_end']."')";
		}
		
		if(!empty($GetRecord['beds']) && $GetRecord['beds'] > 0){  
			$where  .= " AND beds ='".$GetRecord['beds']."'";
		}
		if(!empty($GetRecord['bath']) && $GetRecord['bath'] > 0){ 
			$where  .= " AND bath ='".$GetRecord['bath']."'";
		}
		
			if(!empty($GetRecord['miles']) && !empty($GetRecord['searchboxForAddress'])){ 
				$GetResult = $this->db->where('premises',$GetRecord['searchboxForAddress'])->get($this->properties_table);
				$resultPremises = $GetResult->row_array();
				$lat = $resultPremises['lat'];
				$lon = $resultPremises['lng'];
				$having = " HAVING distance<='".$GetRecord['miles']."'";
				 $Sql ="SELECT ".$this->properties_table.".*,
			CONCAT_WS(',', 
				NULLIF(phone1,''), 
				NULLIF(phone2,''),
				NULLIF(phone3,''),
				NULLIF(phone4,''),
				NULLIF(phone5,''),
				NULLIF(phone6,''),
				NULLIF(phone7,''),
				NULLIF(phone8,''),
				NULLIF(phone9,'')
			) AS contactPhone,
			CONCAT_WS(',', 
				NULLIF(email1,''), 
				NULLIF(email2,''),
				NULLIF(email3,''),
				NULLIF(email4,'')
			)  AS contactEmail, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having. $orderBy;
		}else{
			$Sql ="select ".$this->properties_table.".*,
			CONCAT_WS(',', 
				NULLIF(phone1,''), 
				NULLIF(phone2,''),
				NULLIF(phone3,''),
				NULLIF(phone4,''),
				NULLIF(phone5,''),
				NULLIF(phone6,''),
				NULLIF(phone7,''),
				NULLIF(phone8,''),
				NULLIF(phone9,'')
			) AS contactPhone,
			CONCAT_WS(',', 
				NULLIF(email1,''), 
				NULLIF(email2,''),
				NULLIF(email3,''),
				NULLIF(email4,'')
			)  AS contactEmail

		from  ".$this->properties_table.$where." limit 0,85000";
		}
		
		
		error_reporting(1);
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		$query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		$result = $query->result_array();
		$ResultArray['result'] = $result;
		return  $ResultArray;
	}
	function DownloadSearchDataForReSearcherEmpty(){
		ini_set('memory_limit', '-1');
		/* $Sql ="select 	* from  ".$this->properties_table." where (phone1= '' OR phone2= '' OR phone3= '' OR phone4= '' OR phone5= '' OR phone6= '' OR phone7= '' OR phone8= '' OR phone9= '') And  (email1='' OR email2= '' OR email3= '' OR email4= '')";
		 $query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		$result = $query->result_array();
		return $result;*/
		
	    echo $Sql ="select ".$this->properties_table.".*,
			CONCAT_WS(',', 
				NULLIF(phone1,''), 
				NULLIF(phone2,''),
				NULLIF(phone2,''),
				NULLIF(phone3,''),
				NULLIF(phone4,''),
				NULLIF(phone5,''),
				NULLIF(phone6,''),
				NULLIF(phone7,''),
				NULLIF(phone8,''),
				NULLIF(phone9,'')
			) 
			AS contactPhone from  
		
		".$this->properties_table."  where (phone1= '' OR phone2= '' OR phone3= '' OR phone4= '' OR phone5= '' OR phone6= '' OR phone7= '' OR phone8= '' OR phone9= '') And  (email1='' OR email2= '' OR email3= '' OR email4= '')";
	die();
		$query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		$result = $query->result_array();
		return $result;
    }





// Get Save Search 
    function CreateCsvFilelimit5(){
	set_time_limit(0);
		$searchid = $_POST['searchid'];
		$single_record_id = $_POST['single_record_id'];
		$this->db->from('tbl_save_search');
       if(!empty($this->session->userdata('user_id'))){ 
			$this->db->where('user_id', $this->session->userdata('user_id'));
		}else{
			$this->db->where('browser_id', session_id());
		}
        $this->db->where('search_id', $searchid);
        $this->db->where('status', 'pending');
        $query = $this->db->get();
        $Record = $query->row_array();
		
		if($single_record_id ==0){
			$myObj = json_decode($Record['search_data']);
			$GetRecord = (array) $myObj;
		}
		
		
		$userId =$Record['user_id'];
		//Applied Search Data//
		$ResultArray = array();
		$ResultArray['userID'] = $userId;
		if($single_record_id ==0){
			$where  = ' where 1 ';
		}else{
			$where  = ' where id='.$single_record_id;
		}
		
		if(!empty($GetRecord['propertyCheck'])){
			 $propertyCheck =implode("','",$GetRecord['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		if(!empty($GetRecord['zip'])){
			 $zip =implode("','",$GetRecord['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		}
		if(!empty($GetRecord['use'])){
			 $use =implode("','",$GetRecord['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
		}
		if(!empty($GetRecord['zoning'])){
			 $zoning =implode("','",$GetRecord['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($GetRecord['neighborhood'])){
			 $neighborhood =implode("','",$GetRecord['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
		}
		if(!empty($GetRecord['ward'])){
			 $ward =implode("','",$GetRecord['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
		}
		if(!empty($GetRecord['taxDeduction'])){
			 $taxDeduction =implode("','",$GetRecord['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
		}
		if(!empty($GetRecord['land_range_start']) && !empty($GetRecord['land_range_end'])){
			
			 $where  .= " AND (land_area >='".$GetRecord['land_range_start']."' OR land_area <='".$GetRecord['land_range_end']."')";
		}
		if(!empty($GetRecord['fromSaleDate']) && !empty($GetRecord['toSaleDate'])){
			
			// $where  .= " AND (sale_date >='".$GetRecord['fromSaleDate']."' OR sale_date <='".$GetRecord['toSaleDate']."')";
		}
		if(!empty($GetRecord['square_start']) && !empty($GetRecord['square_end'])){
			$where  .= " AND (square_feet >='".$GetRecord['square_start']."' OR square_feet <='".$GetRecord['square_end']."')";
		}
		if(!empty($GetRecord['simplesearch']) && !empty($GetRecord['searchbox'])){
			 
			 $where  .= " AND address like '%".$GetRecord['searchbox']."%'";
		}
		
			if(!empty($GetRecord['sale_price_start']) && $GetRecord['sale_price_end']){ 
			$where  .= " AND (sale_price >='".$GetRecord['sale_price_start']."' OR sale_price <='".$GetRecord['sale_price_end']."')";
		}
		if(!empty($GetRecord['taxable_value_start']) && $GetRecord['taxable_value_end']){ 
			$where  .= " AND (taxable_value_total >='".$GetRecord['taxable_value_start']."' OR taxable_value_total <='".$GetRecord['taxable_value_end']."')";
		}
		if(!empty($GetRecord['count_start']) && $GetRecord['count_end']){ 
			$where  .= " AND (count >='".$GetRecord['count_start']."' OR count <='".$GetRecord['count_end']."')";
		}
		if(!empty($GetRecord['square_feet_start']) && $GetRecord['square_feet_end']){ 
			$where  .= " AND (square_feet >='".$GetRecord['square_feet_start']."' OR square_feet <='".$GetRecord['square_feet_end']."')";
		}
		if(!empty($GetRecord['price_per_square_feet_start']) && $GetRecord['price_per_square_feet_end']){ 
			$where  .= " AND (price_per_square_feet >='".$GetRecord['price_per_square_feet_start']."' OR price_per_square_feet <='".$GetRecord['price_per_square_feet_end']."')";
		}
		
		if(!empty($GetRecord['year_renovated_start']) && $GetRecord['year_renovated_end']){ 
			$where  .= " AND (year_renovated >='".$GetRecord['year_renovated_start']."' OR year_renovated <='".$GetRecord['year_renovated_end']."')";
		}
		if(!empty($GetRecord['year_built_start']) && $GetRecord['year_built_end']){ 
			$where  .= " AND (year_built >='".$GetRecord['year_built_start']."' OR year_built <='".$GetRecord['year_built_end']."')";
		}
		
		if(!empty($GetRecord['beds']) && $GetRecord['beds'] > 0){  
			$where  .= " AND beds ='".$GetRecord['beds']."'";
		}
		if(!empty($GetRecord['bath']) && $GetRecord['bath'] > 0){ 
			$where  .= " AND bath ='".$GetRecord['bath']."'";
		}
			if(!empty($GetRecord['miles']) && !empty($GetRecord['searchboxForAddress'])){ 
				$GetResult = $this->db->where('premises',$GetRecord['searchboxForAddress'])->get($this->properties_table);
				$resultPremises = $GetResult->row_array();
				$lat = $resultPremises['lat'];
				$lon = $resultPremises['lng'];
				$having = " HAVING distance<='".$GetRecord['miles']."'";
				 $Sql ="SELECT ".$this->properties_table.".*,
			CONCAT_WS(',', 
				NULLIF(phone1,''), 
				NULLIF(phone2,''),
				NULLIF(phone3,''),
				NULLIF(phone4,''),
				NULLIF(phone5,''),
				NULLIF(phone6,''),
				NULLIF(phone7,''),
				NULLIF(phone8,''),
				NULLIF(phone9,'')
			) AS contactPhone,
			CONCAT_WS(',', 
				NULLIF(email1,''), 
				NULLIF(email2,''),
				NULLIF(email3,''),
				NULLIF(email4,'')
			)  AS contactEmail, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having. $orderBy ." limit 0,5";
		}else{
				$Sql ="select ".$this->properties_table.".*,
			CONCAT_WS(',', 
				NULLIF(phone1,''), 
				NULLIF(phone2,''),
				NULLIF(phone3,''),
				NULLIF(phone4,''),
				NULLIF(phone5,''),
				NULLIF(phone6,''),
				NULLIF(phone7,''),
				NULLIF(phone8,''),
				NULLIF(phone9,'')
			) AS contactPhone,
			CONCAT_WS(',', 
				NULLIF(email1,''), 
				NULLIF(email2,''),
				NULLIF(email3,''),
				NULLIF(email4,'')
			)  AS contactEmail

		from  ".$this->properties_table.$where ." limit 0,5";
		}
		
		
		
		
		//error_reporting(1);
		ini_set('memory_limit', '-1');
		//$Sql ="select * from  ".$this->properties_table.$where;
		/*$Sql ="select ".$this->properties_table.".*,
			CONCAT_WS(',', 
				NULLIF(phone1,''), 
				NULLIF(phone2,''),
				NULLIF(phone3,''),
				NULLIF(phone4,''),
				NULLIF(phone5,''),
				NULLIF(phone6,''),
				NULLIF(phone7,''),
				NULLIF(phone8,''),
				NULLIF(phone9,'')
			) AS contactPhone,
			CONCAT_WS(',', 
				NULLIF(email1,''), 
				NULLIF(email2,''),
				NULLIF(email3,''),
				NULLIF(email4,'')
			)  AS contactEmail

		from  ".$this->properties_table.$where;*/
		$query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		$result = $query->result_array();
		$ResultArray['result'] = $result;
		return  $ResultArray;
	}
	
	
	
	  function CreateCsvFileForResearcher(){
		$searchid = $_POST['searchid'];
		$single_record_id = $_POST['single_record_id'];
		$this->db->from('tbl_save_search');
       if(!empty($this->session->userdata('user_id'))){  $this->db->where('user_id', $this->session->userdata('user_id'));}else{}
      
        $this->db->where('search_id', $searchid);
        $this->db->where('status', 'complete');
        $query = $this->db->get();
        $Record = $query->row_array();
		
		if($single_record_id ==0){
			$myObj = json_decode($Record['search_data']);
			$GetRecord = (array) $myObj;
		}
			
		$userId =$Record['user_id'];
		//Applied Search Data//
		$ResultArray = array();
		$ResultArray['userID'] = $userId;
		if($single_record_id ==0){
			$where  = ' where 1';
		}else{
			$where  = ' where id='.$single_record_id;
		}
		
		if(!empty($GetRecord['propertyCheck'])){
			 $propertyCheck =implode("','",$GetRecord['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		if(!empty($GetRecord['zip'])){
			 $zip =implode("','",$GetRecord['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		}
		if(!empty($GetRecord['use'])){
			 $use =implode("','",$GetRecord['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
		}
		if(!empty($GetRecord['zoning'])){
			 $zoning =implode("','",$GetRecord['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($GetRecord['neighborhood'])){
			 $neighborhood =implode("','",$GetRecord['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
		}
		if(!empty($GetRecord['ward'])){
			 $ward =implode("','",$GetRecord['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
		}
		if(!empty($GetRecord['taxDeduction'])){
			 $taxDeduction =implode("','",$GetRecord['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
		}
		if(!empty($GetRecord['land_range_start']) && !empty($GetRecord['land_range_end'])){
			
			 $where  .= " AND (land_area >='".$GetRecord['land_range_start']."' OR land_area <='".$GetRecord['land_range_end']."')";
		}
		if(!empty($GetRecord['fromSaleDate']) && !empty($GetRecord['toSaleDate'])){
			
			// $where  .= " AND (sale_date >='".$GetRecord['fromSaleDate']."' OR sale_date <='".$GetRecord['toSaleDate']."')";
		}
		
		if(!empty($GetRecord['simplesearch']) && !empty($GetRecord['searchbox'])){
			 
			 $where  .= " AND address like '%".$GetRecord['searchbox']."%'";
		}
		
		if(!empty($GetRecord['square_start']) && !empty($GetRecord['square_end'])){
			$where  .= " AND (square_feet >='".$GetRecord['square_start']."' OR square_feet <='".$GetRecord['square_end']."')";
		}
		if(!empty($GetRecord['simplesearch']) && !empty($GetRecord['searchbox'])){
			 
			 $where  .= " AND address like '%".$GetRecord['searchbox']."%'";
		}
		
			if(!empty($GetRecord['sale_price_start']) && $GetRecord['sale_price_end']){ 
			$where  .= " AND (sale_price >='".$GetRecord['sale_price_start']."' OR sale_price <='".$GetRecord['sale_price_end']."')";
		}
		if(!empty($GetRecord['taxable_value_start']) && $GetRecord['taxable_value_end']){ 
			$where  .= " AND (taxable_value_total >='".$GetRecord['taxable_value_start']."' OR taxable_value_total <='".$GetRecord['taxable_value_end']."')";
		}
		if(!empty($GetRecord['count_start']) && $GetRecord['count_end']){ 
			$where  .= " AND (count >='".$GetRecord['count_start']."' OR count <='".$GetRecord['count_end']."')";
		}
		if(!empty($GetRecord['square_feet_start']) && $GetRecord['square_feet_end']){ 
			$where  .= " AND (square_feet >='".$GetRecord['square_feet_start']."' OR square_feet <='".$GetRecord['square_feet_end']."')";
		}
		if(!empty($GetRecord['price_per_square_feet_start']) && $GetRecord['price_per_square_feet_end']){ 
			$where  .= " AND (price_per_square_feet >='".$GetRecord['price_per_square_feet_start']."' OR price_per_square_feet <='".$GetRecord['price_per_square_feet_end']."')";
		}
		
		if(!empty($GetRecord['year_renovated_start']) && $GetRecord['year_renovated_end']){ 
			$where  .= " AND (year_renovated >='".$GetRecord['year_renovated_start']."' OR year_renovated <='".$GetRecord['year_renovated_end']."')";
		}
		if(!empty($GetRecord['year_built_start']) && $GetRecord['year_built_end']){ 
			$where  .= " AND (year_built >='".$GetRecord['year_built_start']."' OR year_built <='".$GetRecord['year_built_end']."')";
		}
		
		if(!empty($GetRecord['beds']) && $GetRecord['beds'] > 0){  
			$where  .= " AND beds ='".$GetRecord['beds']."'";
		}
		if(!empty($GetRecord['bath']) && $GetRecord['bath'] > 0){ 
			$where  .= " AND bath ='".$GetRecord['bath']."'";
		}
		
		$where  .= " AND (contactPhone='' OR contactEmail='')";
		
			if(!empty($GetRecord['miles']) && !empty($GetRecord['searchboxForAddress'])){ 
				$GetResult = $this->db->where('premises',$GetRecord['searchboxForAddress'])->get($this->properties_table);
				$resultPremises = $GetResult->row_array();
				$lat = $resultPremises['lat'];
				$lon = $resultPremises['lng'];
				$having = " HAVING distance<='".$GetRecord['miles']."'";
				 $Sql ="SELECT ".$this->properties_table.".*,
			  CONCAT_WS(',', 
				NULLIF(phone1,''), 
				NULLIF(phone2,''),
				NULLIF(phone3,''),
				NULLIF(phone4,''),
				NULLIF(phone5,''),
				NULLIF(phone6,''),
				NULLIF(phone7,''),
				NULLIF(phone8,''),
				NULLIF(phone9,'')
			) AS contactPhone,
			CONCAT_WS(',', 
				NULLIF(email1,''), 
				NULLIF(email2,''),
				NULLIF(email3,''),
				NULLIF(email4,'')
			)  AS contactEmail, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having. $orderBy;
		}else{
			$Sql ="select ".$this->properties_table.".*,
			CONCAT_WS(',', 
				NULLIF(phone1,''), 
				NULLIF(phone2,''),
				NULLIF(phone3,''),
				NULLIF(phone4,''),
				NULLIF(phone5,''),
				NULLIF(phone6,''),
				NULLIF(phone7,''),
				NULLIF(phone8,''),
				NULLIF(phone9,'')
			) AS contactPhone,
			CONCAT_WS(',', 
				NULLIF(email1,''), 
				NULLIF(email2,''),
				NULLIF(email3,''),
				NULLIF(email4,'')
			)  AS contactEmail

		from  ".$this->properties_table.$where." limit 0,85000";
		}
		error_reporting(1);
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		$query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		$result = $query->result_array();
		$ResultArray['result'] = $result;
		return  $ResultArray;
	}
	
}

  