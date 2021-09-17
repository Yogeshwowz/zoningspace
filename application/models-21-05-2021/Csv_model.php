<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Csv_model extends CI_Model{
	
		protected $properties_table = 'nof5';
		protected $save_search = 'tbl_save_search';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			date_default_timezone_set('Asia/Kolkata');
		}
		
		function downloadSearchRecordByCheckbox($record_ids){
		 $id_array =implode(',',$record_ids);;
		 $Sql ="select * from  nof5 where id IN (".$id_array.")";
		 $query = $this->db->query($Sql);
		 return  $result = $query->result_array();
		}
		public function downloadSearchRecordByForm() {
		if(!empty($_POST['formdata'])){
			parse_str($_POST['formdata'], $searcharray);
		}
		$where  = ' where 1';
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
							$Sql ="SELECT id,correct_address,short_address,long_address,zoning,pro_use,zip,land_area , ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance from  ".$this->properties_table.$where ;
							$query = $this->db->query($Sql);
							$allcount = $query->num_rows();
							$result = $query->result_array();
							return  $result;
						}
			}else{
				$Sql ="select * from ".$this->properties_table.$where;
				$query = $this->db->query($Sql);
				$allcount = $query->num_rows();
				$result = $query->result_array();
				return  $result;
			}
		}
		
		function downloadBuySearchRecord(){
			$sid = $_POST['sid']; 
			$this->db->where('search_id', $sid);
			$result = $this->db->get($this->save_search);
			$getdata = $result->row_array();
			echo"<pre>";
			print_r($getdata);
			die();
		}
		
}

  