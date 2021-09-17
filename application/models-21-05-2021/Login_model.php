<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
	protected $users = 'tbl_users';
	// Check email exists
    public function check_email_exists($email){
        $query = $this->db->get_where($this->users, array('email' => $email));

        if(empty($query->row_array())){
            return true;
        }else{
            return false;
        }
    }
	public function add_user(){
		parse_str($_POST['formdata'], $postData);
		$password = md5($postData['reg-password']);
            $data = array(
                            'email' => $postData['reg-email'],
                            'password' => $password,
                            'name' => $postData['reg-name'],
                            'roleId' => '2',
                            'createdDtm' => date('Y-m-d H:i:s')
                          );
           return  $this->db->insert($this->users, $data);
            //return $user_id = $this->db->insert_id();
    }
	
   public function userloginWithAjax(){
	   parse_str($_POST['formdata'], $postData);
	   $this->db->where('email', $postData['login_email']);
		$this->db->where('password', md5($postData['login_password']));
		$result = $this->db->get($this->users);
		if ($result->num_rows() == 1) {
			return $result->row_array();
		}else{
			return false;
		}
    }
	public function member_user(){
		parse_str($_POST['formdata'], $postData);
		$password = md5($postData['member-password']);
			
            $data = array(
                            'email' => $postData['member-email'],
                            'password' => $password,
                            'name' => $postData['member-name'],
                            'roleId' => '3',
                            'plain_password' => $postData['member-password'],
                            'createdBy' => $this->session->userdata('user_id'),
                            'createdDtm' => date('Y-m-d H:i:s')
                          );
           return  $this->db->insert($this->users, $data);
		}
           
    

}

?>