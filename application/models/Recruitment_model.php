<?php

class Recruitment_model extends CI_Model{

    public function get_time_ago($time){
        
        $time_difference = strtotime(date('Y-m-d H:i:s')) - strtotime($time);

        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return '' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
    
    function get_community(){

        $this->db->distinct('ccgroup');
        $this->db->select('ccgroup');
        $this->db->order_by('ccgroup', 'ASC');
        $query = $this->db->get('caste_name')->result_array();
        return $query;        
    }

    function get_caste($community){
        $this->db->where('ccgroup', $community);
        $this->db->order_by('ccname', 'ASC');
        $query = $this->db->get('caste_name');
        $output = '<option value="">Select City</option>';
        foreach($query->result() as $row){
          $output .= '<option value="'.$row->ccname.'">'.$row->ccname.'</option>';
        }
        return $output;
    }

    function fetch_state(){

        $this->db->distinct('state');
        $this->db->select('state');
        $this->db->order_by('state', 'ASC');
        $query = $this->db->get('city')->result_array();
        return $query;
     }
    
    function fetch_city($state){
        $this->db->where('state', $state);
        $this->db->order_by('city', 'ASC');
        $query = $this->db->get('city');
        $output = '<option value="">Select City</option>';
        foreach($query->result() as $row){
          $output .= '<option value="'.$row->city.'">'.$row->city.'</option>';
        }
        return $output;
    }
    
    public function checkExist($email,$phone){         
        //checks ajax requests
         $this->db->where("status",1);
         $this->db->where("phone_no",$phone);
         $this->db->where("email_id",$email);
         $query=$this->db->get(PERSONAL);
         
         $count = $query->num_rows(); 

         if($count == 1){
          print_r(json_encode($query->row_array()));
         }else{
          echo 0;
         }
    }

    public function check_Exist($email){
        $this->db->where("status",1);        
        $this->db->where("email_id",$email);
        //$this->db->where("phone_no",$phone);
        $q = $this->db->get(PERSONAL);
        return $q->num_rows();
    }

    /*Insert row*/
    public function Insert_Update_personal($insert_up_personal){
       
        if($insert_up_personal['personal_id'] == 0){

            $this->db->insert(PERSONAL,$insert_up_personal);
           
            $personal_id = $this->db->insert_id();           
        }
        else{
          
            $this->db->where('personal_id',$insert_up_personal['personal_id']);
            $this->db->update(PERSONAL,$insert_up_personal);
            
            $personal_id = $insert_up_personal['personal_id']; 
        }

        $this->db->select('*');
        $this->db->where('personal_id', $personal_id);
        
        $getExist = $this->db->get(COMMUNICATION)->result();

        $common_array = array('personal_id'=>$personal_id, 'communication'=>$getExist);
        print_r(json_encode($common_array));
    }

    public function Insert_communication($getData,$personal_id){
 
        $this->db->where('personal_id',$personal_id );
        $this->db->delete(COMMUNICATION);

        $this->db->insert_batch(COMMUNICATION,$getData);

        // $personal_id = $this->db->insert_id();
        /*if($getData['per_com_id'] == 0){

            $this->db->insert(COMMUNICATION,$getData);
           
            $personal_id = $this->db->insert_id();           
        }
        else{
            for($i=0; $i<count($getData['type_of_address']); $i++){

                $update_array = array('personal_id'=>$getData['per_com_id'],'type_of_address'=>$getData['type_of_address'][$i],'phone_no'=>$getData['phone_no'][$i],
                'street_address'=>$getData['street_address'][$i],'city'=>$getData['city'][$i],'state'=>$getData['state'][$i],'country'=>$getData['country'][$i],'pin_no'=>$getData['pin_no'][$i]);          

                $this->db->where('personal_id', $getData['per_com_id']);
                $this->db->update(COMMUNICATION,$update_array);
            }                  
            
            $personal_id =  $getData['per_com_id']; 
        }*/

        $this->db->select('*');
        $this->db->where('personal_id', $personal_id);        
        $getExist = $this->db->get(EDUCATION)->result();
 
        $common_array = array('personal_id'=>$personal_id, 'education'=>$getExist);

        print_r(json_encode($common_array));
    }

    public function Insert_education($getData,$personal_id){
 
        $this->db->where('personal_id',$personal_id );
        $this->db->delete(EDUCATION);


        $this->db->order_by('DESC');
        $this->db->insert_batch(EDUCATION,$getData);

        $this->db->select('*');
        $this->db->where('personal_id', $personal_id);        
        $getExist = $this->db->get(EXPERIENCE)->result();
 
        $common_array = array('personal_id'=>$personal_id, 'experience'=>$getExist);

        print_r(json_encode($common_array));
    }

    public function Insert_experience($getData,$personal_id){
 
        $this->db->where('personal_id',$personal_id );
        $this->db->delete(EXPERIENCE);

        $this->db->order_by('DESC');
        $this->db->insert_batch(EXPERIENCE,$getData);

        $this->db->select('*');
        $this->db->where('personal_id', $personal_id);        
        $getExist = $this->db->get(ACHIEVEMENT)->result();
 
        $common_array = array('personal_id'=>$personal_id, 'achievement'=>$getExist);

        print_r(json_encode($common_array));
    }

    public function Insert_achievement($getData,$personal_id){
 
        $this->db->where('personal_id',$personal_id );
        $this->db->delete(ACHIEVEMENT);

        $this->db->order_by('DESC');
        $this->db->insert_batch(ACHIEVEMENT,$getData);
        
        $this->db->select('*');
        $this->db->where('personal_id', $personal_id);        
        $getExist = $this->db->get(JOINING)->result();
 
        $common_array = array('personal_id'=>$personal_id, 'joining'=>$getExist);

        print_r(json_encode($common_array));
    }

    public function Insert_joining($getData,$personal_id){
 
        $this->db->where('personal_id',$personal_id);
        $this->db->delete(JOINING);

        $this->db->order_by('DESC');
        $this->db->insert_batch(JOINING,$getData);

        $this->db->where('personal_id',$personal_id);
        $this->db->update(PERSONAL, array('reg_status' => 1));
        
        // $this->db->select('*');
        // $this->db->where('personal_id', $personal_id);        
        // $getExist = $this->db->get(ACHIEVEMENT)->result();
 
        // $common_array = array('personal_id'=>$personal_id, ''=>$getExist);

        // print_r(json_encode($common_array));
    }

    public function insert_personal(){ 
         //checks ajax requests
         $this->db->where("status",1);
         $this->db->where("phone_no",$phone);
         $query=$this->db->get(COMMUICATION);
         
         $count = $query->num_rows(); 

         if($count == 1){
          print_r(json_encode($query->row_array()));
         }else{
          echo 0;
         }
    }

    public function check_PhoneExist1($phone){ 
        //checks ajax requests
         $this->db->where("status",1);
         $this->db->where("phone",$phone);
         $query=$this->db->get(PERSONAL);
         if($query->num_rows() == 1){
          return $query->row_array()['personal_id'];
         }else{
          return 0;
         }
    }

    public function getProfile_List(){

        $this->db->where('status',1);
        $this->db->where('profile_status',0);
        $this->db->order_by("reg_status",'desc');
        $this->db->from(PERSONAL.' as p');
        /*$this->db->join(DEPARTMENTS.' as d', 'p.department = d.id', 'left');
        $this->db->join(EXPERIENCE.' as e', 'p.personal_id = e.personal_id', 'LEFT');*/
        //$this->db->select('p.*, d.dept_name, e.*');
              
        $query = $this->db->get();

        if($query->num_rows() > 0){
          return $query->result();
          }
        return false;        
    }

    public function getReject_history(){

        $this->db->where('status',1);
        $this->db->where('profile_status',2);
        $this->db->order_by("reg_status",'desc');
        $this->db->from(PERSONAL.' as p');
        /*$this->db->join(DEPARTMENTS.' as d', 'p.department = d.id', 'left');
        $this->db->join(EXPERIENCE.' as e', 'p.personal_id = e.personal_id', 'LEFT');*/
        //$this->db->select('p.*, d.dept_name, e.*');
              
        $query = $this->db->get();

        if($query->num_rows() > 0){
          return $query->result();
          }
        return false;        
    }

    public function getNotifications(){

        $this->db->where('p.status',1);
        $this->db->where('p.profile_status',0);
        $this->db->order_by("p.created_on",'desc');
        $this->db->from(PERSONAL.' as p');
        $this->db->join(DEPARTMENTS.' as d', 'd.id = p.department', 'left');
        $this->db->select('p.*, d.dept_name');
        //$today = $this->db->select('p.created_on');
        //$this->db->select('DATEDIFF(CURRENT_TIMESTAMP(),"'.$today.'") as date_difference');      
        $query = $this->db->get()->result_array();

        return $query;
    }

    public function getStaff_List(){

        $this->db->where("profile_status",1);
        $this->db->from(PERSONAL.' as p');
        $this->db->join(TEAMDATA.' as t',' t.personal_id = p.personal_id','LEFT'); 
        //$this->db->join(EXPERIENCE.' as e', 'p.personal_id = e.personal_id','LEFT');  
        $this->db->order_by('t.status desc');           
        $query = $this->db->get();

        if($query->num_rows() > 0){
          return $query->result();
        }
        return false;        
    }

    public function select_staff($data){
        for($i=0; $i<count($data); $i++){
        $this->db->where('personal_id',$data['personal_id'][$i] );
        $this->db->insert(JOINING,$getData['staff_status'][$i]);
        }
    }
    
    public function getDepartments(){
        $this->db->where("status",1);
        $q = $this->db->get(DEPARTMENTS)->result();
        return $q;
    }

    public function getEducation(){    
        $this->db->where('status',1);
        $q = $this->db->get(EDUCATION)->result();
        return $q;
    }
	
}

?>