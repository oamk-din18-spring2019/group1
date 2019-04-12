<?php
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function getUsersTable()
    {
        return $this->db->query('select * from projectd.users')->result_array();
    }

    public function getUserInfo($id)
    {
        return $this->db->query('select * from projectd.users where idUser='.$id)->row();
    }

    public function getUsername($id)
    {
      $this->db->select('username');
      $this->db->from('users');
      $this->db->where('idUser',$id);
      return $this->db->get()->row('username');
    }

    public function getActive($name)
    {
      $this->db->select('active');
      $this->db->from('users');
      $this->db->where('username',$name);
      return $this->db->get()->row('active');
    }

    public function getAdmin($name)
    {
      $this->db->select('admin');
      $this->db->from('users');
      $this->db->where('username',$name);
      return $this->db->get()->row('admin');
    }

    public function getFollowing($name)
    {
      $this->db->select('following');
      $this->db->from('users');
      $this->db->where('username',$name);
      $user=$this->db->get()->row();
      return explode(', ',$user->following);
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
    public function usernameChecker($username)
    {
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $username);
        return $this->db->get()->row('username');
    }
    public function emailChecker($email)
    {
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email', $email);
        return $this->db->get()->row('email');
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

    //cookie-related functions
    public function addCookie($username, $key){
        $this->db->insert('projectd.sessions', array('username' => $username, 'verification' => $key));
    }
    public function removeCookie($username){
        $this->db->query("delete from projectd.sessions where username='$username'");
    }
    public function verifyCookie($username, $key){
        if ($username === null || $key === null) return false;
        $result = $this->db->query("select verification from projectd.sessions where username = '$username'");
        return $result->result()[0]->verification === $key ? true : false;
    }

    public function getPreferredCategories($id)
    {
        return $this->db->query("select * from categories where idUser=$id")->result_array();
    }
      public function findCategoryQuestion($category){
        $this->db->select('');
        $this->db->from('motions');
        $this->db->where('category',$category);
        //

        // This system returns random question from motions 
        // $numberOfRows=$this->db->get()->row('COUNT(*)');  
        
         return $this->db->query("SELECT motions.idMotion,category,content,if(agree=0 or agree=1,agree,null) as agree from motions  left join  opinions on opinions.idMotion=motions.idMotion where (agree is null and(category='$category')) ; 
         ")->result_array(); 
        // return( $arrayOfMotions[rand(0,$numberOfRows-1)]['content']);
        //
    }
    public function showAnsweredMotions($category){
        return $this->db->query("SELECT motions.idMotion,category,content,if(agree=0 or agree=1,agree,null) as agree from motions  left join  opinions on opinions.idMotion=motions.idMotion where (agree is not null and(category='$category')) order by agree ;
        ")->result_array(); 
    }
    public function addOpinion($idMotion,$idUser,$opinion){
        $this->db->query("INSERT INTO `opinions` (`id`, `idMotion`, `idUser`, `Agree`) VALUES (NULL, '$idMotion', '$idUser', '$opinion')");

    }

    public function checkIfFollowing($id) {
      $following=$this->User_model->getFollowing($_SESSION['username']);
      $result=false;
      foreach ($following as $key ) {
        if ($key==$id) {$result=true;}
      }
      return $result;
    }

    public function follow($id) {
      $following=$this->User_model->getFollowing($_SESSION['username']);
      array_push($following,$id);
      $update_data = array(
        "following" => implode(", ",$following)
      );
      $this->db->where('username', $_SESSION['username']);
      $this->db->update('users',$update_data);
    }

    public function unfollow($id) {
      $following=$this->User_model->getFollowing($_SESSION['username']);
      array_splice($following,array_search($id,$following));
      $update_data = array(
        "following" => implode(", ",$following)
      );
      $this->db->where('username', $_SESSION['username']);
      $this->db->update('users',$update_data);
    }
}
