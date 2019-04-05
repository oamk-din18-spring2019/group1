<?php
class App_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function addMotion($newMotion){
        $this->db->insert('motions',$newMotion);
    }
}