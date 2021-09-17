<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Register (RegisterController)
 * Register class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Login extends CI_Controller
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
        $this->load->config('email');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->model('Advancedsearch_Model');
    }

    /**
     * Index Page for this controller.
     */
    public function index($page = 'register')
    {
        if (!file_exists(APPPATH.'views/home/'.$page.'.php')) {
            show_404();
           }

            $data['title'] = 'Create User';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');           

            if($this->form_validation->run() === FALSE){                
                 $this->load->view('templates/header');
                 $this->load->view('home/'.$page, $data);
                 $this->load->view('templates/footer');
            }else{
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $to = $email;
                $subject = "RealEstate User Register";
                $form_message = "Thank you for registering Us.";
            $message ='<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width"/>
    </head>
    <body style="width:100%;height:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
            <tr>
                <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                        <tr>
                            <td valign="top" align="center" class="masthead" style="padding:20px 0;background:#03618c;color:white;">
                                <h1 style="font-size:32px;margin:0 auto;max-width:90%;line-height:1.25;">
                                    <a href="<?php echo site_url(); ?>" target="_blank" style="text-decoration:none;color:#ffffff;">REAL ESTATE BUSINESS</a>
                                    <p style="margin-bottom:0;line-height:12px;font-weight:normal;margin-top:15px;font-size:18px;"></p>
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="content" style="background:white;padding:20px 35px 10px 35px;">
                                <h4 style="font-size:20px;margin-bottom:10px;line-height:1.25;">Hello User,</h4>
                               
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Name:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$name.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Email:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$email.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Password:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$password.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Subject:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$subject.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
							<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Message:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$form_message.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>            
        </table>
    </body>
</html>';


            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <shaanaku@gmail.com>' . "\r\n";
           
            
            $sendmail = mail($to,$subject,$message,$headers);
            if($sendmail){
                echo 1;
                $this->login_model->add_user();
                //Set Message
                $this->session->set_flashdata('success', 'User has been created Successfull.');
                redirect('login');
            }else{
                echo 0;
            }
                
               /* $this->login_model->add_user();
                //Set Message
                $this->session->set_flashdata('success', 'User has been created Successfull.');
                redirect('login');*/
            }

    }


    // Log in Admin
        public function signin(){
        $google_client = new Google_Client();
        $google_client->setClientId('37271713316-3ackctq08q7fulva8e3oueef435gm7pu.apps.googleusercontent.com');
        $google_client->setClientSecret('JvqGpclD-dn0TXVdmN9KLfat');
        $google_client->setRedirectUri('http://crizalinfo.com/realstate/signin');
        $google_client->addScope('email');
        $google_client->addScope('profile');

        if(isset($_GET["code"]))
            {
            
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            if(!isset($token['error']))
            {
            //Set the access token used for requests
            $google_client->setAccessToken($token['access_token']);

            //Store "access_token" value in $_SESSION variable for future use.
            //$_SESSION['access_token'] = $token['access_token']);;
            $this->session->set_userdata('access_token',$token['access_token']);
            //Create Object of Google Service OAuth 2 class
            $google_service = new Google_Service_Oauth2($google_client);

            //Get user profile data from google
            $data['userdata'] = $google_service->userinfo->get();
              
            $user_id = $this->login_model->userLoginmedia($data['userdata']);
                $name = $user_id['name'];
                $email = $user_id['email'];
                $password = '123456';
                $to = $email;
                $subject = "RealEstate User Register";
                $form_message = "Thank you for registering Us.";
            $message ='<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width"/>
    </head>
    <body style="width:100%;height:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
            <tr>
                <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                        <tr>
                            <td valign="top" align="center" class="masthead" style="padding:20px 0;background:#03618c;color:white;">
                                <h1 style="font-size:32px;margin:0 auto;max-width:90%;line-height:1.25;">
                                    <a href="<?php echo site_url(); ?>" target="_blank" style="text-decoration:none;color:#ffffff;">REAL ESTATE BUSINESS</a>
                                    <p style="margin-bottom:0;line-height:12px;font-weight:normal;margin-top:15px;font-size:18px;"></p>
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="content" style="background:white;padding:20px 35px 10px 35px;">
                                <h4 style="font-size:20px;margin-bottom:10px;line-height:1.25;">Hello User,</h4>
                               
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Name:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$name.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Email:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$email.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Password:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$password.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Subject:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$subject.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
							<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Message:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$form_message.'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>            
        </table>
    </body>
</html>';


            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <shaanaku@gmail.com>' . "\r\n";
           
            
            $sendmail = mail($to,$subject,$message,$headers);
            if($sendmail){
                echo 1;
                if ($user_id) {
                   $get_role=$this->login_model->get_user_role($user_id['roleId']);
                    $user_data = array(
                                'user_id' => $user_id['userId'],
                                'username' => $user_id['name'],
                                'email' => $user_id['email']
                    );
                $this->session->set_userdata($user_data);
                 redirect('/');
            
                }
            }else{
                echo 0;
            }
                /*if ($user_id) {
                   $get_role=$this->login_model->get_user_role($user_id['roleId']);
                    $user_data = array(
                                'user_id' => $user_id['userId'],
                                'username' => $user_id['name'],
                                'email' => $user_id['email']
                    );
                $this->session->set_userdata($user_data);
                 redirect('/');
            
                }*/
           
            }
            }
           
            
            if(!$this->session->userdata('access_token')){
                $data['login_button']  = $google_client->createAuthUrl();
            }
            
//Facebook login Start Here

            $facebook = new \Facebook\Facebook([
              //'app_id'      => '234654097584683',
              'app_id'      => '2515773352025578',
              //'app_secret'     => '36d7fb664d90f0bcbefca4511f4cc313',
              'app_secret'     => '090491367d0eb2f088d5b99a26a926e0',
              'default_graph_version'  => 'v2.10'
            ]);

            $facebook_output = '';

            $facebook_helper = $facebook->getRedirectLoginHelper();
            //echo "<pre>"; print_r($facebook_helper); die;
            if(isset($_GET['code']))
            {
                //echo "Here"; die;
             if(isset($_SESSION['fb_access_token']))
             {
              $fb_access_token = $_SESSION['fb_access_token'];
             }
             else
             {
              $fb_access_token = $facebook_helper->getAccessToken();
                $_SESSION['fb_access_token'] = $fb_access_token;
            
                //$this->session->set_userdata('fb_access_token',$fb_access_token);
                //echo "<pre>"; print_r($this->session->set_userdata); die;
              $facebook->setDefaultAccessToken($_SESSION['fb_access_token']);
              //$facebook->setDefaultAccessToken($this->session->set_userdata('fb_access_token'));
             }

             $_SESSION['user_id'] = '';
             $_SESSION['user_name'] = '';
             $_SESSION['user_email_address'] = '';
             $_SESSION['user_image'] = '';

             $graph_response = $facebook->get("/me?fields=name,email", $fb_access_token);

             $data['facebook_user_info'] = $graph_response->getGraphUser();
             //echo "<pre>"; print_r($data['facebook_user_info']); die;
             
              $user_id = $this->login_model->facebookLoginmedia($data['facebook_user_info']);
                if ($user_id) {
                   $get_role=$this->login_model->get_user_role($user_id['roleId']);
                    $user_data = array(
                                'user_id' => $user_id['userId'],
                                'username' => $user_id['name'],
                                'email' => $user_id['email']
                    );
                $this->session->set_userdata($user_data);
                 redirect('/');
            
                }
             //echo "<pre>"; print_r($facebook_user_info); die;
             
            }
            else
            {
             // Get login url
                $facebook_permissions = ['email']; // Optional permissions\
                $facebook_login_url = $facebook_helper->getLoginUrl('https://crizalinfo.com/realstate/signin/', $facebook_permissions);
                //echo "<pre>"; print_r($facebook_login_url); die;
                //$data['facebook_button'] = $facebook_login_url;
                // Render Facebook login button
                /*$data['facebook_login_url'] = '<div align="center"><a href="'.$facebook_login_url.'"><img src="php-login-with-facebook.gif" /></a></div>';*/

              $data['facebook_login_url'] =  '<a href="'.$facebook_login_url.'" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-f"></i>   Login via facebook</a>';
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

		public function logout(){
            $accesstoken=$this->session->userdata('access_token');
            $google_client = new Google_Client();
            $google_client->setClientId('37271713316-3ackctq08q7fulva8e3oueef435gm7pu.apps.googleusercontent.com');
            $google_client->setClientSecret('JvqGpclD-dn0TXVdmN9KLfat');
            $google_client->setRedirectUri('http://crizalinfo.com/realstate/signin');
            $google_client->addScope('email');
            $google_client->addScope('profile');
            $google_client->revokeToken($accesstoken);
            
            $fb_access_token = $this->session->userdata('fb_access_token');
           
            $facebook = new \Facebook\Facebook([
              //'app_id'      => '234654097584683',
              'app_id'      => '2515773352025578',
              //'app_secret'     => '36d7fb664d90f0bcbefca4511f4cc313',
              'app_secret'     => '090491367d0eb2f088d5b99a26a926e0',
              'default_graph_version'  => 'v2.10'
            ]);    
            
            //$facebook->delete("/me?fields=name,email", $fb_access_token);
            $this->session->unset_userdata('fb_access_token');
    
            //Destroy entire session data.
            
            $this->session->unset_userdata('access_token');
            $this->session->unset_userdata('user_data');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('email');
                session_destroy();
                redirect('/');
        }
        

        // Check Email exists
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'This email is already registered.');
            //$this->session->set_flashdata('check_email_exists', 'This email is already registered.');
            if ($this->login_model->check_email_exists($email)) {
                return true;
            }else{
                return false;
            }
        }

        public function oauth2callback(){
			$google_data=$this->google->validate();
			$session_data=array(
                'name'=>$google_data['name'],
                'email'=>$google_data['email'],
                'source'=>'google',
                'profile_pic'=>$google_data['profile_pic'],
                'link'=>$google_data['link'],
                'sess_logged_in'=>1
                );
            $this->session->set_userdata($session_data);
            redirect(base_url());
        }
		
		 // User Dash Board
		public function dashboard($page = 'userdashboard'){
		if (!file_exists(APPPATH.'views/userdashboard/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = 'User Dashbaord';
			$this->load->view('templates/header');
			$this->load->view('userdashboard/'.$page, $data);
			$this->load->view('templates/footer');
		}
		
		public function userloginWithAjax(){
			$result =$this->login_model->userloginWithAjax();
			if($result){ 
				$user_data = array(
								'user_id' => $result['userId'],
								'username' => $result['name'],
								'email' => $result['email']
					);
				$this->session->set_userdata($user_data);
				echo 1; 
			}else{ echo 0;}
		}
		public function userRegistartionWithAjax(){
			$checkuser =$this->login_model->check_email_exists($_POST['email']);
			if($checkuser){ 
				$result = $this->login_model->add_user();
               echo 1; 
			}else{ echo 2;}
		}
		
		
		
    
    
   
}

?>