<?php
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
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
    public function openConvo($username1, $username2){
        //look up id of 2 usernames
        $idUser1 = $this->db->get_where('projectd.users', array('username' => $username1))->row_array()['idUser'];
        $idUser2 = $this->db->get_where('projectd.users', array('username' => $username2))->row_array()['idUser'];

        //check if the conversation exists or not
        $check = $this->db->get_where('projectd.conversations', array('idUser' => $idUser1, 'idUser1' => $idUser2));
        if($check->row_array() == null){
            $check = $this->db->get_where('projectd.conversations', array('idUser' => $idUser2, 'idUser1' => $idUser1));
            if ($check->row_array() == null) {
                $check = $this->db->insert('projectd.conversations', array('idUser' => $idUser1, 'idUser1' => $idUser2));
                $check = $this->db->get_where('projectd.conversations', array('idUser' => $idUser2, 'idUser1' => $idUser1));
            }
        }
        return $check->row_array();
    }
    
}