<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->config('email');
        $this->load->library('email');
        $this->load->model('login_model');
        $this->load->model('Dashboard_model');
       }
    
	
	public function getData(){

		$query = $this->db->limit('8000', '0')->get('nof5');
		$result = $query->result_array();
		echo json_encode($result);
	}
	
}
