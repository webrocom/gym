<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public $delete_id = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->Model('Auth_model');
    }

    public function index() {
        $this->load->view('admin/home');
        $this->Auth_model->isLoggedIn();
    }

    public function family() {
        $this->load->view('admin/family');
        $this->Auth_model->isLoggedIn();
    }

    public function memberCreate() {
        $this->Auth_model->isLoggedIn();
        
        if ($this->input->is_ajax_request()) {
            
            if($this->session->userdata('role') == 'admin'){
            $this->form_validation->set_rules('firstname', 'First name ', 'required');
            $this->form_validation->set_rules('middlename', 'Middle name ', 'required');
            $this->form_validation->set_rules('lastname', 'Last name', 'required');
            $this->form_validation->set_rules('area', 'Area/Town/City', 'required');
            $this->form_validation->set_rules('telephone', 'Telephone', 'required|min_length[10]|max_length[10]|numeric');

            $this->form_validation->set_rules('plan', 'Package type', 'required');
            $this->form_validation->set_rules('tariff', 'Selected period', 'required');
            $this->form_validation->set_rules('start_date', 'start date', 'required');
            $this->form_validation->set_rules('end_date', 'end date', 'required');
            $this->form_validation->set_rules('paid', 'end date', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                echo'<div class="alert alert-dismissable alert-danger"><small>' . validation_errors() . '</small></div>';
            } else {
//                        general information
                $family['firstname'] = $this->input->post('firstname');
                $family['middlename'] = $this->input->post('middlename');
                $family['lastname'] = $this->input->post('lastname');
                $family['gender'] = $this->input->post('gender');
                $family['address'] = $this->input->post('address');
                $family['area'] = $this->input->post('area');
                $family['telephone'] = $this->input->post('telephone');
                $family['telephone2'] = $this->input->post('telephone2');
//                        plan information
                $family['plan'] = $this->input->post('plan');
                $family['tariff'] = $this->input->post('tariff');
                $family['start_date'] = $this->input->post('start_date');
                $family['end_date'] = $this->input->post('end_date');
                $family['paid'] = $this->input->post('paid');
                $family['unpaid'] = $this->input->post('unpaid');
                $family['instalmentdate'] = $this->input->post('instalmentdate');
                $family['desc'] = $this->input->post('desc');
                $this->Admin_model->memberCreate($family);
            }

            exit;
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><small>Sorry ! you are not valid user</small></div>';
            exit;
        }
        }
        $this->load->view('admin/create_member');
    }

    public function schema() {
        $this->Auth_model->isLoggedIn();
        $this->load->view('admin/schema');
    }

    public function plan() {
        $this->Auth_model->isLoggedIn();
        $this->load->view('admin/plan');
    }

    public function tariff() {
        $this->Auth_model->isLoggedIn();
        $this->load->view('admin/tariff');
    }

    public function planCreate() {
        $this->form_validation->set_rules('name', 'Plan name', 'required');
        $this->form_validation->set_rules('code', 'Plan code', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo'<p class="alert alert-dismissable alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Add Proper plan data</p>';
        } else {
            $name = $this->input->post('name');
            $code = $this->input->post('code');
            $this->Admin_model->planCreate($name, $code);
        }
    }

    public function planList() {
        $data = $this->Admin_model->planList();
        if ($data->num_rows() > 0) {
            $sr = 0;
            $urldelete = base_url() . 'admin/deletePlan/';
            $urledit = base_url() . 'admin/editPlan/';
            foreach ($data->result() as $row) {
                $sr = $sr + 1;
                echo"<tr><td>" . $sr . "</td><td>" . $row->code . "</td><td>" . $row->name . "</td>"
                . "<td><a data-url='$urledit' class='btn btn-sm btn-info btnedit'  data-toggle='modal' data-target='#editModal' data-id='$row->id' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a data-url='$urldelete' class='btn btn-sm btn-info btndelete' data-id='$row->id' title='delete'><i class='glyphicon glyphicon-remove'></i>Delete</a></td>"
                . "</tr>";
            }
        } else {
            echo'<tr><td colspan = 4 class="text-info">No Plan added.</td></tr>';
        }
        exit;
    }

    public function editPlan() {
        $id = $this->input->get_post('id');
        $data['data'] = $this->Admin_model->editPlan($id);
        $data['id'] = $id;
        $this->load->view('admin/plan_edit', $data);
    }

    public function editTariff() {
        $id = $this->input->get_post('id');
        $data['data'] = $this->Admin_model->editTariff($id);
        $data['id'] = $id;
        $this->load->view('admin/tariff_edit', $data);
    }

    public function planUpdate() {
        $id = $this->input->get_post('id');
        $name = $this->input->get_post('name');
        $code = $this->input->get_post('code');
        $this->Admin_model->planUpdate($id, $name, $code);
    }
    
    public function userUpdate() {
        $user['email'] = $this->input->get_post('email');
        $user['id'] = $this->input->get_post('id');
        $user['name'] = $this->input->get_post('name');
        $user['password'] = $this->input->get_post('password');
        $user['role'] = $this->input->get_post('role');
        $user['status'] = $this->input->get_post('status');
        $this->Admin_model->userUpdate($user);
    }

    public function tariffUpdate() {
        $id = $this->input->get_post('id');
        $this->form_validation->set_rules('plan', 'Plan name', 'required');
        $this->form_validation->set_rules('duration', 'Plan Duration', 'required');
        $this->form_validation->set_rules('price', 'Plan price', 'required|numeric');
        $this->form_validation->set_rules('note', 'Plan note', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo'<div class="alert alert-dismissable alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . validation_errors() . '</div>';
        } else {
            $param['id'] = $id;
            $param['plan'] = $this->input->post('plan');
            $param['duration'] = $this->input->post('duration');
            $param['price'] = $this->input->post('price');
            $param['offer'] = $this->input->post('offer');
            $param['note'] = $this->input->post('note');
            $this->Admin_model->tariffUpdate($param);
        }
    }

    public function deletePlan() {
        $id = $this->input->get_post('id');
        $this->Admin_model->deletePlan($id);
    }
    
    public function deleteUser() {
        $id = $this->input->get_post('id');
        $this->Admin_model->deleteUser($id);
    }

    public function tariffCreate() {
        $this->form_validation->set_rules('plan', 'Plan name', 'required');
        $this->form_validation->set_rules('duration', 'Plan Duration', 'required');
        $this->form_validation->set_rules('price', 'Plan price', 'required|numeric');
        $this->form_validation->set_rules('note', 'Plan note', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo'<div class="alert alert-dismissable alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . validation_errors() . '</div>';
        } else {
            $param['plan'] = $this->input->post('plan');
            $param['duration'] = $this->input->post('duration');
            $param['price'] = $this->input->post('price');
            $param['offer'] = $this->input->post('offer');
            $param['note'] = $this->input->post('note');
            $this->Admin_model->tariffCreate($param);
        }
    }

    public function selectPlan() {
        $query = $this->db->get('plan');
        echo'<option value="0">Select</option>';
        foreach ($query->result() as $row) {
            echo'<option value=' . $row->id . '>' . $row->name . '</option>';
        }
        exit;
    }

    public function tariffList() {
        $data = $this->Admin_model->tariffList();
        if ($data->num_rows() > 0) {
            $sr = 0;
            $urldelete = base_url() . 'admin/deleteTariff/';
            $urledit = base_url() . 'admin/editTariff/';
            foreach ($data->result() as $row) {
                $sr = $sr + 1;
                echo"<tr><td>" . $sr . "</td><td>" . $row->plan_name . "</td><td>" . $row->duration . "</td><td>" . $row->price . "/Rs.</td><td>" . $row->offer . "</td><td>" . $row->notes . "</td>"
                . "<td><a data-url='$urledit' class='btn btn-sm btn-info btnedit'  data-toggle='modal' data-target='#editModal' data-id='$row->tariff_id' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a data-url='$urldelete' class='btn btn-sm btn-info btndelete' data-id='$row->tariff_id' title='delete'><i class='glyphicon glyphicon-remove'></i>Delete</a></td>"
                . "</tr>";
            }
        } else {
            echo'<tr><td colspan = 4 class="text-info">No Tariff added.</td></tr>';
        }
        exit;
    }

    public function deleteTariff() {
        $id = $this->input->get_post('id');
        $this->Admin_model->deleteTariff($id);
    }

    public function memberList() {
        $this->load->view('admin/default_list');
    }

    public function memberListLoad() {
        $sql = "select CONCAT('A', m.id)as member_id, m.fname, m.mname, m.lname, m.area, m.telephone, m.telephone2, m.id as m_id, m.created, p.expire_date, p.desc from member m left join member_plan p  on m.id = p.member_id order by m.id desc";
        
        $result =  $this->db->query($sql);
            $family = array();
            foreach ($result->result() as $row){
                $family[] = $row;
            }
            
            
        
//        collect expire members
        $param = array();
        foreach ($family as $row){
            $exp_date = $row->expire_date;
            $exp_date_temp =  date_create($exp_date);
            date_add($exp_date_temp, date_interval_create_from_date_string('90 days'));

            $exp_member =  date_format($exp_date_temp, 'Y-m-d');

            $date1=date_create(date('Y-m-d'));
            $date2=date_create($exp_member);
            $diff=date_diff($date1,$date2);
            $days =  $diff->format("%R%a");
            if($days <= 0){
                $param[] = trim($row->member_id,'A');
            }
        }
        $this->setExpireMember($param);
        
        
            
            
            
        echo json_encode($family);
//            exit;
    }
    
    public function memberEdit(){
        $this->Auth_model->isLoggedIn();
        $data['id'] = $this->uri->segment(2);
        $sql = "select m.*, p.* from member m INNER join member_plan p on m.id = p.member_id where m.id =". $data['id']." limit 1";
        $query = $this->db->query($sql);
        $data['row'] = $query->row();
//        var_dump($data['row']); exit;
        $this->load->view('admin/edit_member', $data);
    }
    
    public function memberUpdate() {
//        var_dump($_POST); exit;    
            $this->form_validation->set_rules('firstname', 'First name ', 'required');
            $this->form_validation->set_rules('middlename', 'Middle name', 'required');
            $this->form_validation->set_rules('lastname', 'Last name', 'required');
            $this->form_validation->set_rules('area', 'Area/Town/City', 'required');
            $this->form_validation->set_rules('telephone', 'Telephone', 'required|min_length[10]|max_length[10]|numeric');

            $this->form_validation->set_rules('plan', 'Package type', 'required');
            $this->form_validation->set_rules('tariff', 'Selected period', 'required');
            $this->form_validation->set_rules('start_date', 'start date', 'required');
            $this->form_validation->set_rules('end_date', 'end date', 'required');
            $this->form_validation->set_rules('paid', 'Amount paid', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                echo'<div class="alert alert-dismissable alert-danger"><small>' . validation_errors() . '</small></div>';
            } else {
//                        general information
                $family['id'] = $this->input->post('id');
                $family['firstname'] = $this->input->post('firstname');
                $family['middlename'] = $this->input->post('middlename');
                $family['lastname'] = $this->input->post('lastname');
                $family['gender'] = $this->input->post('gender');
                $family['address'] = $this->input->post('address');
                $family['area'] = $this->input->post('area');
                $family['telephone'] = $this->input->post('telephone');
                $family['telephone2'] = $this->input->post('telephone2');
                $family['expired'] = $this->input->post('expired');
//                        plan information
                $family['plan'] = $this->input->post('plan');
                $family['tariff'] = $this->input->post('tariff');
                $family['start_date'] = $this->input->post('start_date');
                $family['end_date'] = $this->input->post('end_date');
                $family['paid'] = $this->input->post('paid');
                $family['unpaid'] = $this->input->post('unpaid');
                $family['instalmentdate'] = $this->input->post('instalmentdate');
                $family['desc'] = $this->input->post('desc');
                $this->Admin_model->memberUpdate($family);
            }

            exit;
        
    }
    
    public function memberView() {
        $this->Auth_model->isLoggedIn();
        $data['id'] = $this->uri->segment(2);
        $sql = "select m.id as member_id,  m.*, p.* from member m INNER join member_plan p on m.id = p.member_id where m.id =". $data['id']." limit 1";
        $query = $this->db->query($sql);
        $data['row'] = $query->row();
        $this->load->view('admin/view_member', $data);
    }
    
    public function viewPlan() {
        $id = $this->input->get_post('id');
        $this->db->where('id', $id);
        $query = $this->db->get('plan');
        $row = $query->row();
        echo $row->name;
        exit;
        
    }
    public function viewPeriod() {
        $id = $this->input->get_post('id');
        $this->db->where('id', $id);
        $query = $this->db->get('teriff');
        $row = $query->row();
        echo $row->duration;
        exit;
    }
    
    public function memberDelete() {
        $this->Auth_model->isLoggedIn();
        if($this->Admin_model->memberDelete($this->uri->segment(2))){
            $delete = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            This member deleted successfully!
            </div>';
            $this->session->set_flashdata('delete', $delete);
            redirect('memberList');
        }
        else{
            $data['success'] = false;
            $delete = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Sorry Internal error!
            </div>';
            $this->session->set_flashdata('delete', $delete);
           redirect('memberList');
        }
}

    public function alert() {
        $this->Auth_model->isLoggedIn();
    $this->load->view('admin/alert');
}
    public function alertExpire() {
        
        
    
    $query = $this->Admin_model->alertExpire();
    
    $now = strtotime(date('Y-m-d'));
    $data = array();
    foreach ($query->result() as $row){
        $days = $this->dateDiffter($now, strtotime($row->expire_date));
        if($days >= -5){
            $days = ($days <=-5)? $days : 'Expired';
            $data[] = array('name'=>$row->name,
                'rm'=> $days,
                'ed'=>$row->expire_date,
                'id'=>$row->mid);
        }
    
    }
    foreach ($data as $val){
        echo '<tr class=""><td>'.$val['name'].'</td><td>'.$val['rm'].'</td><td>'.date('F jS Y', strtotime($val['ed'])).'</td><td><a href='.base_url().'memberedit/'.$val['id'].'>Edit</a>&nbsp;&nbsp; <a href='.base_url().'view/'.$val['id'].'>View</a></td></tr>';
    }
    exit;
    
}

