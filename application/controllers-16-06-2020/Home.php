<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 
    public function __construct(){
        parent::__construct();
        require_once APPPATH.'third_party/php-login-using-google/vendor/autoload.php';
        require_once APPPATH.'third_party/php-login-using-facebook-account/vendor/autoload.php';
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->model('Advancedsearch_Model');
    }
    
	public function index(){
		//Social Media Login//
		$google_client = new Google_Client();
		$google_client->setClientId('37271713316-3ackctq08q7fulva8e3oueef435gm7pu.apps.googleusercontent.com');
		$google_client->setClientSecret('JvqGpclD-dn0TXVdmN9KLfat');
		$google_client->setRedirectUri('http://crizalinfo.com/realstate/signin');
		$google_client->addScope('email');
		$google_client->addScope('profile');
		if(isset($_GET["code"])){
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			if(!isset($token['error'])){
				$google_client->setAccessToken($token['access_token']);
				$this->session->set_userdata('access_token',$token['access_token']);
				$google_service = new Google_Service_Oauth2($google_client);
				$data['userdata'] = $google_service->userinfo->get();
				$user_id = $this->login_model->userLoginmedia($data['userdata']);
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
				}
            }
			if(!$this->session->userdata('access_token')){
				$data_login_button['login_button']  = $google_client->createAuthUrl();
            }
			//Facebook login Start Here
			$facebook = new \Facebook\Facebook([
              'app_id'      => '234654097584683',
              'app_secret'     => '36d7fb664d90f0bcbefca4511f4cc313',
              'default_graph_version'  => 'v2.10'
            ]);
			$facebook_output = '';
			$facebook_helper = $facebook->getRedirectLoginHelper();
            if(isset($_GET['code'])){
				 if(isset($_SESSION['fb_access_token'])) {
					$fb_access_token = $_SESSION['fb_access_token'];
				 }
				 else{
					$fb_access_token = $facebook_helper->getAccessToken();
					$_SESSION['fb_access_token'] = $fb_access_token;
					$facebook->setDefaultAccessToken($_SESSION['fb_access_token']);
				  
				 }
				$_SESSION['user_id'] = '';
				$_SESSION['user_name'] = '';
				$_SESSION['user_email_address'] = '';
				$_SESSION['user_image'] = '';
				$graph_response = $facebook->get("/me?fields=name,email", $fb_access_token);
				$data['facebook_user_info'] = $graph_response->getGraphUser();
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
			}
            else{
				$facebook_permissions = ['email']; // Optional permissions
				$facebook_login_url = $facebook_helper->getLoginUrl('https://crizalinfo.com/realstate/signin/', $facebook_permissions);
				$data_login_button['facebook_login_url'] =  '<a href="'.$facebook_login_url.'" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i> ?? Login via facebook</a>';
            }
            //Facebook login End Here
            //date_default_timezone_set('Asia/Kolkata');
			$ipAddress = $_SERVER['REMOTE_ADDR'];
			$ipInfo  =file_get_contents('http://ip-api.com/json/'.$ipAddress);
			$ipInfo = json_decode($ipInfo);
			date_default_timezone_set($ipInfo->timezone);
			$this->Advancedsearch_Model->checkUserIpAddress($ipInfo->timezone,$ipInfo);
			$data['resultUser'] =$this->Advancedsearch_Model->getUserIpAddress();
			$data['zip'] =$this->Advancedsearch_Model->getAllZip();
			$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
			$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
			$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
			$data['ward'] =$this->Advancedsearch_Model->getAllWard();
			$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();
			$data['square_lot'] =$this->Advancedsearch_Model->square_lot();
			if(isset($_POST['submitBtn'])){ 
				$data['postData'] = unserialize($_POST['postdata']);
			}
			
			$this->load->view('templates/header',$data_login_button);
			$this->load->view('home/index',$data);
			$this->load->view('templates/footer');
	}
	
	
	public function homepage($page = 'homepage'){
		/*$ipAddress = $_SERVER['REMOTE_ADDR'];
		$ipInfo  =file_get_contents('http://ip-api.com/json/'.$ipAddress);
		$ipInfo = json_decode($ipInfo);*/
		
		//Social Media Login//
		$google_client = new Google_Client();
		$google_client->setClientId('37271713316-3ackctq08q7fulva8e3oueef435gm7pu.apps.googleusercontent.com');
        $google_client->setClientSecret('JvqGpclD-dn0TXVdmN9KLfat');
        $google_client->setRedirectUri('http://crizalinfo.com/realstate/signin');
        $google_client->addScope('email');
        $google_client->addScope('profile');
		if(isset($_GET["code"])){
			   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
				if(!isset($token['error'])){
					$google_client->setAccessToken($token['access_token']);
					$this->session->set_userdata('access_token',$token['access_token']);
					$google_service = new Google_Service_Oauth2($google_client);
					$data['userdata'] = $google_service->userinfo->get();
					$user_id = $this->login_model->userLoginmedia($data['userdata']);
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
				}
        }
        if(!$this->session->userdata('access_token')){
			$data_login_button['login_button']  = $google_client->createAuthUrl();
		}
		//Facebook login Start Here
			$facebook = new \Facebook\Facebook([
              'app_id'      => '234654097584683',
              'app_secret'     => '36d7fb664d90f0bcbefca4511f4cc313',
              'default_graph_version'  => 'v2.10'
            ]);
			$facebook_output = '';
			$facebook_helper = $facebook->getRedirectLoginHelper();
            if(isset($_GET['code'])){
				 if(isset($_SESSION['fb_access_token'])) {
					$fb_access_token = $_SESSION['fb_access_token'];
				 }
				 else{
					$fb_access_token = $facebook_helper->getAccessToken();
					$_SESSION['fb_access_token'] = $fb_access_token;
					$facebook->setDefaultAccessToken($_SESSION['fb_access_token']);
				  
				 }
				$_SESSION['user_id'] = '';
				$_SESSION['user_name'] = '';
				$_SESSION['user_email_address'] = '';
				$_SESSION['user_image'] = '';
				$graph_response = $facebook->get("/me?fields=name,email", $fb_access_token);
				$data['facebook_user_info'] = $graph_response->getGraphUser();
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
           }
            else{
             // Get login url
                $facebook_permissions = ['email']; // Optional permissions
				$facebook_login_url = $facebook_helper->getLoginUrl('https://crizalinfo.com/realstate/signin/', $facebook_permissions);
				$data_login_button['facebook_login_url'] =  '<a href="'.$facebook_login_url.'" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i> ?? Login via facebook</a>';
            }
			$ipAddress = $_SERVER['REMOTE_ADDR'];
			$ipInfo  =file_get_contents('http://ip-api.com/json/'.$ipAddress);
			$ipInfo = json_decode($ipInfo);
			date_default_timezone_set($ipInfo->timezone);
			$this->Advancedsearch_Model->checkUserIpAddress($ipInfo->timezone,$ipInfo);
			$data['resultUser'] =$this->Advancedsearch_Model->getUserIpAddress();
			$data['zip'] =$this->Advancedsearch_Model->getAllZip();
			$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
			$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
			$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
			$data['ward'] =$this->Advancedsearch_Model->getAllWard();
			$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();
			$this->load->view('templates/header-home',$data_login_button);
			$this->load->view('home/index-home',$data);
			$this->load->view('templates/footer-home');
	}
	
	
	public function clienthomepage(){
		/*$ipAddress = $_SERVER['REMOTE_ADDR'];
		$ipInfo  =file_get_contents('http://ip-api.com/json/'.$ipAddress);
		$ipInfo = json_decode($ipInfo);*/
		
		//Social Media Login//
		$google_client = new Google_Client();
		$google_client->setClientId('37271713316-3ackctq08q7fulva8e3oueef435gm7pu.apps.googleusercontent.com');
        $google_client->setClientSecret('JvqGpclD-dn0TXVdmN9KLfat');
        $google_client->setRedirectUri('http://crizalinfo.com/realstate/signin');
        $google_client->addScope('email');
        $google_client->addScope('profile');
		if(isset($_GET["code"])){
			   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
				if(!isset($token['error'])){
					$google_client->setAccessToken($token['access_token']);
					$this->session->set_userdata('access_token',$token['access_token']);
					$google_service = new Google_Service_Oauth2($google_client);
					$data['userdata'] = $google_service->userinfo->get();
					$user_id = $this->login_model->userLoginmedia($data['userdata']);
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
				}
        }
        if(!$this->session->userdata('access_token')){
			$data_login_button['login_button']  = $google_client->createAuthUrl();
		}
		//Facebook login Start Here
			$facebook = new \Facebook\Facebook([
              'app_id'      => '234654097584683',
              'app_secret'     => '36d7fb664d90f0bcbefca4511f4cc313',
              'default_graph_version'  => 'v2.10'
            ]);
			$facebook_output = '';
			$facebook_helper = $facebook->getRedirectLoginHelper();
            if(isset($_GET['code'])){
				 if(isset($_SESSION['fb_access_token'])) {
					$fb_access_token = $_SESSION['fb_access_token'];
				 }
				 else{
					$fb_access_token = $facebook_helper->getAccessToken();
					$_SESSION['fb_access_token'] = $fb_access_token;
					$facebook->setDefaultAccessToken($_SESSION['fb_access_token']);
				  
				 }
				$_SESSION['user_id'] = '';
				$_SESSION['user_name'] = '';
				$_SESSION['user_email_address'] = '';
				$_SESSION['user_image'] = '';
				$graph_response = $facebook->get("/me?fields=name,email", $fb_access_token);
				$data['facebook_user_info'] = $graph_response->getGraphUser();
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
           }
            else{
             // Get login url
                $facebook_permissions = ['email']; // Optional permissions
				$facebook_login_url = $facebook_helper->getLoginUrl('https://crizalinfo.com/realstate/signin/', $facebook_permissions);
				$data_login_button['facebook_login_url'] =  '<a href="'.$facebook_login_url.'" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i> ?? Login via facebook</a>';
            }
			$ipAddress = $_SERVER['REMOTE_ADDR'];
			$ipInfo  =file_get_contents('http://ip-api.com/json/'.$ipAddress);
			$ipInfo = json_decode($ipInfo);
			date_default_timezone_set($ipInfo->timezone);
			$this->Advancedsearch_Model->checkUserIpAddress($ipInfo->timezone,$ipInfo);
			$data['resultUser'] =$this->Advancedsearch_Model->getUserIpAddress();
			$data['zip'] =$this->Advancedsearch_Model->getAllZip();
			$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
			$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
			$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
			$data['ward'] =$this->Advancedsearch_Model->getAllWard();
			$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();
			$this->load->view('templates/header-home',$data_login_button);
			$this->load->view('home/index-home-client',$data);
			$this->load->view('templates/footer-home');
	}
		public function clientselecthomepage(){
		/*$ipAddress = $_SERVER['REMOTE_ADDR'];
		$ipInfo  =file_get_contents('http://ip-api.com/json/'.$ipAddress);
		$ipInfo = json_decode($ipInfo);*/
		
		//Social Media Login//
		$google_client = new Google_Client();
		$google_client->setClientId('37271713316-3ackctq08q7fulva8e3oueef435gm7pu.apps.googleusercontent.com');
        $google_client->setClientSecret('JvqGpclD-dn0TXVdmN9KLfat');
        $google_client->setRedirectUri('http://crizalinfo.com/realstate/signin');
        $google_client->addScope('email');
        $google_client->addScope('profile');
		if(isset($_GET["code"])){
			   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
				if(!isset($token['error'])){
					$google_client->setAccessToken($token['access_token']);
					$this->session->set_userdata('access_token',$token['access_token']);
					$google_service = new Google_Service_Oauth2($google_client);
					$data['userdata'] = $google_service->userinfo->get();
					$user_id = $this->login_model->userLoginmedia($data['userdata']);
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
				}
        }
        if(!$this->session->userdata('access_token')){
			$data_login_button['login_button']  = $google_client->createAuthUrl();
		}
		//Facebook login Start Here
			$facebook = new \Facebook\Facebook([
              'app_id'      => '234654097584683',
              'app_secret'     => '36d7fb664d90f0bcbefca4511f4cc313',
              'default_graph_version'  => 'v2.10'
            ]);
			$facebook_output = '';
			$facebook_helper = $facebook->getRedirectLoginHelper();
            if(isset($_GET['code'])){
				 if(isset($_SESSION['fb_access_token'])) {
					$fb_access_token = $_SESSION['fb_access_token'];
				 }
				 else{
					$fb_access_token = $facebook_helper->getAccessToken();
					$_SESSION['fb_access_token'] = $fb_access_token;
					$facebook->setDefaultAccessToken($_SESSION['fb_access_token']);
				  
				 }
				$_SESSION['user_id'] = '';
				$_SESSION['user_name'] = '';
				$_SESSION['user_email_address'] = '';
				$_SESSION['user_image'] = '';
				$graph_response = $facebook->get("/me?fields=name,email", $fb_access_token);
				$data['facebook_user_info'] = $graph_response->getGraphUser();
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
           }
            else{
             // Get login url
                $facebook_permissions = ['email']; // Optional permissions
				$facebook_login_url = $facebook_helper->getLoginUrl('https://crizalinfo.com/realstate/signin/', $facebook_permissions);
				$data_login_button['facebook_login_url'] =  '<a href="'.$facebook_login_url.'" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i> ?? Login via facebook</a>';
            }
			$ipAddress = $_SERVER['REMOTE_ADDR'];
			$ipInfo  =file_get_contents('http://ip-api.com/json/'.$ipAddress);
			$ipInfo = json_decode($ipInfo);
			date_default_timezone_set($ipInfo->timezone);
			$this->Advancedsearch_Model->checkUserIpAddress($ipInfo->timezone,$ipInfo);
			$data['resultUser'] =$this->Advancedsearch_Model->getUserIpAddress();
			$data['zip'] =$this->Advancedsearch_Model->getAllZip();
			$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
			$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
			$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
			$data['ward'] =$this->Advancedsearch_Model->getAllWard();
			$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();
			$this->load->view('templates/header-home',$data_login_button);
			$this->load->view('home/index-home-select',$data);
			$this->load->view('templates/footer-home');
	}
	public function textSearch(){
		$result =$this->Advancedsearch_Model->textSearch(); 
		echo json_encode($result); 
	}
	public function textSearchScroll(){
		$result =$this->Advancedsearch_Model->textSearchScroll(); 
		echo json_encode($result); 
	}
	public function square_lot(){
		$result = $this->Advancedsearch_Model->square_lot();
		echo json_encode($result); 
	}
}
