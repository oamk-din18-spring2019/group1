<?php
class App_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function addMotion($newMotion){
        $this->db->insert('motions',$newMotion);
    }
}