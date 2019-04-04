<?php
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function activeFriends(){
        return $this->db->query('select username from projectd.users')->result_array();
    }
    public function profile($username){
        $query = $this->db->get_where('projectd.users', array('username' => $username));
        return $query->row_array();
    }
    public function add_user($insert_data){
        $this->load-> database();
        $this->db->insert('users',$insert_data);
        return $this->db->affected_rows();
      }
      public function getPassword($givenUsername){
        $this->db->select('passwd');
        $this->db->from('users');
        $this->db->where('username',$givenUsername);
        return $this->db->get()->row('passwd');
      }
      public function getDate($name){
        $this->db->select('DoR');
        $this->db->from('users');
        $this->db->where('username',$name);
        return $this->db->get()->row('DoR');
    }
    public function getPictureName($name){
        $this->db->select('picture');
        $this->db->from('users');
        $this->db->where('username',$name);
        return $this->db->get()->row('picture');  
    }
    public function setUpPicture($name,$picture){
        $this->db->query("UPDATE users SET picture = '$picture' WHERE username = '$name'");
        return ($picture);
    }


}