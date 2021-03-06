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
       
        $this->load->helper('url');
        $this->load->config('email');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->model('Advancedsearch_Model');
		$this->load->helper(array('email'));
        $this->load->library(array('email'));
    }
	
	// Check Email exists
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'This email is already registered.');
            if ($this->login_model->check_email_exists($email)) {
                return true;
            }else{
                return false;
            }
        }
		public function userRegistartionWithAjax(){
			parse_str($_POST['formdata'], $postData);
			$checkuser =$this->login_model->check_email_exists($postData['reg-email']);
			if($checkuser){ 
			$to = $this->input->post('email');
			$result = $this->login_model->add_user();
				$subject = "Thank you for registering Us";
					$message ="<html>
					<head>
					<title>Zoningspace</title>
					</head>
					<body>
					<p>Hello User</p>
					<table>
					<tr>
					<td><p>Thanks You for Registration</p></td>
					</tr>
					<tr>
					<td><p>Your Account have been created Successfully.</p></td>
					</tr>
					<tr>
					<td><p>Please login with your valid Credentials</p>
					<p><a href='https://zoningspace.com/signin'>Click To Login</a></p></td>
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
			}else{ echo 2;}
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

        if ($this->email->send()) { return 1;} else { return 0;}
    }
	// Login Process
	public function userloginWithAjax(){
			$result =$this->login_model->userloginWithAjax();
			$arraySet = array();
			if($result){ 
				$user_data = array(
								'user_id' => $result['userId'],
								'username' => $result['name'],
								'email' => $result['email'],
								'roleId' => $result['roleId']
					);
				$this->session->set_userdata($user_data);
				
				$arraySet['subscription'] = $result['subscription'];
				$arraySet['expired_date'] = $result['expired_date'];
				$arraySet['connects'] = $result['connects'];
				$arraySet['msg'] = 1;
				echo json_encode($arraySet); 
			}else{ echo 
			  $arraySet['subscription'] = '';
				$arraySet['expired_date'] = '';
				$arraySet['msg'] = 0;
				echo json_encode($arraySet);
			}
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
		function logout(){
        //session_start();
        session_destroy();
        unset($_SESSION);
       
        redirect('/');
    }
	
	public function memberRegistartionWithAjax(){
			parse_str($_POST['formdata'], $postData);
			$checkuser =$this->login_model->check_email_exists($postData['member-email']);
			if($checkuser){ 
				$this->db->where('createdBy', $this->session->userdata('user_id'));
				$result = $this->db->get('tbl_users');
					if ($result->num_rows() >=3) {
						echo 3;
					}else{
						$this->login_model->member_user();
						echo 1;
					
					}
			}else{ echo 2;}
		}
		
}

?>