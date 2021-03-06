<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Login_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */

    // Check email exists
    public function check_email_exists($email){
        $query = $this->db->get_where('tbl_users', array('email' => $email));

        if(empty($query->row_array())){
            return true;
        }else{
            return false;
        }
    }

    public function add_user(){
            $password = md5($this->input->post('password'));
            $data = array(
                            'email' => $this->input->post('email'),
                            'password' => $password,
                            'name' => $this->input->post('name'),
                            'roleId' => '2',
                            'createdDtm' => date('Y-m-d H:i:s')
                          );
            return $this->db->insert('tbl_users', $data);
            //$user_id = $this->db->insert_id();
    }


    public function userLogin($email, $encrypt_password){
            //Validate
            $this->db->where('email', $email);
            $this->db->where('password', $encrypt_password);

            $result = $this->db->get('tbl_users');

            if ($result->num_rows() == 1) {
                return $result->row(0);
            }else{
                return false;
            }
        }

        function get_user_role($roleid){   
            $query = $this->db->where('roleId',$roleid)->get('tbl_roles');
            return $query->result_array(); 
            //$data =  $query->result_array(); 
            //echo "<pre>"; print_r($data); die;
        }
    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkEmailExist($email)
    {
        $this->db->select('userId');
        $this->db->where('email', $email);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }


    /**
     * This function used to insert reset password data
     * @param {array} $data : This is reset password data
     * @return {boolean} $result : TRUE/FALSE
     */
    function resetPasswordUser($data)
    {
        $result = $this->db->insert('tbl_reset_password', $data);

        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function userLoginmedia($data){
        $email = $data['email'];
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_users');
if ($query->num_rows() > 0){

        $this->db->where('email', $email);
        return $user_id = $this->db->get('tbl_users')->row_array();
        /*$user_data = array(
                'user_id' => $user_id->userId,
                'username' => $user_id->name,
                'email' => $user_id->email
        );
          $this->session->set_userdata($user_data); 
            return 1;*/
        } else {
            
           $insertdata = array(
           'email' =>$email,
           'password' =>md5('123456'),
           'roleId' => 2,
           'createdDtm' => date('Y-m-d H:i:s'),
           'name' =>$data['givenName']
           ); 
          
            $this->db->insert('tbl_users', $insertdata);
            $userId = $this->db->insert_id();
            $this->db->where('email', $email);
            return $user_id = $this->db->get('tbl_users')->row_array();
             /*$user_data = array(
                'user_id' => $userId,
                'name' => $data['givenName'],
                'email' => $email
        );
            $this->session->set_userdata($user_data);
             return 1;*/
        }
    }
    
    function facebookLoginmedia($data){
        //echo "<pre>"; print_r($data); die;
        $email = $data['email'];
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_users');
if ($query->num_rows() > 0){

        $this->db->where('email', $email);
        return $user_id = $this->db->get('tbl_users')->row_array();
        /*$user_data = array(
                'user_id' => $user_id->userId,
                'username' => $user_id->name,
                'email' => $user_id->email
        );
          $this->session->set_userdata($user_data); 
            return 1;*/
        } else {
            
           $insertdata = array(
           'email' =>$email,
           'password' =>md5('123456'),
           'roleId' => 2,
           'createdDtm' => date('Y-m-d H:i:s'),
           'name' =>$data['name']
           ); 
          
            $this->db->insert('tbl_users', $insertdata);
            $userId = $this->db->insert_id();
            $this->db->where('email', $email);
            return $user_id = $this->db->get('tbl_users')->row_array();
             /*$user_data = array(
                'user_id' => $userId,
                'name' => $data['givenName'],
                'email' => $email
        );
            $this->session->set_userdata($user_data);
             return 1;*/
        }
    }
    
    
    
	
	public function userloginWithAjax(){
		$this->db->where('email', $_POST['loginEmail']);
		$this->db->where('password', md5($_POST['loginPass']));
		$result = $this->db->get('tbl_users');
		if ($result->num_rows() == 1) {
			return $result->row_array();
		}else{
			return false;
		}
    }

}

?>