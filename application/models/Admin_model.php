<?php
class Admin_model extends CI_Model{
 
  public function validate($username,$password){
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $result = $this->db->get(ADMIN);
    return $result;
  }
 
}