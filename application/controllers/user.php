<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model');
      $this->load->model('Search_model');
      if (empty($_SESSION['logged_in']) && $_SESSION['logged_in'] == false){
        header('location:access_denied');
      }
    }
    function access_denied(){
      redirect("LoginRegistration/login");
    }
    public function index()
    {
      //$data['activeFriends'] = $this->User_model->activeFriends(); //TODO: modify so it actually shows active friends
      $data['page'] = 'user/dashboard';
      $data["preferredCategories"] = $this->User_model->getPreferredCategories($_SESSION['idUser']);
      $data["categories"] = $this->User_model->getCategories();
      $this->load->view('user/profile/headerProfile');
      $this->load->view('user/categories', $data);
      $this->load->view('user/dashboard', $data);
      $this->load->view('user/profile/footerProfile');
    }

     # Search engine
    public function search()
    {
      $this->load->view('user/profile/headerProfile');
      $this->load->view('user/search/search');
      $data['cari'] = $this->Search_model->cariTest();
      $this->load->view('user/search/searchresult', $data);
      $this->load->view('user/profile/footerProfile');
    }

    function settings(){
      $this -> load -> view('user/profile/headerProfile');
      $this -> load -> view("settings/settings");
      $this -> load -> view('user/profile/footerProfile');
    }

    public function changePassword() {
      $this -> load -> view ('user/profile/headerProfile');
      $this -> load -> view('settings/changePassword');
      $this -> load -> view ('user/profile/footerProfile');
    }

    public function ch_Passwd() {
      if ($this->input->post('new_password')==$this->input->post('confirm_password')){
        $hashedPassword = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        $update_data = array(
          "passwd" => $hashedPassword
        );
        $this->db->update('users',$update_data);
        redirect('user/profile');
      }
      else {redirect('user/profile');}
    }

    function profile() {
      //$data['rating'] = $this->User_model->getRating($username);
      // $username=$_SESSION['username'];
      // $idUser=$_SESSION['idUser'];
      // $this->User_model-> getStatistics($username,$idUser);
      $data['selectedAchievements']=$this->User_model->getSelectedAchievements($_SESSION['username']);
      $data['statistics']= $this->User_model->getStatistics($_SESSION['username'],$this->User_model->getIdUser($_SESSION['username']));
      $data['motto']= $this->User_model->getUserInfo($_SESSION['idUser'])->motto;
      $this -> load -> view ('user/profile/headerProfile');
      $this -> load -> view('user/profile/profile',$data);
      $this -> load -> view ('user/profile/footerProfile');
    }


    function others_profile() {
      $data['selectedAchievements']=$this->User_model->getSelectedAchievements($_GET['username']);
      $data['statistics']= $this->User_model->getStatistics($_GET['username'],$this->User_model->getIdUser($_GET['username']));
      $this -> load -> view ('user/profile/headerProfile');
      $this -> load -> view('user/others_profile',$data);
      $this -> load -> view ('user/profile/footerProfile');
    }


    public function getCategories()
    {
      $data["categories"] = $this->User_model->getCategories();
      $this->load->view("user/login/questionnaire", $data);
    }

    public function chooseCategories()
    {
      $insert_data = array(
        'idUser' => $_SESSION['idUser'],
        'culture'=> $this->input->post('culture'),
        'science'=> $this->input->post('science'),
        'technology'=> $this->input->post('technology'),
        'fashion'=> $this->input->post('fashion'),
        'lifestyle'=> $this->input->post('lifestyle'),
        'politics'=> $this->input->post('politics'),
        'art'=> $this->input->post('art'),
        'culinary'=> $this->input->post('culinary'),
        'education'=> $this->input->post('education'),
        'history'=> $this->input->post('history')
      );
      print_r($insert_data);
      $idUser=$_SESSION['idUser'];
      foreach ($insert_data as $key => $value){
        if ($key!='idUser'){
        $this->User_model->setOpinionsToNull($key,$idUser);
        }
      }
     // $categoriesArray=$this->User_model->setOpinionsToNull($key,$idUser);
      $this->User_model->addPreferredCategories($insert_data);
       redirect('User/index');
    }
    public function showPreferredCategories()
    {
      $data["preferredCategories"] = $this->User_model->getPreferredCategories($_SESSION['idUser']);
      $data["categories"] = $this->User_model->getCategories();
      $this->load->view('User/index', $data);
    }
    public function do_upload()
    {
      $config['upload_path']          = './images/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 5000;
      $config['max_width']            = 1500;
      $config['max_height']           = 1500;
      $config['min_width']            = 1000;
      $config['min_height']           = 1000;

      // Get name of old picture
      $oldPicture=$this->User_model->getUserInfo($_SESSION['idUser'])->picture;

      $this->load->library('upload', $config);
      echo($this->upload->data('file_name'));

      if ( $this->upload->do_upload('userfile') )
      {
        echo "success!";
        $_SESSION['image']=$this->User_model->setUpPicture($_SESSION['username'],$this->upload->data('file_name'));
        // Delete old picture
        $this->User_model->deleteOldPicture($oldPicture);
        redirect('user/profile/profile');
      }
      else
      {
        $data['messageSettings']="The file should be more then 1000 px height and width and less then 1500 px height and width <br> the best size is 1024/1024";
        $this -> load -> view ('user/profile/headerProfile');
        $this -> load -> view("settings/settings",$data);
        $this -> load -> view ('user/profile/footerProfile');
      }
    }

    public function admin() {
      if ($_SESSION['admin']==true) {
        $this -> load -> view ('user/admin/adminHeader');
        $this -> load -> view('user/admin/admin');
        $this -> load -> view ('user/admin/adminFooter');
      }
      else{
        redirect(site_url('user/profile'));
      }
    }
    public function changeAddMotion(){
      if ($_SESSION['admin']==true) {
        $id=$_SESSION['idUser'];
        $data['categories']=$this->User_model->getPreferredCategories($id);
        $data['motions']=$this->User_model->showAllMotions();
        //$this->User_model->addMotion();
        $this -> load -> view ('user/admin/adminHeader');
        $this -> load -> view('user/admin/changeAddMotion',$data);
        $this -> load -> view ('user/admin/adminFooter');
      }
      else{
        redirect(site_url('user/profile'));
      }
    }
    public function deleteMotion($idMotion){
      $this->User_model->deleteMotion($idMotion);
      header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    public function updateMotion($idMotion){
      if ($_SESSION['admin']==true) {
      $data['categories']=$this->User_model->getPreferredCategories($_SESSION['idUser']);
      $data['motion']=$this->User_model->getMotion($idMotion);
      $this -> load -> view ('user/admin/adminHeader');
      $this -> load -> view('user/admin/updateMotion',$data);
      $this -> load -> view ('user/admin/adminFooter');
      } else {
        redirect(site_url('user/profile'));
      }
    }
    public function updateMotionProcedure(){
      if ($_SESSION['admin']==true) {
      $idMotion=$this->input->post('id');
      $content=$this->input->post('content');
      $category=$this->input->post('category');
      $this->User_model->updateMotion($idMotion,$content,$category);
      redirect(site_url('user/changeAddMotion'));
      } else {
        redirect(site_url('user/profile'));
      }

    }
public function addMotionProcedure(){
  print_r( $this->input->post());
echo $this->input->post('category');
echo $this->input->post('motionDescription');
$motionDesc=$this->input->post('motionDescription');
$category=$this->input->post('category');
if($this->User_model->addMotion($motionDesc,$category))
{
$data['message']="New motion has been added";
};
redirect(site_url('user/changeAddMotion'),$data);

}
    public function ban() {
      if ($_SESSION['admin']==true) {
        $this -> load -> view ('user/admin/adminHeader');
        $this -> load -> view('user/admin/ban');
        $this -> load -> view ('user/admin/adminFooter');
      }
      else{
        redirect(site_url('user/profile'));
      }
    }

    public function ban_user() {
      $name=$_GET['username'];
      $active = $this->User_model->getActive($name);
      if ($active == true) {
        $update_data = array("active" => false);
      }
      else {
        $update_data = array("active" => true);
      }
      $this->db->where('username', $name);
      $this->db->update('users',$update_data);
      redirect('user/ban');
    }
    public function deleteUser($idUser){
      $this->User_model->deleteUser($idUser);
      redirect('user/ban');
    }

    public function following() {
      $followingList=$this->User_model->getFollowing($_SESSION['username']);
      array_splice($followingList,0,1);
      $data['following']=array();
      foreach ($followingList as $key) {
          array_push($data['following'],$this->User_model->getUserInfo($key));
      }
      $this -> load -> view ('user/profile/headerProfile');
      $this -> load -> view('user/following/following',$data);
      $this -> load -> view ('user/profile/footerProfile');
    }

    public function answerTheQuestion($category){
      $data['category']= $category;
      $data['question'] = $this-> User_model->findCategoryQuestion($category);
      // $this -> load -> view ('templates/navbarDashboard');
     $this-> load-> view('user/argument/answer',$data);
     $this -> load -> view ('templates/footer');
    }
    public function getAnswer($answer){
      echo $this->input->post('defaultExampleRadios');
    }

    public function toggleFollow() {
      $id=$_POST['id'];
      if ($this->User_model->checkIfFollowing($id)) {
        $this->User_model->unfollow($id);
      }
      else {
        $this->User_model->follow($id);
      }
      redirect(site_url('user/others_profile?username=').$this->User_model->getUsername($id));
    }

    //chat-related functions
    public function allConversations($currentUser){
      $data['test'] = array_unique($this->User_model->showConversations($currentUser));
      $this->load->view('user/chat/chat_list', $data);
    }
    public function chat($username=null){
      if ($username == null){
        $this->load->view('user/chat/default');
      }else{
        $data['username'] = $username;
        $currentUser = $_SESSION['username'];
        $data['idChat'] = $this->User_model->openConversation($currentUser, $username);
        $this->load->view('user/chat/chat_screen', $data);
      }
    }
    public function social($username=null){
      $data['username']=$username;
      $this -> load -> view ('user/profile/headerProfile');
      $this->load->view('user/chat/messenger', $data);
      $this -> load -> view ('user/profile/footerProfile');
    }

    public function achievements(){
      $data['selectedAchievements']= $this->User_model->getSelectedAchievements($_SESSION['username']);
      $data['statistics']= $this->User_model->getStatistics($_SESSION['username'],$_SESSION['idUser']);
      $this -> load -> view ('user/profile/headerProfile');
      $this->load->view('achievements/achievements',$data);
      $this -> load -> view ('user/profile/footerProfile');
    }

    public function saveAchievements() {
      $data_array= array();
      foreach ($this->input->post() as $key => $value) {
        if ($key != "username") {array_push($data_array, $key);}
      }
      $update_data = implode(", ",$data_array);
      $this->User_model->updateSelectedAchievements($update_data);
      redirect('user/profile');
    }

    //rating functions
    public function rate($username, $up='up'){
      $data['rating'] = $this->User_model->rate($_SESSION['username'], $username, $up);
      $data['rated'] = $this->User_model->checkRating($username, $_SESSION['username']);
      redirect(site_url('user/others_profile?username=').$username);
    }
    public function addNews($news)
    {

    }
    public function showNews()
    {

    }

    public function changeMotto() {
      $motto=$_POST['motto'];
      $this->User_model->changeMotto($motto);
      redirect('user/profile');
    }
}
