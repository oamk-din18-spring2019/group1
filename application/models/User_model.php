<?php
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function getUsersTable()
    {
        return $this->db->query('select * from projectd.users')->result_array();
    }

    public function friends()
    {
        return $this->db->query('select username from projectd.users')->result_array();
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
                $this->db->insert('projectd.conversations', array('idUser' => $idUser1, 'idUser1' => $idUser2));
            }
            $check = $this->db->get_where('projectd.conversations', array('idUser' => $idUser2, 'idUser1' => $idUser1))->row_array();
            $this->addConvo('c'.$check['idChat']);
            return 'c'.$check['idChat'];
        }
        $check = $this->db->get_where('projectd.conversations', array('idUser' => $idUser1, 'idUser1' => $idUser2))->row_array();
        $this->addConvo( 'c'.$check['idChat'] );
        return 'c'.$check['idChat'];
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
    function addConvo($idChat){
        $this->load->dbforge();
        $fields = array(
            'id' => array(
                'type' => 'int',
                'constraint' => '11',
                'auto_increment' => true,
                'unique' => true
            ),
            'username' => array(
                'type' => 'varchar',
                'constraint' => '255'
            ),
            'content' => array(
                'type' => 'text',
            ),
            'time' => array(
                'type' => 'datetime'
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($idChat, true);
    }

    public function getCategories()
    {
        return $this->db->list_fields('categories');
    }
    public function addPreferredCategories($insertdata)
    {
        $this->db->insert('categories', $insertdata);
        return $this->db->affected_rows();
    }
    public function addInterest($interests)
    {
        $this->db->
        $this->db->insert('categories', $interests);
        return $this->db->affected_rows();
    }
    public function getIdUser($name)
    {
        $this->db->select('idUser');
        $this->db->from('users');
        $this->db->where('username',$name);
        return $this->db->get()->row('idUser');
    }
    public function getPreferredCategories($id)
    {
        return $this->db->query("select * from categories where idUser=$id")->result_array();
    }
    public function findCategoryQuestion($category){
        $this->db->select('content');
        $this->db->from('motions');
        $this->db->where('category',$category);
        return $this->db->get()->row('content');
    }

    


}
