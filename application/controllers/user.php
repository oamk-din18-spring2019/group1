<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index(){
        $data['activeFriends'] = $this->User_model->activeFriends();
        $data['page']='user/dashboard';
        $this->load->view('templates/content', $data);
    }
    public function login()
	{

		$this->load->view('user/login/login');
	}
	public function register() {

		$this->load->view('user/login/register');
    } 
     function add_user()
    {
      // $this->load->model("User_model");
      // print_r($this->input->post());
      if ($this->input->post('pw1')==$this->input->post('pw2'))
      {
      $hashedPassword = password_hash($this->input->post('pw1'), PASSWORD_DEFAULT);
      $insert_data = array(
        "username" => $this->input->post('un'),
        "email" => $this->input->post('em'),
        "passwd" => $hashedPassword
      );
      $result = $this->User_model->add_user($insert_data);
      if ($result == 1) {
        $data['message'] = "Registration passed succesful";
        $data['page'] = 'user/login/login';
        $this->load->view('templates/content', $data);
      } else {
        $data['message'] = "Something went wrong!";
      }
     
    }
    else{
        $this->load->view('user/login/register');
    }
    }
    function log_in()
    {
      // $this->load->model("User_model");
  
      $data['page'] = 'users/sign_in';
      $this->load->view('templates/content', $data);
    }
    function log_in_procedure()
    {
      // $this->load->model("User_model");
      //print_r($this->input->post()); 
      $givenUsername = $this->input->post('username');
      $givenPassword = $this->input->post('password');
      $db_password = $this->User_model->getPassword($givenUsername);
      echo '<br>' . $db_password . '<br>' . $givenPassword . '<br>' . $givenUsername . '<br>';
      if (password_verify($givenPassword, $db_password)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $givenUsername;
        $data['message'] = "Succesful";
        $data['page'] = 'users/user_page';
        $this->load->view('templates/content', $data);
      } else {
        $_SESSION['logged_in'] = false;
        echo "Something went wrong";
      }
  
      // $data['page']='users/';
      // $this->load->view('templates/content',$data);
    }
    public function profile($currentUser){
        // if ($currentUser === $logIn){
        //     //if the user is opening his/her own page, load page with all the content
        // }else{
        //     //if not, open the same page but hide some personal content
        // }
        $user = $this->User_model->profile($currentUser);
        $data['username'] = $user['username'];
        $data['dateOfEntry'] = $user['DoR'];
        $data['page'] = 'user/profile/profileHeader';
        $this->load->view('templates/content', $data);
    }
    public function getConvos(){

    }
    public function chat($username){
        $data['username'] = $username;
        $this->load->view('user/chat/chat_screen', $data);
    }
}
    