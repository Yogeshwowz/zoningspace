<?php
	class Payment_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

	public function add_payment($chargeJson){
		$order_array  = $chargeJson['metadata']['order_id_array'];
			$userName  = $chargeJson['metadata']['carduserName'];
			$order_id_array =explode(',',$order_array);
			
			$amount  = $chargeJson['amount']/100;
			foreach($order_id_array as $order_id_array){
				$UpdateorderData = array(
						'amount' =>$amount,
						'payment_status' =>'complete',
						'order_data' =>json_encode($chargeJson),
						'show_download_button_date' =>date("Y-m-d H:i:s", strtotime("+ 1 day"))
				);
				$this->db->where('order_id', $order_id_array);
				$this->db->update('tbl_orders', $UpdateorderData);
				
				$this->db->from('tbl_orders');
				$this->db->where('order_id', $order_id_array);
				$query = $this->db->get();
				$result = $query->row_array();
				
				$data = array(
						'status' =>'complete'
						
				);
				 $this->db->where('search_id ', $result['search_id']);
				$this->db->update('tbl_save_search', $data);
			}
				
		}
	
		
	public function create_order(){
		$package_id = json_decode($_POST['searchid']);
		$subscription = json_decode($_POST['subscription']);
		$packageamount = json_decode($_POST['packageamount']);
		$keys   = $package_id;
		$names  = $subscription;
		$amount = $packageamount;
       $result = array();

			foreach ($keys as $id => $key) {
				$result[$key] = array(
				'searchid'  => $keys[$id],
				'subscription'  => $names[$id],
				'packamount' => $amount[$id]
				
				);
			}
			$arrayorderid =array();
			foreach($result as $result){
			$data = array(
							'user_id' => $this->session->userdata('user_id'),
							'search_id' => $result['searchid'],
							'amount' => $_POST['amount'],
							'packamount' => $result['packamount'],
							'package_id' => $result['subscription'],
							'payment_status' => 'Pending',
							'created_date' => date("Y-m-d H:i:s")
						);
						
					$this->db->insert('tbl_orders', $data);
					$arrayorderid[] = $this->db->insert_id();
			}
			return $arrayorderid;
	}
	function cart_empty(){
		$this->db->where('user_id ', $this->session->userdata('user_id'));
		return $this->db->delete('cart');
    }
	
	public function add_paymentbyPaypal(){
		$order_array  = json_decode($_REQUEST['cm']);
		$order_id_array =explode(',',$order_array->orderid);
		$amount  = $_REQUEST['amt'];
		foreach($order_id_array as $order_id_array){
			$UpdateorderData = array(
					'amount' =>$amount,
					'payment_status' =>'complete',
					'order_data' =>json_encode($_REQUEST)
			);
			$this->db->where('order_id', $order_id_array);
			$this->db->update('tbl_orders', $UpdateorderData);
			
			$this->db->from('tbl_orders');
			$this->db->where('order_id', $order_id_array);
			$query = $this->db->get();
			$result = $query->row_array();
			
			$data = array(
					'status' =>'complete'
					
			);
			 $this->db->where('search_id ', $result['search_id']);
			$this->db->update('tbl_save_search', $data);
			}
				
	}
		
}