public function alertCompleteExpire() {
    
    $query = $this->Admin_model->alertCompleteExpire();
    foreach ($query->result() as $row){
        echo '<tr class=""><td>A'.$row->mid.'</td><td>'.$row->name.'</td><td>'.$row->expire_date.'</td></tr>';
    }
    exit;
    
}

    public function alertInstallment() {
    
    $query = $this->Admin_model->alertInstallment();
    $now = strtotime(date('Y-m-d'));
    $data = array();
    foreach ($query->result() as $row){
        $days = $this->dateDiffter($now, strtotime($row->next_installment));
        if($days >= -5){
            $days = ($days <= -5)? $days : 'Overdue';
            $data[] = array('name'=>$row->name,
                'rm'=> $days,
                'Installment_date'=>$row->next_installment,
                'id'=>$row->mid);
        }
    }
    foreach ($data as $val){
        $idt = ($val['Installment_date']== '0000-00-00')?'none':date('F jS Y', strtotime($val['Installment_date']));
        if($idt =='none')
        continue;
        echo '<tr class=""><td>'.$val['name'].'</td><td>'.$val['rm'].'</td><td>'.$idt.'</td><td><a href='.base_url().'memberedit/'.$val['id'].'>Edit</a>&nbsp;&nbsp; <a href='.base_url().'view/'.$val['id'].'>View</a></td></tr>';
    }
    exit;
}


