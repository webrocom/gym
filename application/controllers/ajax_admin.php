<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

public function autoloadPeriod() {
        $id= $this->input->get_post('id');
        
        $query = $this->Admin_model->autoloadPeriod($id);
        echo '<option value="0">Select</option>';
        foreach ($query->result() as $row){
            echo '<option value='.$row->id.'>'.$row->duration.'</option>';
        }
        exit;
}

public function loadPeriod() {
        $id= $this->input->get_post('id');
        $this->db->where('plan_id', $id);
        $query = $this->db->get('teriff');
        echo '<option value="0">Select</option>';
        foreach ($query->result() as $row){
            echo '<option value='.$row->id.'>'.$row->duration.'</option>';
        }
        exit;
}
    public function loadnotes(){
        
        $id= $this->input->get_post('id');
        
        $query = $this->Admin_model->loadnotes($id);
        
        foreach ($query->result() as $row){
            echo'<p class="alert alert-info">'.$row->notes.'</p>';
        }
        exit;
    }
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */