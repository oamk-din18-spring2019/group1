<?php
class Search_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function cariTest()
    {
        $cari = $this->input->GET('cari', TRUE);
        if ($cari!="") {
        $data = $this->db->query("SELECT * from users where username like '%$cari%' ");
        return $data->result(); }
        else {
          return array();
        }
    }
}