public function subAdmin() {
    $this->Auth_model->isLoggedIn();
    $this->load->view('admin/subadmin');
}

public function adminCreate() {
    $this->Auth_model->isLoggedIn();
    $this->form_validation->set_rules('name', 'User name', 'required');
    $this->form_validation->set_rules('email', 'Email id', 'required | valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('cpassword', 'Confirm password', 'required|matches[cpassword]');
    $this->form_validation->set_rules('role', 'Admin role', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            echo'<div class="alert alert-dismissable alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.  validation_errors().'</div>';
        } else {
            $user['name'] = $this->input->post('name');
            $user['email'] = $this->input->post('email');
            $user['password']= $this->input->post('cpassword');
            $user['role']= $this->input->post('role');
            $user['status']= $this->input->post('status');
            $this->Admin_model->adminCreate($user);
        }
}


public function userList() {
        $data = $this->Admin_model->userList();
        if ($data->num_rows() > 0) {
            $sr = 0;
            $urldelete = base_url() . 'admin/deleteUser/';
            $urledit = base_url() . 'admin/editUser/';
            foreach ($data->result() as $row) {
                $sr = $sr + 1;
                echo"<tr><td>" . $sr . "</td><td>" . $row->uname . "</td><td>" . $row->email . "</td><td>" . $row->role . "</td><td>" . $row->status . "</td>"
                . "<td><a data-url='$urledit' class='btn btn-sm btn-info btnedit'  data-toggle='modal' data-target='#editModal' data-id='$row->id' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a data-url='$urldelete' class='btn btn-sm btn-info btndelete' data-id='$row->id' title='delete'><i class='glyphicon glyphicon-remove'></i>Delete</a></td>"
                . "</tr>";
            }
        } else {
            echo'<tr><td colspan = 4 class="text-info">No Plan added.</td></tr>';
        }
        exit;
    }
    
    public function editUser() {
        $id = $this->input->get_post('id');
        $data['data'] = $this->Admin_model->editUser($id);
        $data['id'] = $id;
        $this->load->view('admin/user_edit', $data);
    }
    
    
    public function dateDiffter($d1, $d2){
    $datediff = $d1 - $d2;
    return floor($datediff/(60*60*24));
}

public function memberdelcf(){
    $this->load->view('admin/delcf');
}

public function backup() {
    $this->load->dbutil();
    $backup =& $this->dbutil->backup(); 
    $this->load->helper('download');
    force_download('mybackup.zip', $backup);
    redirect('admin/schema');
}

public function setExpireMember($param){
    
     $this->Admin_model->setExpireMember($param);
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/admin.php */