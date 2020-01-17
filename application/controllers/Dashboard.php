<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('recruitment_model','rm');
      }

	public function index(){

        if(!$this->session->userdata('username')){
            redirect(base_url());
        }

        $q1 = $this->rm->getNotifications();
        $data['title'] = "Admin | Dashboard";

        if($q1){
            $array_to = array();
            //$data['notification'] =  $q1;

            foreach($q1 as $notify){
            
                $time = $notify['created_on'];

                $array_to[] = array(
                    'personal_id' => $notify['personal_id'], 
                    'department' => $notify['department'],
                    'first_name' => $notify['first_name'], 
                    'last_name' => $notify['last_name'], 
                    'dob' => $notify['dob'],
                    'gender' => $notify['gender'], 
                    'father_name' => $notify['father_name'], 
                    'father_occupation' => $notify['father_occupation'],
                    'married_status' => $notify['married_status'],
                    'nationality' => $notify['nationality'],
                    'religion' => $notify['religion'],
                    'community' => $notify['community'], 
                    'caste' => $notify['caste'],
                    'mother_tongue' => $notify['mother_tongue'],
                    'phone_no' => $notify['phone_no'],
                    'email_id' => $notify['email_id'],
                    'native_place' => $notify['native_place'],
                    'profile_status' => $notify['profile_status'],
                    'status' => $notify['status'],
                    'reg_status' => $notify['reg_status'],
                    'created_on' => $this->rm->get_time_ago(time()-strtotime("2020-01-17")),
                    'dept_name' => $notify['dept_name'],
                );                
                // echo '<pre>';
                // print_r($time);
                // die();         
            }    

        $data['notification'] = $array_to;            
             
        }else{
            $data['notification'] = $q1;  
        }

        

        $this->load->view('common/header', $data); 
        $this->load->view('dashboard',$data);
        $this->load->view('common/footer');
    }
}