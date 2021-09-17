<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advancedsearch extends CI_Controller {


	public function __construct() {
       parent::__construct();
	    require_once APPPATH.'third_party/php-login-using-google/vendor/autoload.php';
        require_once APPPATH.'third_party/php-login-using-facebook-account/vendor/autoload.php';
       $this->load->library("session");
       $this->load->helper('url');
	   $this->load->model('Advancedsearch_Model');
	   $this->load->library("pagination");
	
    }

  public function index(){
		$data['zip'] =$this->Advancedsearch_Model->getAllZip();
		$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
		$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
		$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
		$data['ward'] =$this->Advancedsearch_Model->getAllWard();
		$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();
		$this->load->view('templates/header');
		$this->load->view('home/advancesearch',$data);
			$this->load->view('templates/footer');
	}
	
	
	
	public function searching(){
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
				$data['login_button']  = $google_client->createAuthUrl();
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
				$data['facebook_login_url'] =  '<a href="'.$facebook_login_url.'" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-f"></i> Login via facebook</a>';
            }
            //Facebook login End Here
             
		$resultUser = $this->Advancedsearch_Model->getUserIpAddress();
		if(!empty($resultUser['visitor_expiry_time']) && ($resultUser['status'])==1 && (empty($this->session->userdata('email')))){
		redirect('/'); 
		}else{
			if(isset($_POST['submitBtn'])){ $data['postData'] = $_POST; 
				$data['jsonPostData'] = serialize($_POST);
			}
			$data['zip'] =$this->Advancedsearch_Model->getAllZip();
			$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
			$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
			$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
			$data['ward'] =$this->Advancedsearch_Model->getAllWard();
			$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();
		
			$this->load->view('templates/header');
			$this->load->view('home/searching',$data);
			$this->load->view('templates/footer');
		}
		
	}



	public function getGeographic(){
		$Value = $this->input->post('searchCode');
		if($Value=='zip'){
			$result = $this->Advancedsearch_Model->getZip();
		}
		if($Value=='pro_use'){
			$result = $this->Advancedsearch_Model->getProuse();
		}
		if($Value=='zoning'){
			$result = $this->Advancedsearch_Model->getZoning();
		}
		echo $result;
	
	}
	
	
	public function loadRecord($rowno=0){
	    $rowno =$_POST['pagno'];
		// Row per page
		$rowperpage = 20;
		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
      	
      	// All records count
      	$allcount = $this->Advancedsearch_Model->getrecordCount();

      	// Get  records
      	$users_record = $this->Advancedsearch_Model->getData($rowno,$rowperpage);
      	
      	// Pagination Configuration
      	$config['base_url'] = base_url().'Advancedsearch/loadRecord';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$config['anchor_class'] = 'class="number" ';
		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;
		$data['allcount'] = $allcount;
		echo json_encode($data);
		
	}
	
	public function getuserdata(){
		$result = $this->Advancedsearch_Model->getuserdata();
		echo json_encode($result);
	
	}
	public function checkUserexpired(){
		$result = $this->Advancedsearch_Model->checkUserexpired();
		if($result){ echo 1;}else{ echo 0;};
	
	}


	public function saveSearch(){
	  $result = $this->Advancedsearch_Model->saveSearch();
	  echo $result;
		//echo json_encode($data);
	}
	
	 public function searchingMap(){
		
		 if(isset($_POST['submitBtn'])){ 
			$data['postData'] = $_POST; 
				$data['jsonPostData'] = serialize($_POST);
				$result = $this->Advancedsearch_Model->saveSearchData($data['jsonPostData']);
				
			}
		//$data['numrowdata'] = $this->Advancedsearch_Model->getrecordCountForMap($data['jsonPostData']);
		$data['searchid'] = $this->Advancedsearch_Model->getLastSavedSearch();
		
		$this->load->view('templates/header');
		$this->load->view('home/searchingmap',$data);
		$this->load->view('templates/footer');
	}
}
