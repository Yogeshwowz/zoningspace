<?php
	class Advancedsearch_Model extends CI_Model
	{
		protected $table = 'zoning';
		protected $properties_table = 'nof5';
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
	
		public function get_count() {
		$where  = ' where 1';
		if(!empty($_POST['propertyCheck'])){
			 $propertyCheck =implode("','",$_POST['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		if(!empty($_POST['zip'])){
			 $zip =implode("','",$_POST['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		}
		if(!empty($_POST['use'])){
			 $use =implode("','",$_POST['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
		}
		if(!empty($_POST['zoning'])){
			 $zoning =implode("','",$_POST['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($_POST['neighborhood'])){
			 $neighborhood =implode("','",$_POST['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
		}
		if(!empty($_POST['ward'])){
			 $ward =implode("','",$_POST['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
		}
		if(!empty($_POST['taxDeduction'])){
			 $taxDeduction =implode("','",$_POST['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
		}
		if(!empty($_POST['land_range_start']) && !empty($_POST['land_range_end'])){
			
			 $where  .= " AND (land_area >='".$_POST['land_range_start']."' OR land_area <='".$_POST['land_range_end']."')";
		}
		if(!empty($_POST['fromSaleDate']) && !empty($_POST['toSaleDate'])){
			
			// $where  .= " AND (sale_date >='".$_POST['fromSaleDate']."' OR sale_date <='".$_POST['toSaleDate']."')";
		}
		if(!empty($_POST['square_start']) && !empty($_POST['square_end'])){
			
			 $where  .= " AND (square >='".$_POST['square_start']."' OR square <='".$_POST['square_end']."')";
		}
		$Sql ="select * from ".$this->properties_table.$where;
		$query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		return  $numRow;

		}
	
		// Fetch records
	public function getData($rowno,$rowperpage) {
		$unserialize = unserialize($_POST['jsonPostData']);
		$orderBy ="";
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='owername'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY owner_names ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='zipcode'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY zip ". $sortBy;
		}
		
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='zoning'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY zoning ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='neighborhood'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY neighborhood ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='ward'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY ward ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='use'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY pro_use ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='tax_deduction'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY homestead_tax_deduction ". $sortBy;
		}
		$where  = ' where 1';
		if(!empty($_POST['propertyCheck'])){
			 $propertyCheck =implode("','",$_POST['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		if(!empty($_POST['zip'])){
			 $zip =implode("','",$_POST['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		}
		if(!empty($_POST['use'])){
			 $use =implode("','",$_POST['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
		}
		if(!empty($_POST['zoning'])){
			 $zoning =implode("','",$_POST['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($_POST['neighborhood'])){
			 $neighborhood =implode("','",$_POST['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
		}
		if(!empty($_POST['ward'])){
			 $ward =implode("','",$_POST['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
		}
		if(!empty($_POST['taxDeduction'])){
			 $taxDeduction =implode("','",$_POST['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
		}
		if(!empty($_POST['land_range_start']) && !empty($_POST['land_range_end'])){
			
			 $where  .= " AND (land_area >='".$_POST['land_range_start']."' OR land_area <='".$_POST['land_range_end']."')";
		}
		if(!empty($_POST['fromSaleDate']) && !empty($_POST['toSaleDate'])){
			
			 $where  .= " AND (sale_date >='".$_POST['fromSaleDate']."' OR sale_date <='".$_POST['toSaleDate']."')";
		}
		if(!empty($_POST['square_start']) && !empty($_POST['square_end'])){
			
			 $where  .= " AND (square >='".$_POST['square_start']."' OR square <='".$_POST['square_end']."')";
		}
		if(!empty($_POST['simplesearch']) && !empty($_POST['searchbox'])){
			 
			 $where  .= " AND premises like '%".$_POST['searchbox']."%'";
		}
		if(!empty($unserialize['fromSaleDate']) && !empty($unserialize['toSaleDate']) ){ 
				$where  .= " AND (sale_date >='".$unserialize['fromSaleDate']."' OR sale_date <='".$unserialize['toSaleDate']."')";
			
		}
		
		if(!empty($unserialize['square'])){ 
			$square = explode('-',$unserialize['square']); 
			$squareStart = trim($square[0]); 
			$squareLast = trim($square[1]);
			if(!empty($squareStart) && !empty($squareLast)){
				$where  .= " AND (square >='".$squareStart."' OR square <='".$squareLast."')";
			}
		}
		if(!empty($unserialize['lot'])){ 
			$lot = explode('-',$unserialize['lot']); 
			$lotStart = trim($lot[0]); 
			$lotLast = trim($lot[1]);
			if(!empty($lotStart) && !empty($lotLast)){
				$where  .= " AND (lot >='".$lotStart."' OR lot <='".$lotLast."')";
			}
		}
		if(!empty($unserialize['sale_price'])){ 
			$sale_price = explode('-',$unserialize['sale_price']); 
			$sale_priceStart = trim(str_replace('$','',$sale_price[0])); 
			$sale_priceLast = trim(str_replace('$','',$sale_price[1]));
			if(!empty($sale_priceStart) && !empty($sale_priceLast)){
				$where  .= " AND (sale_price >='".$sale_priceStart."' OR sale_price <='".$sale_priceLast."')";
			}
		}
		if(!empty($unserialize['number_of_families'])){ 
			$families = explode('-',$unserialize['number_of_families']); 
			$familiesStart = trim($families[0]); 
			$familiesLast = trim($families[1]);
			if(!empty($familiesStart) && !empty($familiesLast)){
				$where  .= " AND (number_of_families >='".$familiesStart."' OR number_of_families <='".$familiesLast."')";
			}
		}
		if(!empty($unserialize['object_id'])){ 
			$object_id = explode('-',$unserialize['object_id']); 
			$object_idStart = trim($object_id[0]); 
			$object_idLast = trim($object_id[1]);
			if(!empty($object_idStart) && !empty($object_idLast)){
				$where  .= " AND (object_id >='".$object_idStart."' OR object_id <='".$object_idLast."')";
			}
		}
		
		if(!empty($unserialize['price_par_square_feet'])){
			$price_par_square_feet = explode('-',$unserialize['price_par_square_feet']); 
			$price_par_square_feetStart = trim(str_replace('$','',$price_par_square_feet[0]));
			$price_par_square_feetLast = trim(str_replace('$','',$price_par_square_feet[1]));
			if(!empty($price_par_square_feetStart) && !empty($price_par_square_feetLast)){
				$where  .= " AND (price_per_square_feet >='".$price_par_square_feetStart."' OR price_per_square_feet <='".$price_par_square_feetLast."')";
			}
		}
		
		if(!empty($unserialize['tax_record'])){
			$tax_record = explode('-',$unserialize['tax_record']); 
			$tax_recordStart = trim($tax_record[0]); 
			$tax_recordLast = trim($tax_record[1]);
			if(!empty($tax_recordStart) && !empty($tax_recordLast)){
				$where  .= " AND (tax_record >='".$tax_recordStart."' OR tax_record <='".$tax_recordLast."')";
			}
		}
		if(!empty($unserialize['taxable_value_total'])){
			$taxable_value_total = explode('-',$unserialize['taxable_value_total']); 
			$taxable_value_totalStart = trim($taxable_value_total[0]); 
			$taxable_value_totalLast = trim($taxable_value_total[1]);
			if(!empty($taxable_value_totalStart) && !empty($taxable_value_totalLast)){
				$where  .= " AND (taxable_value_total >='".$taxable_value_totalStart."' OR taxable_value_total <='".$taxable_value_totalLast."')";
			}
		}
		
		if(!empty($unserialize['year_built'])){
			$year_built = explode('-',$unserialize['year_built']); 
			$year_builtStart = trim($year_built[0]); 
			$year_builtLast = trim($year_built[1]);
			if(!empty($year_builtStart) && !empty($year_builtLast)){
				$where  .= " AND (year_built >='".$year_builtStart."' OR year_built <='".$year_builtLast."')";
			}
		}
		/*if(!empty($unserialize['count_id'])){ 
			$count_id = explode('-',$unserialize['count_id']); 
			$count_idStart = trim($count_id[0]); 
			$count_idLast = trim($count_id[1]);
			if(!empty($count_idStart) && !empty($count_idLast)){
				$where  .= " AND (count >='".$count_idStart."' OR count <='".$count_idLast."')";
			}
		}
		if(!empty($unserialize['beds'])){ 
			$beds = explode('-',$unserialize['beds']); 
			$bedsStart = trim($beds[0]); 
			$bedsLast = trim($beds[1]);
			if(!empty($bedsStart) && !empty($bedsLast)){
				$where  .= " AND (beds >='".$bedsStart."' OR beds <='".$bedsLast."')";
			}
		}
		if(!empty($unserialize['bath'])){ 
			$bath = explode('-',$unserialize['bath']); 
			$bathStart = trim($bath[0]); 
			$bathLast = trim($bath[1]);
			if(!empty($bathStart) && !empty($bathLast)){
				$where  .= " AND (bath >='".$bathStart."' OR bath <='".$bathLast."')";
			}
		}
		if(!empty($unserialize['squareFeet'])){ 
			$squareFeet = explode('-',$unserialize['squareFeet']); 
			$squareFeetStart = trim($squareFeet[0]); 
			$squareFeetLast = trim($squareFeet[1]);
			if(!empty($squareFeetStart) && !empty($squareFeetLast)){
				$where  .= " AND (square_feet >='".$squareFeetStart."' OR square_feet <='".$squareFeetLast."')";
			}
		}
		
		if(!empty($unserialize['year_renovated'])){
			$year_renovated = explode('-',$unserialize['year_renovated']); 
			$year_renovatedStart = trim($year_renovated[0]); 
			$year_renovatedLast = trim($year_renovated[1]);
			if(!empty($year_renovatedStart) && !empty($year_renovatedLast)){
				$where  .= " AND (year_renovated >='".$year_renovatedStart."' OR year_renovated <='".$year_renovatedLast."')";
			}
		}*/
		if(!empty($unserialize['property_owns_multiple'])){ 
			$where  .= " AND count >='3'";
		}
		if(!empty($unserialize['beds'])){ 
			$where  .= " AND beds ='".$unserialize['beds']."'";
		}
		if(!empty($unserialize['bath'])){ 
			$where  .= " AND bath ='".$unserialize['bath']."'";
		}
		if(!empty($unserialize['squareFeet'])){ 
			$where  .= " AND square_feet ='".$unserialize['squareFeet']."'";
		}
		if(!empty($unserialize['year_renovated'])){ 
			$where  .= " AND year_renovated ='".$unserialize['year_renovated']."'";
		}
		if(!empty($unserialize['miles']) && !empty($unserialize['searchboxForAddress'])){ 
				$GetResult = $this->db->where('premises',$unserialize['searchboxForAddress'])->get($this->properties_table);
				$resultPremises = $GetResult->row_array();
				$lat = $resultPremises['lat'];
				$lon = $resultPremises['lng'];
				$having = " HAVING distance<='".$unserialize['miles']."'";
				$Sql ="SELECT *, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having. $orderBy." LIMIT ".$rowno." , ".$rowperpage;
		}else{
				$Sql ="select * from  ".$this->properties_table.$where. $orderBy." LIMIT ".$rowno." , ".$rowperpage;
		}
		$query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		$result = $query->result_array();
		$this->get_count($numRow);
		return  $result;
	}

	// Select total records
    public function getrecordCount($jsonPostData) {
		$unserialize = unserialize($jsonPostData);
		
		$orderBy ="";
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='owername'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY owner_names ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='zipcode'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY zip ". $sortBy;
		}
		
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='zoning'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY zoning ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='neighborhood'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY neighborhood ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='ward'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY ward ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='use'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY pro_use ". $sortBy;
		}
		if(!empty($_POST['selectSortBy']) && $_POST['selectSortBy']=='tax_deduction'){
				if($_POST['SortBy']=='asc'){
					$sortBy = $_POST['SortBy'];
				}
				if($_POST['SortBy']=='desc'){
					$sortBy = $_POST['SortBy'];
				}
			$orderBy .=" ORDER BY homestead_tax_deduction ". $sortBy;
		}
		$where  = ' where 1';
		if(!empty($_POST['propertyCheck'])){
			 $propertyCheck =implode("','",$_POST['propertyCheck']);
			 $where  .= " AND atype IN ( '".$propertyCheck."' )";
		}
		if(!empty($_POST['zip'])){
			 $zip =implode("','",$_POST['zip']);
			 $where  .= " AND zip IN ( '".$zip."' )";
		}
		if(!empty($_POST['use'])){
			 $use =implode("','",$_POST['use']);
			 $where  .= " AND pro_use IN ( '".$use."' )";
		}
		if(!empty($_POST['zoning'])){
			 $zoning =implode("','",$_POST['zoning']);
			 $where  .= " AND zoning IN ( '".$zoning."' )";
		}
		if(!empty($_POST['neighborhood'])){
			 $neighborhood =implode("','",$_POST['neighborhood']);
			 $where  .= " AND neighborhood IN ( '".$neighborhood."' )";
		}
		if(!empty($_POST['ward'])){
			 $ward =implode("','",$_POST['ward']);
			 $where  .= " AND ward IN ( '".$ward."' )";
		}
		if(!empty($_POST['taxDeduction'])){
			 $taxDeduction =implode("','",$_POST['taxDeduction']);
			 $where  .= " AND homestead_tax_deduction IN ( '".$taxDeduction."' )";
		}
		if(!empty($_POST['land_range_start']) && !empty($_POST['land_range_end'])){
			
			 $where  .= " AND (land_area >='".$_POST['land_range_start']."' OR land_area <='".$_POST['land_range_end']."')";
		}
		
		if(!empty($_POST['simplesearch']) && !empty($_POST['searchbox'])){
			 
			 $where  .= " AND premises like '%".$_POST['searchbox']."%'";
		}
		if(!empty($unserialize['fromSaleDate']) && !empty($unserialize['toSaleDate']) ){ 
				$where  .= " AND (sale_date >='".$unserialize['fromSaleDate']."' OR sale_date <='".$unserialize['toSaleDate']."')";
			
		}
		
		/*if(!empty($unserialize['property_owns_multiple'])){ 
			$where  .= " AND count >='3'";
		}*/
		if(!empty($unserialize['sale_price_start']) && $unserialize['sale_price_end']){ 
			$where  .= " AND (sale_price >='".$unserialize['sale_price_start']."' OR sale_price <='".$unserialize['sale_price_end']."')";
		}
		if(!empty($unserialize['taxable_value_start']) && $unserialize['taxable_value_end']){ 
			$where  .= " AND (taxable_value_total >='".$unserialize['taxable_value_start']."' OR taxable_value_total <='".$unserialize['taxable_value_end']."')";
		}
		if(!empty($unserialize['count_start']) && $unserialize['count_end']){ 
			$where  .= " AND (count >='".$unserialize['count_start']."' OR count <='".$unserialize['count_end']."')";
		}
		if(!empty($unserialize['square_feet_start']) && $unserialize['square_feet_end']){ 
			$where  .= " AND (square_feet >='".$unserialize['square_feet_start']."' OR square_feet <='".$unserialize['square_feet_end']."')";
		}
		if(!empty($unserialize['price_per_square_feet_start']) && $unserialize['price_per_square_feet_end']){ 
			$where  .= " AND (price_per_square_feet >='".$unserialize['price_per_square_feet_start']."' OR price_per_square_feet <='".$unserialize['price_per_square_feet_end']."')";
		}
		
		if(!empty($unserialize['year_renovated_start']) && $unserialize['year_renovated_end']){ 
			$where  .= " AND (year_renovated >='".$unserialize['year_renovated_start']."' OR year_renovated <='".$unserialize['year_renovated_end']."')";
		}
		if(!empty($unserialize['year_built_start']) && $unserialize['year_built_end']){ 
			$where  .= " AND (year_built >='".$unserialize['year_built_start']."' OR year_built <='".$unserialize['year_built_end']."')";
		}
		
		if(!empty($unserialize['beds']) && $unserialize['beds'] > 0){  
			$where  .= " AND beds ='".$unserialize['beds']."'";
		}
		if(!empty($unserialize['bath']) && $unserialize['bath'] > 0){ 
			$where  .= " AND bath ='".$unserialize['bath']."'";
		}
		
		
		
		//$Sql ="select * from ".$this->properties_table.$where;
			if(!empty($unserialize['miles']) && !empty($unserialize['searchboxForAddress'])){ 
				$GetResult = $this->db->where('premises',$unserialize['searchboxForAddress'])->get($this->properties_table);
				$resultPremises = $GetResult->row_array();
				$lat = $resultPremises['lat'];
				$lon = $resultPremises['lng'];
				$having = " HAVING distance<='".$unserialize['miles']."'";
				 $Sql ="SELECT *, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having. $orderBy;
		}else{
				$Sql ="select * from ".$this->properties_table.$where;
		}
		//echo $Sql;
		//die();
		$query = $this->db->query($Sql);
		$allcount = $query->num_rows();
		return  $allcount;
    }
    //Get Count Record for Map Page
	 public function getrecordCountForMap($jsonPostData) {
		$unserialize = unserialize($jsonPostData);
		$orderBy ="";
		if(!empty($unserialize['selectSortBy']) && $unserialize['selectSortBy']=='owername'){
				if($unserialize['SortBy']=='asc'){
					$sortBy = $unserialize['SortBy'];
				}
				if($unserialize['SortBy']=='desc'){
					$sortBy = $unserialize['SortBy'];
				}
			$orderBy .=" ORDER BY owner_names ". $sortBy;
		}
		if(!empty($unserialize['selectSortBy']) && $unserialize['selectSortBy']=='zipcode'){
				if($unserialize['SortBy']=='asc'){
					$sortBy = $unserialize['SortBy'];
				}
				if($unserialize['SortBy']=='desc'){
					$sortBy = $unserialize['SortBy'];
				}
			$orderBy .=" ORDER BY zip ". $sortBy;
		}
		
		if(!empty($unserialize['selectSortBy']) && $unserialize['selectSortBy']=='zoning'){
				if($unserialize['SortBy']=='asc'){
					$sortBy = $unserialize['SortBy'];
				}
				if($unserialize['SortBy']=='desc'){
					$sortBy = $unserialize['SortBy'];
				}
			$orderBy .=" ORDER BY zoning ". $sortBy;
		}
		if(!empty($unserialize['selectSortBy']) && $unserialize['selectSortBy']=='neighborhood'){
				if($unserialize['SortBy']=='asc'){
					$sortBy = $unserialize['SortBy'];
				}
				if($unserialize['SortBy']=='desc'){
					$sortBy = $unserialize['SortBy'];
				}
			$orderBy .=" ORDER BY neighborhood ". $sortBy;
		}
		if(!empty($unserialize['selectSortBy']) && $unserialize['selectSortBy']=='ward'){
				if($unserialize['SortBy']=='asc'){
					$sortBy = $unserialize['SortBy'];
				}
				if($unserialize['SortBy']=='desc'){
					$sortBy = $unserialize['SortBy'];
				}
			$orderBy .=" ORDER BY ward ". $sortBy;
		}
		if(!empty($unserialize['selectSortBy']) && $unserialize['selectSortBy']=='use'){
				if($unserialize['SortBy']=='asc'){
					$sortBy = $unserialize['SortBy'];
				}
				if($unserialize['SortBy']=='desc'){
					$sortBy = $unserialize['SortBy'];
				}
			$orderBy .=" ORDER BY pro_use ". $sortBy;
		}
		if(!empty($unserialize['selectSortBy']) && $unserialize['selectSortBy']=='tax_deduction'){
				if($unserialize['SortBy']=='asc'){
					$sortBy = $unserialize['SortBy'];
				}
				if($unserialize['SortBy']=='desc'){
					$sortBy = $unserialize['SortBy'];
				}
			$orderBy .=" ORDER BY homestead_tax_deduction ". $sortBy;
		}
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
			
			 $where  .= " AND (land_area >='".$unserialize['land_range_start']."' OR land_area <='".$unserialize['land_range_end']."')";
		}
		if(!empty($unserialize['fromSaleDate']) && !empty($unserialize['toSaleDate'])){
			
			 $where  .= " AND (sale_date >='".$unserialize['fromSaleDate']."' OR sale_date <='".$unserialize['toSaleDate']."')";
		}
		if(!empty($unserialize['square_start']) && !empty($unserialize['square_end'])){
			
			 $where  .= " AND (square >='".$unserialize['square_start']."' OR square <='".$unserialize['square_end']."')";
		}
		if(!empty($unserialize['simplesearch']) && !empty($unserialize['searchbox'])){
			 
			 $where  .= " AND premises like '%".$unserialize['searchbox']."%'";
		}
		if(!empty($unserialize['fromSaleDate']) && !empty($unserialize['toSaleDate']) ){ 
				$where  .= " AND (sale_date >='".$unserialize['fromSaleDate']."' OR sale_date <='".$unserialize['toSaleDate']."')";
			
		}
		
		if(!empty($unserialize['square'])){ 
			$square = explode('-',$unserialize['square']); 
			$squareStart = trim($square[0]); 
			$squareLast = trim($square[1]);
			if(!empty($squareStart) && !empty($squareLast)){
				$where  .= " AND (square >='".$squareStart."' OR square <='".$squareLast."')";
			}
		}
		if(!empty($unserialize['lot'])){ 
			$lot = explode('-',$unserialize['lot']); 
			$lotStart = trim($lot[0]); 
			$lotLast = trim($lot[1]);
			if(!empty($lotStart) && !empty($lotLast)){
				$where  .= " AND (lot >='".$lotStart."' OR lot <='".$lotLast."')";
			}
		}
		if(!empty($unserialize['sale_price'])){ 
			$sale_price = explode('-',$unserialize['sale_price']); 
			$sale_priceStart = trim(str_replace('$','',$sale_price[0])); 
			$sale_priceLast = trim(str_replace('$','',$sale_price[1]));
			if(!empty($sale_priceStart) && !empty($sale_priceLast)){
				$where  .= " AND (sale_price >='".$sale_priceStart."' OR sale_price <='".$sale_priceLast."')";
			}
		}
		if(!empty($unserialize['number_of_families'])){ 
			$families = explode('-',$unserialize['number_of_families']); 
			$familiesStart = trim($families[0]); 
			$familiesLast = trim($families[1]);
			if(!empty($familiesStart) && !empty($familiesLast)){
				$where  .= " AND (number_of_families >='".$familiesStart."' OR number_of_families <='".$familiesLast."')";
			}
		}
		if(!empty($unserialize['object_id'])){ 
			$object_id = explode('-',$unserialize['object_id']); 
			$object_idStart = trim($object_id[0]); 
			$object_idLast = trim($object_id[1]);
			if(!empty($object_idStart) && !empty($object_idLast)){
				$where  .= " AND (object_id >='".$object_idStart."' OR object_id <='".$object_idLast."')";
			}
		}
		
		if(!empty($unserialize['price_par_square_feet'])){
			$price_par_square_feet = explode('-',$unserialize['price_par_square_feet']); 
			$price_par_square_feetStart = trim(str_replace('$','',$price_par_square_feet[0]));
			$price_par_square_feetLast = trim(str_replace('$','',$price_par_square_feet[1]));
			if(!empty($price_par_square_feetStart) && !empty($price_par_square_feetLast)){
				$where  .= " AND (price_per_square_feet >='".$price_par_square_feetStart."' OR price_per_square_feet <='".$price_par_square_feetLast."')";
			}
		}
		
		if(!empty($unserialize['tax_record'])){
			$tax_record = explode('-',$unserialize['tax_record']); 
			$tax_recordStart = trim($tax_record[0]); 
			$tax_recordLast = trim($tax_record[1]);
			if(!empty($tax_recordStart) && !empty($tax_recordLast)){
				$where  .= " AND (tax_record >='".$tax_recordStart."' OR tax_record <='".$tax_recordLast."')";
			}
		}
		if(!empty($unserialize['taxable_value_total'])){
			$taxable_value_total = explode('-',$unserialize['taxable_value_total']); 
			$taxable_value_totalStart = trim($taxable_value_total[0]); 
			$taxable_value_totalLast = trim($taxable_value_total[1]);
			if(!empty($taxable_value_totalStart) && !empty($taxable_value_totalLast)){
				$where  .= " AND (taxable_value_total >='".$taxable_value_totalStart."' OR taxable_value_total <='".$taxable_value_totalLast."')";
			}
		}
		
		if(!empty($unserialize['year_built'])){
			$year_built = explode('-',$unserialize['year_built']); 
			$year_builtStart = trim($year_built[0]); 
			$year_builtLast = trim($year_built[1]);
			if(!empty($year_builtStart) && !empty($year_builtLast)){
				$where  .= " AND (year_built >='".$year_builtStart."' OR year_built <='".$year_builtLast."')";
			}
		}
		
		if(!empty($unserialize['property_owns_multiple'])){ 
			$where  .= " AND count >='3'";
		}
		if(!empty($unserialize['beds'])){ 
			$where  .= " AND beds ='".$unserialize['beds']."'";
		}
		if(!empty($unserialize['bath'])){ 
			$where  .= " AND bath ='".$unserialize['bath']."'";
		}
		if(!empty($unserialize['squareFeet'])){ 
			$where  .= " AND square_feet ='".$unserialize['squareFeet']."'";
		}
		if(!empty($unserialize['year_renovated'])){ 
			$where  .= " AND year_renovated ='".$unserialize['year_renovated']."'";
		}
		
		
			if(!empty($unserialize['miles']) && !empty($unserialize['searchboxForAddress'])){ 
				$GetResult = $this->db->where('premises',$unserialize['searchboxForAddress'])->get($this->properties_table);
				$resultPremises = $GetResult->row_array();
				$lat = $resultPremises['lat'];
				$lon = $resultPremises['lng'];
				$having = " HAVING distance<='".$unserialize['miles']."'";
				$Sql ="SELECT *, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where .$having. $orderBy;
				
		}else{
				$Sql ="select * from ".$this->properties_table.$where;
		}
		
		$query = $this->db->query($Sql);
		$allcount = $query->num_rows();
		return  $allcount;
    }
	
	
	
    public function checkUserIpAddress($timezone,$ipInfo){
		$currentDate = date("Y-m-d H:i:s");
		$currentDate_timestamp = strtotime($currentDate);
		$endDate_Time = strtotime("+10 minutes", $currentDate_timestamp);
		$EndDateTime = date("Y-m-d H:i:s", $endDate_Time);
		
		$Sql ="select * from  visitor_user where ip_address = '".$_SERVER['REMOTE_ADDR']."' ";
		$query = $this->db->query($Sql);
		$allcount = $query->num_rows();
		if($allcount > 0){
			
		}else{
			$insertData ="insert into  visitor_user set
			server_name='".$_SERVER['SERVER_NAME']."',
			server_addr='".$_SERVER['SERVER_ADDR']."',
			ip_address='".$_SERVER['REMOTE_ADDR']."',
			visitor_start_time='".$currentDate."',
			visitor_expiry_time='".$EndDateTime."',
			timezone_set='".$timezone."',
			ip_address_data='".json_encode($ipInfo)."'
			";
		  $query = $this->db->query($insertData);
		}
		
	}
	public function getUserIpAddress(){
		$query = $this->db->where('ip_address',$_SERVER['REMOTE_ADDR'])->get('visitor_user');
		$result = $query->row_array();
		return  $result;
	}
	public function getuserdata(){
		$query = $this->db->where('id',$_POST['id'])->get($this->properties_table);
		$result = $query->result_array();
		return  $result;
	}

	public function checkUserexpired(){
		if(isset($_POST['checkstatus']) && $_POST['checkstatus']==1){
			$Sql ="update visitor_user set status= 1 where ip_address='".$_SERVER['REMOTE_ADDR']."'";
		    return $query = $this->db->query($Sql);
		}
		
	}
	//Save Search Data
	public function saveSearch(){
		$post_array = $_POST;
	$totalrows =  $this->getrecordCount($post_array);
	
		
			if(!empty($_POST['SortBy'])){
				unset($_POST['SortBy']);
				unset($_POST['searchName']);
				if(!array_filter($_POST)) {
					$empty_status =0;
	    		}
				else{
						$empty_status =1;
				}
			}

		$data = array(
					
					'user_id' => $this->session->userdata('user_id'),
					'searchName' => $post_array['searchName'],
					//'search_data' => json_encode($post_array),
					'search_data' => json_encode(unserialize($post_array['jsonPostData'])),
					'empty_status' => $empty_status,
					'single_record_id' => 1,
					'rowcount' => $totalrows,
					'created_date' => date("Y-m-d H:i:s")
				);
				
			$result = $this->db->insert('tbl_save_search', $data);
			if($_POST['mappage']=='1'){
				$lastid = $this->db->insert_id();
				if(!empty($lastid)) { return $lastid;}else{ return 0;}
				
			}else{
				if($result){ return 1;}else{ return 0;}
			}
	}
	
	/*public function textSearch(){
		$rowno =0;
		$rowperpage =20;
		//$limitStart = $_POST['limitStart'];
		$limitCount = 50;
		$response = array();
		if(!empty($_GET['search']) && !empty($_GET['search'])){
				$where  .= " where address like '%".$_GET['search']."%'";
				$Sql ="select id,address from  ".$this->properties_table.$where. " LIMIT ".$rowperpage." , ".$limitCount;
				$query = $this->db->query($Sql);
				$result = $query->result_array();
				foreach($result as $row ){
					$response[] = array("value"=>$row['id'],"label"=>$row['address']);
				}
				return $response;
		}
	}*/
	
	public function textSearch(){
	
		$limitStart = $_POST['limitStart'];
		$limitCount = 50; // Set how much data you have to fetch on each request
		if(isset($limitStart ) || !empty($limitStart)) {
		$response = array();
		if(isset($limitStart ) || !empty($limitStart)) {
			if(!empty($_POST['search'])){
			$where  .= " where premises like '".$_POST['search']."%'";
			$Sql ="select id,premises from  ".$this->properties_table.$where. " LIMIT ".$limitStart." , ".$limitCount;
			$query = $this->db->query($Sql);
			$allcount = $query->num_rows();
			
			if($allcount >0){
				$result = $query->result_array();
				foreach($result as $key=> $row ){
					$response[$key] = $row['premises'];
				}
			}else{
				$response[0] = 'No Data Found';
			}
			return $response;
			}
		}
		}
	}
	public function textSearchScroll(){
		$limitStart = $_POST['limitStart'];
		$limitCount = 50; // Set how much data you have to fetch on each request
		if(isset($limitStart ) || !empty($limitStart)) {
		$response = array();
		if(isset($limitStart ) || !empty($limitStart)) {
			if(!empty($_POST['search'])){
			$where  .= " where premises like '".$_POST['search']."%'";
			$Sql ="select id,premises from  ".$this->properties_table.$where. " LIMIT ".$limitStart." , ".$limitCount;
			$query = $this->db->query($Sql);
			$allcount = $query->num_rows();
			if($allcount >0){
				$result = $query->result_array();
				foreach($result as $key=> $row ){
					$response[$key] = $row['premises'];
				}
			}else{
				//$response[0] = 'No Data Found';
			}
			return $response;
			}
		}
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
        $this->db->where('single_record_id', 0);
        $this->db->where('status', 'pending');
        $query = $this->db->get();
        return $query->row_array();
    }
	
	//Save Search Data
	public function saveSearchData($jsonPostData){
		$searchName = 'reallist-bluk-'.rand();
		$totalrows =  $this->getrecordCount($jsonPostData);
		
		$post_array = $_POST;
		$data = array(
					
					'user_id' => $this->session->userdata('user_id'),
					'browser_id' => session_id(),
					'searchName' => $searchName,
					'search_data' => json_encode($post_array),
					'empty_status' => 0,
					'single_record_id' => 0,
					'rowcount' => $totalrows,
					'created_date' => date("Y-m-d H:i:s")
				);
				
			$result = $this->db->insert('tbl_save_search', $data);
			if($_POST['mappage']=='1'){
				$lastid = $this->db->insert_id();
				if(!empty($lastid)) { return $lastid;}else{ return 0;}
				
			}else{
				if($result){ return 1;}else{ return 0;}
			}
	}
	

}