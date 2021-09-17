<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Emailsend (EmailsendController)
 * Register class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Emailsend extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        //$this->load->model('login_model');
        //$this->load->model('Advancedsearch_Model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
           $mailto="sunpreetckd@gmail.com";  //Enter recipient email address here

            $subject = "Cron Job Test";
            
            $from="shaanaku@gmail.com";          //Your valid email address here
            
            $message_body = "This is a test email from RealEstate.";
            
            $send =  mail($mailto,$subject,$message_body,"From:".$from);
            if($send){
            echo "Your email has been sent successfully";
            }else{
             echo "Not Send Email";
            }
    }
   
}

?>