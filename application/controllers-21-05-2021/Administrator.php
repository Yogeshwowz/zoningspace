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
        $this->load->model('Dashboard_model');
		$this->load->helper(array('email'));
        $this->load->library(array('email'));
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
					redirect('administrator/dashboard');
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
		$data['pageTitle'] = 'Zoningspace : Dashboard';        
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
		
		$data['getreseacher'] = $this->administrator_model->researcher();
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
		if(!empty($_POST['import-submit'])){
			$data['import'] = $this->administrator_model->importFile();
		}
		$data['t'] ='';
		$pageTitle['pageTitle'] = "Export";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/import',$data);
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
	function dataSubmitted(){
		$data['export'] = $this->administrator_model->dataSubmitted();
		$pageTitle['pageTitle'] = "Data Submitted";
		$this->load->view('administrator/includes/header',$pageTitle);
		$this->load->view('administrator/data-submitted',$data);
		$this->load->view('administrator/includes/footer');
    }
	 public function assigned_researcher(){
		$result =$this->administrator_model->assigned_researcher(); 
		if($result){ 
		$id = $this->input->post('user_id');  
		$getname = $this->administrator_model->getusernameById($id); 
		$to =$getname['email'];
		$subject="Assigned Requested Data";
		$message ="<html>
		<head>
		<title>Zoningspace</title>
		</head>
		<body>
		<p>Hello Researcher</p>
		<table>
		<tr>
		<td><p>You have received a request to research Data records on your  Zoningspace account dashboard. We request you to look at it immediately and send the updated records at your earliest convenience.</p></td>
		</tr>

		<tr><td><p>Best</p></td>
		</tr>
		</tr>
		<tr><td><p>Zoningspace Team.</p></td>
		</tr>
		</table>
		</body>
		</html>";
		$this->send($to,$subject,$message);
		echo 1;
		  }
	} 
	 function send($to,$subject,$message) {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $to = $to;
        $subject = $subject;
        $message = $message;

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
			return 1;
            //echo 'Your Email has successfully been sent.';
        } else {
			return 0;
            //show_error($this->email->print_debugger());
        }
    }
	
	
	

}

?>