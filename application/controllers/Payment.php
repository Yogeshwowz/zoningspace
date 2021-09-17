<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Payment extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->model('Advancedsearch_Model');
        $this->load->model('Payment_model');
    }
	public function paymentMethod($id){
		$this->load->view('templates/header');
		$this->load->view('home/paymentmethod');
		$this->load->view('templates/footer');
	}
    
   
}

?>