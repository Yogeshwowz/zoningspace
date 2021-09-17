<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Administrator_model extends CI_Model{
    
	protected $properties_table = 'properties5';
	protected $properties_table_4 = 'nof4';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}
	
	
	function loginMe($email, $password) {
	$where =" (roleId= '1' OR roleId='3' )";
        $this->db->from('tbl_users');
		$this->db->where('email',$email);
        $this->db->where('password',md5($password));
        $this->db->where($where);
        $query = $this->db->get();
		$numRow = $query->num_rows();
		if($numRow > 0){
		 return $query->row_array();
		}
    }
    function users(){
       $this->db->from('tbl_users');
	   $this->db->order_by("userId", "desc");
        $this->db->where('roleId', 2);
		$query = $this->db->get();
        return $query->result();
    }
    function visitUser(){
		$this->db->from('visitor_user');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result();
    }
    public function user_enabled_disabled(){
		$id = $this->input->post('user_id');  
		$userstatus = $this->input->post('userstatus');  
		if($userstatus=='disabled'){
			$data = array(
					'status' => 1
					);
				
		}
		if($userstatus=='enabled'){
			$data = array(
					'status' => 0
					);
				
		}
		$this->db->where('userId', $id);
		$result = $this->db->update('tbl_users', $data);
		if($result){ return 1;}
		  
	}	
	function researcher(){
       $this->db->from(' tbl_users');
	   $this->db->where('roleId',3);
	   $this->db->order_by("userId", "desc");
       $query = $this->db->get();
       return $query->result();
    }
	public function addResearcher(){
	 
		$fname = $this->input->post('fname');  
		$emailid = $this->input->post('emailid');  
		$password = $this->input->post('password');  
		$this->db->from('tbl_users');
		$this->db->where('email',$emailid);
		$query = $this->db->get();
		$numRow = $query->num_rows();
		if($numRow > 0){
			return 0;
		}else{
		$dataUser = array(
					'name' =>$fname,
					'email' => $emailid,
					'roleId' => 3,
					'password' =>md5($password),
					'plain_password' =>$password
				);
				
		$result = $this->db->insert('tbl_users', $dataUser);
		if($result){ return 1;}
		}
	}
	/*public function researcher_user_enabled_disabled(){
		$id = $this->input->post('id');  
		$userstatus = $this->input->post('userstatus');  
		if($userstatus=='disabled'){
			$data = array(
					'status' => 0
					);
				
		}
		if($userstatus=='enabled'){
			$data = array(
					'status' => 1
					);
				
		}
		$this->db->where('id', $id);
		$result = $this->db->update('tbl_researcher', $data);
		if($result){ return 1;}
		  
	}*/
	public function researcher_delete(){
		$id = $this->input->post('id');  
		$this->db->where('userId', $id);
		$result = $this->db->delete('tbl_users');
		if($result){ return 1;}
		  
	}
	public function visit_user_delete(){
		$id = $this->input->post('id');  
		$this->db->where('id', $id);
		$result = $this->db->delete('visitor_user');
		if($result){ return 1;}
		  
	}
	function user_save_search(){
		$this->db->select('tbl_users.name,tbl_users.email,tbl_save_search.*');
		$this->db->where('single_record_id',0);
		$this->db->order_by("search_id ", "desc");
		$this->db->from('tbl_save_search');
		$this->db->join('tbl_users', 'tbl_users.userId  = tbl_save_search.user_id');
		$query = $this->db->get();
		return $query->result();
    }
	function user_orderss(){
		$this->db->select('tbl_users.name,tbl_users.email,tbl_orders.*,tbl_save_search.searchName');
		$this->db->where('payment_status','complete');
		$this->db->order_by("order_id", "desc");
		$this->db->from('tbl_orders');
		$this->db->join('tbl_users', 'tbl_users.userId  = tbl_orders.user_id');
		$this->db->join('tbl_save_search', 'tbl_save_search.search_id  = tbl_orders.search_id');
		$query = $this->db->get();
		return $query->result();
    }
	
	 public function cronjobForCheckUserexpired(){
		$this->db->from('visitor_user');
		$this->db->where('status', 0);
		$query = $this->db->get();
		$numRow = $query->num_rows();
		if($numRow >0){
			$record = $query->result();
		
			foreach($record as $key=>$record){
				$timezone = $record->timezone_set;
				//$timezone = "Asia/Kolkata";
				date_default_timezone_set($timezone);
				$currentDate = date("Y-m-d H:i:s");
				$currentDateTime = strtotime($currentDate);
				$expiry_time = strtotime($record->visitor_expiry_time);
				if($currentDateTime > $expiry_time){
					$data = array(
						'status' => 1
					);
					
					$this->db->where('timezone_set',$timezone);
					$result = $this->db->update('visitor_user', $data);
				}
				
			}
		}
	}
	
	function getbuySearch(){
		$this->db->select('tbl_orders.*,tbl_orders.created_date as orderdate,tbl_save_search.*');
		$this->db->order_by("order_id", "desc");
		$this->db->from('tbl_orders');
		$this->db->join('tbl_save_search','tbl_save_search.search_id  = tbl_orders.search_id');
		$query = $this->db->get();
		return $query->result_array();
    }
     function exportFile(){
		$this->db->select('tbl_export_file.*,tbl_users.name');
		$this->db->from('tbl_export_file');
		$this->db->join('tbl_users','tbl_users.userId  = tbl_export_file.user_id');
		$query = $this->db->get();
		return $query->result_array();
    }
	function importFile(){
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		if(!empty($_FILES['userfile']["name"])){
		 
			$ext = pathinfo($_FILES['userfile']["name"]);
			$fileName = rand().'-'.time().'.'.$ext['extension'];
			$_FILES['userfile']["name"]= 'property-'.$fileName;
			//Upload Image
			$config['upload_path'] = './assets/upload/csv/';
			$config['allowed_types'] = 'csv';
			//$config['max_size'] = '*';
			//$config['max_width'] = '2000';
			//$config['max_height'] = '2000';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('userfile')){
				$errors =  array('error' => $this->upload->display_errors());
				$data['error'] = $errors;
			}else{
				$data =  array('upload_data' => $this->upload->data());
				//echo "/assets/upload/csv/".$_FILES['userfile']['name'];
				$data = array(
						'fileName' => $_FILES['userfile']['name'],
						'user_id' => $this->session->userdata('userId'),
						'created_date' => date("Y-m-d H:i:s")
					);
					return $result = $this->db->insert('tbl_export_file', $data);
			}
		
		}
	}
	
	function cronJobExportData(){
		error_reporting(1);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		
		//$csvname="/home/gbwkke9cev7f/public_html/realstate/assets/csv/22-04-2020_11_1077925280 properties.csv";
		$csvname = $_SERVER['DOCUMENT_ROOT'].'/realstate/assets/upload/csv/'.$_POST['filename'];
		
			$file = fopen($csvname, "r");
			$count = 0;
			while (($getData  = fgetcsv($file, 10000, ",")) !== FALSE){
			
			 $count++;
				 if ($count == 1) { continue; }
				 if(!empty($getData[30]) || !empty($getData[31])){
				 $data = array(
						'contactEmail' =>$getData[30],
						'contactPhone' =>$getData[31]
					);
					$this->db->where('id', $getData[0]);
					$result = $this->db->update($this->properties_table, $data);
				}
		}
		fclose($file);
	
    }
	function csvFileImport(){
		error_reporting(1);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		
		//echo $csvname="/home/gbwkke9cev7f/public_html/realstate/assets/csv/22-04-2020_11_1077925280 properties.csv";
		//echo $csvname = $_SERVER['DOCUMENT_ROOT'].'/realstate/CSV/11.csv';
		echo $csvname = $_SERVER['DOCUMENT_ROOT'].'/realstate/assets/csv/23-04-2020_11_1117706344 properties.csv';
		
			$file = fopen($csvname, "r");
			$count = 0;
			while (($getData  = fgetcsv($file, 10000, ",")) !== FALSE){
				 //echo"<pre>";
			 // print_r($getData);
				
			$count++;
			 if ($count == 1) { 
			 continue;
			 //echo"<pre>";
				//print_r($getData);
					
			      /* $sql= "CREATE TABLE property6 ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,";
					foreach($getData as $key=> $getData){
					$column = $getData;
					$sql .=$column." VARCHAR(255),";
						
						
					}
				$sql .= ")";

				}
				echo $sql;
			 //$query = $this->db->query($Sql);*/
		}
		
		$data_Arr_1 = array(
					'geoid' => $getData[0],
					'sourceagent' => $getData[1],
					'parcelnumb' => $getData[2],
					'usecode' => $getData[3],
					'usedesc' => $getData[4],
					'zoning' => $getData[5],
					'zoning_description' => $getData[6],
					'struct' => $getData[7],
					'multistruct' => $getData[8],
					'structno' => $getData[9],
					'yearbuilt' => $getData[10],
					'numstories' => $getData[11],
					'numunits' => $getData[12],
					'structstyle' => $getData[13],
					'parvaltype' => $getData[14],
					'improvval' => $getData[15],
					'landval' => $getData[16],
					'parval' => $getData[17],
					'agval' => $getData[18],
					'saleprice' => $getData[19],
					'saledate' => $getData[20],
					'taxamt' => $getData[21],
					'owntype' => $getData[22],
					'owner' => $getData[23],
					'ownfrst' => $getData[24],
					'ownlast' =>$getData[25],
					'owner2' =>$getData[26],
					'owner3' =>$getData[27],
					'owner4' =>$getData[28],
					'subsurfown' =>$getData[29],
					'subowntype' =>$getData[30],
					'mailadd' =>$getData[31],
					'mail_address2' =>$getData[32],
					'careof' =>$getData[33],
					'mail_addno' =>$getData[34],
					'mail_addpref' =>$getData[35],
					'mail_addstr' =>$getData[36],
					'mail_addsttyp' =>$getData[37],
					'mail_addstsuf' =>$getData[38],
					'mail_unit' =>$getData[39],
					'mail_city' =>$getData[40],
					'mail_state2' =>$getData[41],
					'mail_zip' =>$getData[42],
					'mail_urbanization' =>$getData[43],
					'address' =>$getData[44],
					'address2' =>$getData[45],
					'saddno' =>$getData[46],
					'saddpref' =>$getData[47],
					'saddstr' =>$getData[48],
					'saddsttyp' =>$getData[49],
					'saddstsuf' =>$getData[50],
					'sunit' =>$getData[51],
					'scity' =>$getData[52],
					'original_address' =>$getData[53],
					'city' =>$getData[54],
					'county' =>$getData[55],
					'state2' =>$getData[56],
					'szip' =>$getData[57],
					'urbanization' =>$getData[58],
					'location_name ' =>$getData[59],
					'address_source' =>$getData[60],
					'legaldesc' =>$getData[61],
					'plat' =>$getData[62],
					'book' =>$getData[63]
				);
				
		$this->db->insert('dc_district_of_columbia_tbl_1', $data_Arr_1);
		$lastID =  $this->db->insert_id();
		if(isset($lastID)){
			
				$data_Arr_2 = array(
					'dc_Id' => $lastID,
					'page' => $getData[64],
					'block' => $getData[65],
					'lot' => $getData[66],
					'neighborhood' => $getData[67],
					'subdivision' => $getData[68],
					'census_tract' => $getData[69],
					'census_tract' => $getData[70],
					'census_blockgroup' => $getData[71],
					'sourceref' => $getData[72],
					'sourcedate' => $getData[73],
					'sourceurl' => $getData[74],
					'recrdareatx' => $getData[75],
					'recrdareano' => $getData[76],
					'gisacre' => $getData[77],
					'sqft' => $getData[78],
					'reviseddate' => $getData[79],
					'path' => $getData[80],
					'll_stable_id' => $getData[81],
					'll_uuid' => $getData[82],
					'll_updated_at' => $getData[83],
					'lbcs_activity' => $getData[84],
					'lbcs_function' => $getData[85],
					'lbcs_structure' => $getData[86],
					'lbcs_site' => $getData[87],
					'lbcs_ownership' => $getData[88],
					'py1year' =>$getData[89],
					'py1bal' =>$getData[90],
					'py1pen' =>$getData[91],
					'py1coll' =>$getData[92],
					'py1int' =>$getData[93],
					'p1totdue' =>$getData[94],
					'py1cr' =>$getData[95],
					'p1tax' =>$getData[96],
					'p1txsale' =>$getData[97],
					'py1fee' =>$getData[98],
					'py2cr' =>$getData[99],
					'py2tax' =>$getData[100],
					'py2totdue' =>$getData[101],
					'py2txsale' =>$getData[102],
					'py2bal' =>$getData[103],
					'py2pen' =>$getData[104],
					'py2int' =>$getData[105],
					'py2coll' =>$getData[106],
					'py2year' =>$getData[107],
					'py2fee' =>$getData[108],
					'mix1bldval' =>$getData[109],
					'mix1class' =>$getData[110],
					'mix1lndpct' =>$getData[111],
					'mix1lndval' =>$getData[112],
					'mix1bldpct' =>$getData[113],
					'mix1txtype' =>$getData[114],
					'mix1rate' =>$getData[115],
					'mix2txtype' =>$getData[116],
					'mix2lndval' =>$getData[117],
					'mix2rate' =>$getData[118],
					'mix2bldpct' =>$getData[119],
					'mix2lndpct' =>$getData[120],
					'mix2class' =>$getData[121],
					'mix2bldval' =>$getData[122],
					'assessment ' =>$getData[123],
					'oldland' =>$getData[124],
					'phaseland' =>$getData[125],
					'oldimpr' =>$getData[126]
					
					
				);
				
		 $this->db->insert('dc_district_of_columbia_tbl_2', $data_Arr_2);
		
		$data_Arr_3 = array(
					'dc_Id' => $lastID,
					'oldtotal' =>$getData[127],
					'phasebuild' =>$getData[128],
					'condo_page_num' =>$getData[129],
					'acceptcode' =>$getData[130],
					'instno' => $getData[131],
					'class3' => $getData[132],
					'cy1pen' => $getData[133],
					'cy1totdue' => $getData[134],
					'cy1coll' => $getData[135],
					'cy1fee' => $getData[136],
					'cy1int' => $getData[137],
					'cy1txsale' => $getData[138],
					'cy1tax' => $getData[139],
					'cy1year' => $getData[140],
					'cy1bal' => $getData[141],
					'cy1cr' => $getData[142],
					'cy2tax' => $getData[143],
					'cy2year' => $getData[144],
					'cy2bal' => $getData[145],
					'cy2txsale' => $getData[146],
					'cy2coll' => $getData[147],
					'cy2int' => $getData[148],
					'cy2cr' => $getData[149],
					'cy2pen' => $getData[150],
					'cy2totdue' => $getData[151],
					'qdrntname' => $getData[152],
					'saletype' => $getData[153],
					'txsaledesc' => $getData[154],
					'vaclnduse' => $getData[155],
					'mixeduse' =>$getData[156],
					'taxrate' =>$getData[157],
					'deeds' =>$getData[158],
					'mortgageco' =>$getData[159],
					'of_lot_seq' =>$getData[160],
					'square' =>$getData[161],
					'landarea' =>$getData[162],
					'capcurr' =>$getData[163],
					'prmsward' =>$getData[164],
					'capprop' =>$getData[165],
					'condo_book_num' =>$getData[166],
					'deedstatus' =>$getData[167],
					'delcode' =>$getData[168],
					'hstdcode' =>$getData[169],
					'ownocct' =>$getData[170],
					'coopunits' =>$getData[171],
					'trigroup' =>$getData[172],
					'streetcode' =>$getData[173],
					'highnumber' =>$getData[174],
					'lownumber' =>$getData[175],
					'pchildcode' =>$getData[176],
					'condolot' =>$getData[177],
					'qoz' =>$getData[178],
					'qoz_tract' =>$getData[179],
					'll_gisacre' =>$getData[180],
					'll_gissqft' =>$getData[181],
					'lng' =>$getData[182],
					'lat' =>$getData[183]
				
					
				);
				
				
				
		 $this->db->insert('dc_district_of_columbia_tbl_3', $data_Arr_3);	
		}
		
	}
		
		fclose($file);
	
 }
 
 
function cronJobForEmailPhone(){
		error_reporting(1);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		
		
		echo $Sql ="select ".$this->properties_table_4.".*,
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

		from  ".$this->properties_table_4.' limit 85000,99366';
		$query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		
		$Getresult = $query->result_array();
		
		
		foreach($Getresult as $result){
		$data = array(
					'contactPhone' => $result['contactPhone'],
					'contactEmail' => $result['contactEmail']
					);
					echo $result['id'];
					echo"<pre>";
		print_r($data);
		$this->db->where('id', $result['id']);
		 $this->db->update('nof4', $data);
				
		}
		
			
		}
 
 
}

?>