<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
	
	protected $properties_table = 'nof5';
	protected $users = 'tbl_users';
	protected $save_search = 'tbl_save_search';
	
	
	
	public function getUsersInformation() {
        $query = $this->db->where('userId',$this->session->userdata('user_id'))->get($this->users);
		return $query->row_array();
    }
	public function getMembers() {
        $query = $this->db->where('createdBy',$this->session->userdata('user_id'))->get($this->users);
		return $query->result_array();
    }
	
	
	//Buy Search Data
		public function buySearch(){
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $searcharray);
			}
			$searchName = 'zoningspace-'.rand();
			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'searchName' => $searchName,
				'search_data' => json_encode($searcharray),
				'empty_status' => 0,
				'status' => 'complete',
				'created_date' => date("Y-m-d H:i:s")
			);
			if(!empty($_POST['radio_search_type']) && $_POST['radio_search_type']==2){
				if(!empty($_POST['checkboxarray'])){
					$data['record_ids'] = serialize($_POST['checkboxarray']);
					$data['buy_type'] = $_POST['radio_search_type'];
					$data['rowcount'] = count($_POST['checkboxarray']);
					$data['single_record_id'] = 1;
					
				}
			}
			if(!empty($_POST['radio_search_type']) && $_POST['radio_search_type']==1){
					$data['buy_type'] = $_POST['radio_search_type'];
					$data['rowcount'] = $_POST['allcount'];
					$data['single_record_id'] = 0;
			}
			
			
			$result = $this->db->insert($this->save_search, $data);
			if($result){ 
			$userData = $this->getUsersInformation();
			$connects = $userData['connects'];
			$leftConnets = $connects - $_POST['allcount'];
			$UpdateSql ="update ".$this->users." set connects= '".$leftConnets."' where userId = '".$this->session->userdata('user_id')."'";
			$this->db->query($UpdateSql);
			return 1;
			}else{ return 0;}
				
		}
	
	// Buy search Record
	function getbuySearch(){
        $this->db->from($this->save_search);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('status', 'complete');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
	
}

  