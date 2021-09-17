<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Register (RegisterController)
 * Register class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Payment extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->model('Advancedsearch_Model');
        $this->load->model('Payment_model');
    }

    /**
     * Index Page for this controller.
     */
    public function paymentModule($page = 'payment'){
       $this->load->view('templates/header');
        $this->load->view('home/paymentmodule');
        $this->load->view('templates/footer');
    }

	 public function paymentMethod($page = 'payment'){
	 if(empty($_POST['totalamount'])) {redirect('cart');}else{
		$this->load->view('templates/header');
		$this->load->view('home/paymentmethod');
		$this->load->view('templates/footer');
		}
		
    }
    
   
}

?>