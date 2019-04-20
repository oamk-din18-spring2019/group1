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

    //conversation-related function
    public function openConversation($username1, $username2){
        //check if the conversation exists or not
        $check = $this->db->get_where('projectd.conversations', array('username1' => $username1, 'username2' => $username2));
        if($check->row_array() == null){
            $check = $this->db->get_where('projectd.conversations', array('username1' => $username2, 'username2' => $username1));
            if ($check->row_array() == null) {
                $this->db->insert('projectd.conversations', array('username1' => $username1, 'username2' => $username2));
            }
            $check = $this->db->get_where('projectd.conversations', array('username1' => $username2, 'username2' => $username1))->row_array();
            $this->addConversation('c'.$check['idChat']);
            //returns id of the conversation
            return 'c'.$check['idChat'];
        }
        $check = $this->db->get_where('projectd.conversations', array('username1' => $username1, 'username2' => $username2))->row_array();
        $this->addConversation( 'c'.$check['idChat'] );
        return 'c'.$check['idChat'];
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
    public function deleteOldPicture($picture) {
      if ($picture!=NULL) {unlink("images/".$picture);}
    }

    function addConversation($idChat){
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
    public function showConversations($currentUser){
    //show list of ongoing conversations
        $result1 = $this->db->query("select username2 from conversations where username1='$currentUser'")->result_array();
        $result2 = $this->db->query("select username1 from conversations where username2='$currentUser'")->result_array();
        $chatList = array();
        foreach($result1 as $row){
            array_push($chatList, $row['username2']);
        }
        foreach($result2 as $row){
            array_push($chatList, $row['username1']);
        }
        return $chatList;
    }
    public function getDate($name){
        $this->db->select('DoR');
        $this->db->from('users');
        $this->db->where('username',$name);
        return $this->db->get()->row('DoR');
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
    public function getRating($username){
        return $this->db->query("select ratingPoint from users where username='$username'")->result()[0]->ratingPoint;
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
      public function findCategoryQuestion($category,$idUser){
        //
        // This system returns random question from motions
        // $numberOfRows=$this->db->get()->row('COUNT(*)');
         return $this->db->query(" SELECT motions.idMotion,opinions.idUser,category,content,if(agree=0 or agree=1,agree,null)
         as agree from motions  left join  opinions on opinions.idMotion=motions.idMotion
         left join users on users.idUser=opinions.idUser where opinions.idUser=$idUser and category='$category' and agree is  null;")->result_array();

        // return( $arrayOfMotions[rand(0,$numberOfRows-1)]['content']);
        //
    }
    public function showAnsweredMotions($category,$idUser){
        return $this->db->query(" SELECT motions.idMotion,opinions.idUser,category,content,if(agree=0 or agree=1,agree,null)
        as agree from motions  left join  opinions on opinions.idMotion=motions.idMotion
        left join users on users.idUser=opinions.idUser where opinions.idUser=$idUser and category='$category' and agree is not null;")->result_array();
    }
    public function addOpinion($idMotion,$idUser,$opinion){
        $this->db->query("UPDATE `opinions` SET  `Agree` = '$opinion' WHERE `idMotion` = '$idMotion' and `idUser` = '$idUser'");

    }
    public function  setOpinionsToNull($category,$idUser){
        $categoriesArray= array();

        $users=array();
        $users=$this->db->query("select idUser from users")->result_array();
        $firstUserId=$users[0]['idUser'];
       if (isset($users[1])){
        $categoriesArray=$this->db->query("SELECT motions.idMotion,opinions.idUser,if(agree=0 or agree=1,agree,null) 
        as agree from motions  left join  opinions on opinions.idMotion=motions.idMotion 
        left join users on users.idUser=opinions.idUser where category='$category' and opinions.idUser=$firstUserId;")->result_array();  
       } else {
        $categoriesArray=$this->db->query("SELECT motions.idMotion,opinions.idUser,if(agree=0 or agree=1,agree,null) 
        as agree from motions  left join  opinions on opinions.idMotion=motions.idMotion 
        left join users on users.idUser=opinions.idUser where category='$category'")->result_array();
       }
                

          for($i=0;$i<count($categoriesArray);$i++){
            $motion=$categoriesArray[$i]['idMotion'];
            $categoriesArray[$i]['agree']=null;
            $this->db->query("INSERT INTO `opinions` (`id`, `idMotion`, `idUser`, `Agree`) VALUES (NULL, '$motion', '$idUser', null)");
     }
        return $firstUserId;
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

    public function checkIfUsernameExists($name) {
      $exists=false;
      $this->db->select('username');
      $this->db->from('users');
      $this->db->where('username',$name);
      if ($this->db->get()->row('username')!=NULL) {$exists=true;}
      return $exists;
    }
    public function findOpponents($idMotion,$idUser){
       $agree=$this->db->query("SELECT if(agree=0 or agree=1,agree,null) 
       as agree from motions  left join  opinions on opinions.idMotion=motions.idMotion 
       left join users on users.idUser=opinions.idUser where opinions.idUser=$idUser and motions.idMotion=$idMotion;")->row('agree');
    //    return $agree;
        return $this->db->query("SELECT username from motions  left join  opinions on opinions.idMotion=motions.idMotion 
        left join users on users.idUser=opinions.idUser 
        where opinions.idUser!=$idUser and motions.idMotion=$idMotion  and agree!=$agree;")->result_array();
    }

    //function for rating users
    public function rate($voter, $username, $up){
        //$up=true will upvote while false will downvote
        $point = $this->db->query("select ratingPoint from users where username='$username'")->result()[0]->ratingPoint;
        $point = $up=='up' ? $point+1 : $point-1;
        $this->db->query("update users set ratingPoint= $point where username = '$username'");
        //return $this->db->affected_rows() == 1 ? 'point updated' : 'point not'.$point;
        $this->db->query(" delete from rating where voted='$username' and votedBy='$voter' "); //delete the previous history
        $this->db->query("insert into rating (voted, votedBy, up) values ('$username', '$voter', '$up')");
    }
    public function changeRating(){

    }
}


