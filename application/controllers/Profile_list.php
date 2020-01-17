<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_list extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('recruitment_model','rm');
    }

	public function index(){

        if(!$this->session->userdata('username')){
            redirect(base_url());
        }

        $q1 = $this->rm->getProfile_List();
        
        $data['notification'] = $this->rm->getNotifications();
        $data['title'] = "List of Profiles";

        // echo '<pre>';
        // print_r($data['notification']); die;

        if($q1){
            $data['STAFF'] =  $q1;
        }else{
            $data['STAFF'] =  "";  
        }

        $this->load->view('common/header', $data);
        $this->load->view('profile_list', $data);
        $this->load->view('common/footer');
    }
  
    public function getShortlist(){

        $personal_id = $this->input->get('personal_id');
        $this->db->where('personal_id', $personal_id);
        $this->db->select('first_name,last_name,department,profile_status');
        $status = $this->db->get(PERSONAL)->row_array();

        $data = array(
            'personal_id' => $personal_id,
            'full_name' => $status['first_name'].' '.$status['last_name'],
            'dept_name' => $status['department'],
            'status' => 1
        );

        if($status['profile_status'] == 0) $status = 1; else $status = 0;
       
        if($status == 1){
            $this->db->where('personal_id', $personal_id);
            $this->db->update(PERSONAL,array('profile_status' => $status));  
            $this->db->insert(TEAMDATA,$data); 
        }

        redirect(base_url('profile_list'),'refresh');
        
    }


    public function setReject(){

        $personal_id = $this->input->get('personal_id');       
       
        if($status['profile_status'] == 0){
            $this->db->where('personal_id', $personal_id);
            $this->db->update(PERSONAL,array('profile_status' => 2));  
        }
        
        redirect(base_url('profile_list'),'refresh');
        
    }}