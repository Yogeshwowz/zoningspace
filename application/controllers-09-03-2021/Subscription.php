<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Register (RegisterController)
 * Register class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Subscription extends CI_Controller
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
    }

    /**
     * Index Page for this controller.
     */
    public function index($page = 'subscription')
    {
        if (!file_exists(APPPATH.'views/home/'.$page.'.php')) {
            show_404();
           }
             
                 $this->load->view('templates/header');
                 $this->load->view('home/'.$page, $data);
                 $this->load->view('templates/footer');
    }
   
}

?>