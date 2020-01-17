<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reject_history extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('recruitment_model','rm');
    }

	public function index(){

        if(!$this->session->userdata('username')){
            redirect(base_url());
        }

        $data['notification'] = $this->rm->getNotifications();

        $q1 = $this->rm->getReject_history();
        
        $data['title'] = "History of Rejected Profiles";

        if($q1){
            $data['STAFF'] =  $q1;
        }else{
            $data['STAFF'] =  "";  
        }

        $this->load->view('common/header', $data);
        $this->load->view('reject_history', $data);
        $this->load->view('common/footer');
    }
   
    public function setDelete(){

        $personal_id = $this->input->get('personal_id');       
       
        if($status['profile_status'] == 0){
            $this->db->where('personal_id', $personal_id);
            $this->db->delete(PERSONAL);  
        }
        
        redirect(base_url('profile_list'),'refresh');
        
    }
}