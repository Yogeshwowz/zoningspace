<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Register (RegisterController)
 * Register class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Facebook extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        require_once APPPATH.'third_party/php-login-using-google/vendor/autoload.php';
        require_once APPPATH.'third_party/php-login-using-facebook-account/vendor/autoload.php';
        $this->load->helper('url');
        $this->load->library('session');
        //$this->load->library('google');
        $this->load->model('login_model');
        $this->load->model('Advancedsearch_Model');
    }

    /**
     * Index Page for this controller.
     */



    // Log in Admin
        public function signin1(){

            //Facebook login Start Here

            $facebook = new \Facebook\Facebook([
              'app_id'      => '234654097584683',
              'app_secret'     => '36d7fb664d90f0bcbefca4511f4cc313',
              'default_graph_version'  => 'v2.10'
            ]);

            $facebook_output = '';

            $facebook_helper = $facebook->getRedirectLoginHelper();
            //echo "<pre>"; print_r($facebook_helper); die;
            if(isset($_GET['code']))
            {
             if(isset($_SESSION['access_token']))
             {
              $access_token = $_SESSION['access_token'];
             }
             else
             {
              $access_token = $facebook_helper->getAccessToken();
              //echo "<pre>"; print_r($access_token); die;

              $_SESSION['access_token'] = $access_token;

              $facebook->setDefaultAccessToken($_SESSION['access_token']);
             }

             $_SESSION['user_id'] = '';
             $_SESSION['user_name'] = '';
             $_SESSION['user_email_address'] = '';
             $_SESSION['user_image'] = '';

             $graph_response = $facebook->get("/me?fields=name,email", $access_token);

             $facebook_user_info = $graph_response->getGraphUser();
             echo "<pre>"; print_r($facebook_user_info); die;
             
            }
            else
            {
             // Get login url
                $facebook_permissions = ['email']; // Optional permissions

                //$facebook_login_url = $facebook_helper->getLoginUrl('https://greenhouses-pro.co.uk/demo/', $facebook_permissions);
                 $facebook_login_url = $facebook_helper->getLoginUrl('https://crizalinfo.com/realstate/facebook/signin1', $facebook_permissions);
                //echo "<pre>"; print_r($facebook_login_url); die;
                //$data['facebook_button'] = $facebook_login_url;
                // Render Facebook login button
                /*$data['facebook_login_url'] = '<div align="center"><a href="'.$facebook_login_url.'"><img src="php-login-with-facebook.gif" /></a></div>';*/

             echo  $data['facebook_login_url'] =  '<a href="'.$facebook_login_url.'" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>';
            }
            //Facebook login End Here
            //echo "<pre>"; print_r($data['facebook_login_url']); die;    
            
           
            $data['title'] = 'User Login';
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('home/login', $data);
                $this->load->view('templates/footer');
            }else{
                // get email and Encrypt Password
                $email = $this->input->post('email');
                $encrypt_password = md5($this->input->post('password'));

                $user_id = $this->login_model->userLogin($email, $encrypt_password);
              if ($user_id) {
                    //Create Session
                    $get_role=$this->login_model->get_user_role($user_id->roleId);
                   $user_data = array(
                                'user_id' => $user_id->userId,
                                'username' => $user_id->name,
                                'email' => $user_id->email
                    );

                    $this->session->set_userdata($user_data);
                    redirect('/');
                }else{
                    $this->session->set_flashdata('danger', 'Login Credential in invalid!');
                    redirect('login/signin');
                }
                
            }
        }


    
    
   
}

?>