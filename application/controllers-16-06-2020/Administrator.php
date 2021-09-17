<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->config('email');
        $this->load->library('email');
        $this->load->model('administrator_model');
    }
	function logout(){
		session_start(); 
		session_destroy();
		unset($_SESSION);
		session_regenerate_id(true);
		redirect('administrator');
    }
	public function loginMe(){
		if(!empty($_POST['SignIn'])){
			$email = strtolower($this->security->xss_clean($this->input->post('email')));
			$password = $this->input->post('password');
			$result = $this->administrator_model->loginMe($email, $password);
				if($result){
				   $sessionArray = array(
								'userId'=>$result['userId'],                    
								'role'=>$result['roleId'],
								'name'=>$result['name'],
					);
					$this->session->set_userdata($sessionArray);
					redirect('dashboard');
				}
				else{
					 $this->session->set_flashdata('error', 'Email or password does not match');
					 $this->load->view('/administrator/login');
				}
		}else{
			$this->load->view('/administrator/login');
		}
	}

    
    public function dashboard(){
		$data['pageTitle'] = 'RealEstate : Dashboard';        
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/dashboard');
		$this->load->view('administrator/includes/footer');
       
    }
    
	function users(){
		$data['userRecords'] = $this->administrator_model->users();
		$pageTitle['pageTitle'] = "User Listing";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/users',$data);
		$this->load->view('administrator/includes/footer');
    }
	function visitUser(){
		$data['userRecords'] = $this->administrator_model->visitUser();
		$pageTitle['pageTitle'] = "Visitor users";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/visit-users',$data);
		$this->load->view('administrator/includes/footer');
    }
    public function user_enabled_disabled(){
		$result =$this->administrator_model->user_enabled_disabled(); 
		  if($result){ echo 1;}
	} 
	function researcher(){
		$data['userRecords'] = $this->administrator_model->researcher();
		$pageTitle['pageTitle'] = "Researcher";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/researcher',$data);
		$this->load->view('administrator/includes/footer');
    }
	public function addResearcher(){
		$result =$this->administrator_model->addResearcher(); 
		  if($result >0){ echo 1;}else{ echo 2;}
	}
	
	public function researcher_user_enabled_disabled(){
		$result =$this->administrator_model->researcher_user_enabled_disabled(); 
		  if($result){ echo 1;}
	} 
	public function researcher_delete(){
		$result =$this->administrator_model->researcher_delete(); 
		  if($result){ echo 1;}
	}
	public function visit_user_delete(){
		$result =$this->administrator_model->visit_user_delete(); 
		  if($result){ echo 1;}
	}
	
	function user_save_search(){
		$data['userRecords'] = $this->administrator_model->user_save_search();
		$pageTitle['pageTitle'] = "Save Search";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/save-search',$data);
		$this->load->view('administrator/includes/footer');
    }
	function orders(){
		$data['userRecords'] = $this->administrator_model->user_orderss();
		$pageTitle['pageTitle'] = "Orders";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/orders',$data);
		$this->load->view('administrator/includes/footer');
    }
	public function buysearch(){
		$data['buySearch'] = $this->administrator_model->getbuySearch();
		$pageTitle['pageTitle'] = "buy search";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/buy-search',$data);
		$this->load->view('administrator/includes/footer');
	}
	function export(){
		$data['export'] = $this->administrator_model->exportFile();
		$pageTitle['pageTitle'] = "Export";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/export',$data);
		$this->load->view('administrator/includes/footer');
    }
	function import(){
		if(!empty($_POST['import-submit'])){$data['import'] = $this->administrator_model->importFile();}
		$pageTitle['pageTitle'] = "Import";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/import');
		$this->load->view('administrator/includes/footer');
    }
	function cronJobExportData(){
		$result= $this->administrator_model->cronJobExportData();
		echo 1;
	}
	function csvFileImport(){
		$result= $this->administrator_model->csvFileImport();
		echo 1;
	}
	function cronJobForEmailPhone(){
		$result= $this->administrator_model->cronJobForEmailPhone();
	}

}

?>