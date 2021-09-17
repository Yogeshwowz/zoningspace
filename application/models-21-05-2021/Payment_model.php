<?php
	class Payment_model extends CI_Model
	{
		protected $users = 'tbl_users';
		public function __construct()
		{
			$this->load->database();
		}
		
		public function userPlan(){
			if($_POST['subscription']==1){
				$expired_date = date('Y-m-d H:i:s', strtotime('+1 years'));
				$connects = 5000;
			}
			if($_POST['subscription']==2){
				$expired_date = date('Y-m-d H:i:s', strtotime('+1 years'));
				$connects = 15000;
			}
			if($_POST['subscription']==3){
				$expired_date = date('Y-m-d H:i:s', strtotime('+1 months'));
				$connects = 500;
			}
			if($_POST['subscription']==4){
				$expired_date = date('Y-m-d H:i:s', strtotime('+1 months'));
				$connects = 1000;
			}
			
			$date = array(		
				'packageamount' => $_POST['packageamount'],
				'subscription' => $_POST['subscription'],
				'payment_status' => 'pending',
				'expired_date' => $expired_date,
				'connects' => $connects
			);
			$this->db->where('userId ', $this->session->userdata('user_id'));
			return $this->db->update($this->users, $date);
		}
		public function userPlanUpdateAfterPayment(){
			$date = array(		
			'payment_status' => 'complete'
			);
			$this->db->where('userId ', $this->session->userdata('user_id'));
			return $this->db->update($this->users, $date);
		}
		
		public function userConnectUpdateAfterPayment($connects){
			$this->db->from($this->users);
			$this->db->where('userId ', $this->session->userdata('user_id'));
			$query = $this->db->get();
			$getR = $query->row_array();
			$leftconnect = $getR['connects']  + $connects;
			
			if($getR['subscription']==1){
				$expired_date = date('Y-m-d H:i:s', strtotime('+1 years'));
				
			}
			if($getR['subscription']==2){
				$expired_date = date('Y-m-d H:i:s', strtotime('+1 years'));
				
			}
			if($getR['subscription']==3){
				$expired_date = date('Y-m-d H:i:s', strtotime('+1 months'));
				$connects = 500;
			}
			if($getR['subscription']==4){
				$expired_date = date('Y-m-d H:i:s', strtotime('+1 months'));
				
			}
			
			$date = array(		
				'connects' => $leftconnect,
				'expired_date' => $expired_date
			);
			$this->db->where('userId ', $this->session->userdata('user_id'));
			return $this->db->update($this->users, $date);
		}
}