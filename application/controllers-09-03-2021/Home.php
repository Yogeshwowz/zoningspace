<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
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

		$this->load->view('templates/header',$data_login_button);
		$this->load->view('home/index',$data);
		$this->load->view('templates/footer');
	}
	 public function pricing(){
		$this->load->view('templates/header');
		$this->load->view('home/pricing');
		$this->load->view('templates/footer');
	}
	
	
	
}
