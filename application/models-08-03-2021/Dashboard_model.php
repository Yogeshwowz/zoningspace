<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
	
	protected $properties_table = 'nof5';
	// Get Save Search 
    function getSavedSearch(){
        $this->db->from('tbl_save_search');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('single_record_id', 0);
        $this->db->where('status', 'pending');
        $query = $this->db->get();
        return $query->result_array();
    }
	function getSavedSearchByID($id){
		$this->db->from('tbl_save_search');
        $this->db->where('search_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
	function addcart($id){
		$this->db->from('cart');
		$this->db->where('search_id',$id);
        $result = $this->db->get();
		if($result->num_rows() == 0){
			$data = array(
			'user_id' =>$this->session->userdata('user_id'),
			'browser_id' => session_id(),
			'search_id' =>$id,
			'created_date' =>date('Y-m-d H:i:s')
			);
			return $this->db->insert('cart', $data);
		}
	}
	function getCart(){
		$this->db->select('cart.*,tbl_save_search.*');
        $this->db->from('cart');
        $this->db->join('tbl_save_search','tbl_save_search.search_id  = cart.search_id');
		if($this->session->userdata('user_id')!=''){
			$this->db->where('cart.user_id', $this->session->userdata('user_id'));	
		}else{
			$this->db->where('cart.browser_id', session_id());
		}
        
		$query = $this->db->get();
		 return $query->result_array();
    }
	function removeCartItem(){
		$this->db->where('cartid ', $_POST['removeitem']);
		return $this->db->delete('cart');
    }
	function getbuySearch(){
		$this->db->select('tbl_orders.*,tbl_orders.created_date as orderdate,tbl_save_search.*');
		$this->db->order_by("order_id", "desc");
		$this->db->from('tbl_orders');
		$this->db->join('tbl_save_search','tbl_save_search.search_id  = tbl_orders.search_id');
		if($this->session->userdata('user_id'))
		$this->db->where('tbl_orders.user_id', $this->session->userdata('user_id'));
		$query = $this->db->get();
		return $query->result_array();
    }
	public function buysinglesearch($id){
		$this->db->from('tbl_save_search');
		$this->db->where('single_record_id',$id);
		$result = $this->db->get();
		if($result->num_rows() == 0){
			$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'searchName' => 'Search-'.$id,
					'search_data' => '',
					'empty_status' => 1,
					'rowcount' => 1,
					'single_record_id' => $id,
					'created_date' => date("Y-m-d H:i:s")
				);
				
			$result = $this->db->insert('tbl_save_search', $data);
			$lastid =  $this->db->insert_id();
			 $this->addcart($lastid);
		}
		else{
			$record = $result->row_array();
			$this->addcart($record['search_id']);
		}
	}
	
	public function buySavesearch(){
	$arrayCartid =array();
	$arrayalreadyid =array();
	foreach($_POST['seachcheckid'] as $id){
		$this->db->from('tbl_save_search');
		$this->db->where('single_record_id',$id);
        $result = $this->db->get();
		if($result->num_rows() == 0){
			$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'searchName' => 'Search-'.$id,
					'search_data' => '',
					'empty_status' => 1,
					'rowcount' => 1,
					'single_record_id' => $id,
					'created_date' => date("Y-m-d H:i:s")
				);
				
			$result = $this->db->insert('tbl_save_search', $data);
			if($result){ 
				$SearchId= $this->db->insert_id();
				$result = $this->addcart($SearchId);
				$arrayCartid[] =$SearchId;
			}
	
		}else{
			$record = $result->row_array();
			$this->addcart($record['search_id']);
		}
	}
	
	//return $arrayCartid;
	}
	public function buysinglesearchdata(){
		 $break_array = explode(',', $_POST['searchbox']);
		
		 if(!empty($break_array[0])){
			$address = trim($break_array[0]).', '.trim($break_array[1]).', '.trim($break_array[2]).', '.trim($break_array[3]);
			$where  = " where short_address = '".$address."' OR long_address='".$address."'";
			$Sql ="select id from  ".$this->properties_table.$where;
			$query = $this->db->query($Sql);
			$numRow = $query->num_rows();
			if($numRow > 0){
				$getresult = $query->row_array();
					$data = array(
								'user_id' => $this->session->userdata('user_id'),
								'browser_id' => session_id(),
								'searchName' => 'Search-'.rand(),
								'search_data' => '',
								'empty_status' => 1,
								'rowcount' => 1,
								'single_record_id' => 1,
								'created_date' => date("Y-m-d H:i:s")
							);
					$result = $this->db->insert('tbl_save_search', $data);
						$lastid =  $this->db->insert_id();
						 $this->addcart($lastid);
						 echo 1;
				}else{
					echo 0;
				}
			}
		}


}

  