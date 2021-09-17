<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Administrator_model extends CI_Model{
    
	protected $properties_table = 'nof5';
	protected $nof10 = 'nof10';
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
		if($this->session->userdata('role')==3){
			$this->db->where('reseacher_id',$this->session->userdata('userId'));
		}
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
	


function cronJobForEmailPhone(){
		error_reporting(1);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		
		
		echo $Sql ="select ".$this->nof10.".*,
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

		from  ".$this->nof10." limit 100000,104520";
		$query = $this->db->query($Sql);
		$numRow = $query->num_rows();
		
		$Getresult = $query->result_array();
		
		
		foreach($Getresult as $result){
		$data = array(
					'contactPhone' => $result['contactPhone'],
					'contactEmail' => $result['contactEmail']
					);
					
					echo"<pre>";
		print_r($data);
		$this->db->where('id', $result['id']);
		 $this->db->update($this->nof10, $data);
				
		}
		
			
		}
		function dataSubmitted(){
		$this->db->select('tbl_export_file.*,tbl_users.name');
		$this->db->where('tbl_export_file.user_id',$this->session->userdata('userId'));
		$this->db->from('tbl_export_file');
		$this->db->join('tbl_users','tbl_users.userId  = tbl_export_file.user_id');
		$query = $this->db->get();
		return $query->result_array();
    }
	public function assigned_researcher(){
		$id = $this->input->post('user_id');  
		$orderid = $this->input->post('orderid');  
		$data = array(
					'reseacher_id' => $id
					);
				
	    $this->db->where('order_id', $orderid);
		$result = $this->db->update('tbl_orders', $data);
		if($result){ 
		 return 1;
		}
		  
	}
	function getusernameById($id){
		$this->db->from('tbl_users');
		$this->db->where('userId', $id);
		$query = $this->db->get();
		return $query->row_array();
    }	
    function send($to,$subject,$message) {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $to = $to;
        $subject = $subject;
        $message = $message;

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
			return 1;
            //echo 'Your Email has successfully been sent.';
        } else {
			return 0;
            //show_error($this->email->print_debugger());
        }
    }
}

?>