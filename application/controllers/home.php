<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');
        }


        public function index(){
            $this->Auth_model->isLoggedIn();
            $this->load->view('home');
	}
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */