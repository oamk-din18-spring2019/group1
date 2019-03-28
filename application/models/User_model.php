<?php
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function activeFriends(){
        $query = $this->db->query('select username from projectd.users');
        $result = $query->result_array();
        return $result;
    }
}