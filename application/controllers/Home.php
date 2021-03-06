<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->config('email');
        $this->load->library('email');
        $this->load->model('login_model');
        $this->load->model('Advancedsearch_Model');
       }
    
	public function index(){
	    $data['zip'] =$this->Advancedsearch_Model->getAllZip();
		$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
		$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
		$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
		$data['ward'] =$this->Advancedsearch_Model->getAllWard();
		$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();
		if(isset($_POST['submitBtn'])){ 
		 $data['postData'] = unserialize($_POST['postdata']);
		}
		
		/*$data_login_button['title'] = 'Home';
		if ($this->facebook->logged_in()){
			$user = $this->facebook->user();
			if ($user['code'] === 200){
				$this->session->set_userdata('login',true);
				$this->session->set_userdata('user_profile',$user['data']);
				
			}

		}else{
			$data_login_button['link'] = $this->facebook->login_url();
		}*/

		$this->load->view('templates/header');
		$this->load->view('home/index',$data);
		$this->load->view('templates/footer');
	}
	
	public function pricing(){
		$result =$this->Advancedsearch_Model->updateUserid();
		$data['title'] = 'Pricing';
		$this->load->view('templates/header');
		$this->load->view('home/pricing',$data);
		$this->load->view('templates/footer');
	}
	public function OurData(){
		$data['title'] = 'Pricing';
		$this->load->view('templates/header');
		$this->load->view('home/our-data',$data);
		$this->load->view('templates/footer');
	}
	
}
