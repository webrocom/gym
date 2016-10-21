<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');
        }

        public function index()
	{
            $this->load->view('auth/login');
	}
        
        public function forgetPass()
	{
            
            if ($this->input->is_ajax_request()) {
                
                $email = $this->input->get_post('email');
             if($this->Auth_model->sendForgetPass($email)){
                 echo'true';
             }else{
                 echo'false';
             }
            exit;
            }
            $this->load->view('auth/forgetpass');
            
	}
        
        public function resetPassword(){
            $data['email'] = $this->uri->segment(2);
            $this->load->view('auth/resetpass', $data);
        }
        
        public function resetProcess() {
                $email = $this->input->get_post('hiddenid');
                $pass = $this->input->get_post('pass');
                $cpass = $this->input->get_post('cpass');
                
                if($pass != $cpass){
                    echo'Confirm password does not match';
                }
                elseif (empty ($pass) or empty ($cpass)) {
                    echo'Please fill password properly';
                }
                
                elseif($this->Auth_model->resetPassword($email, $cpass)){
                    echo'Your new password has been set';
                }
                else{
                    echo'Sorry! Unable to set new password';
                }
                
                exit;

            
        }


        
        
        public function logout(){
            $this->session->sess_destroy();
            header("cache-Control: no-store, no-cache, must-revalidate");
            header("cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
            redirect('auth/' ,'refresh');
            exit;
        }
        
        public function login(){
            if ($this->input->is_ajax_request()) {
            $username =  $this->input->post('username');
            $password =  $this->input->post('password');
            
            //call the model for auth
            if($this->Auth_model->login($username, $password)){
                echo 'true';
            }
            else{
                echo 'false';
            }
            exit;
            }
            redirect(base_url().'auth');
        }
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */