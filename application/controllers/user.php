<?php
<<<<<<< HEAD
=======
defined('BASEPATH') OR exit('No direct script access allowed');
>>>>>>> master
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Search_model');
        if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
      } else{
        //   $this->load->view("user/login/login");
        // redirect("main_page");
        header('location:access_denied');
        }
    }
<<<<<<< HEAD

=======
function access_denied(){
    redirect("LoginRegistration/login");
}
>>>>>>> master
    public function index()
    {
        $data['activeFriends'] = $this->User_model->activeFriends();
        $data['page'] = 'user/dashboard';
        $this->load->view('templates/content', $data);
    }
<<<<<<< HEAD
    public function login()
    {
        $this->load->view('user/login/login');
    }

    public function register()
    {
        $this->load->view('user/login/register');
    }

    function add_user()
    {
        //Registration function
        // Checks the passwords to be equal
        if ($this->input->post('pw1') == $this->input->post('pw2')) {
            //hash the password and send the information to the database
                $hashedPassword = password_hash($this->input->post('pw1'), PASSWORD_DEFAULT);
                $insert_data = array(
                    "username" => $this->input->post('un'),
                    "email" => $this->input->post('em'),
                    "passwd" => $hashedPassword
                );
                $result = $this->User_model->add_user($insert_data);
                if ($result == 1) {
                    $data['message'] = "Registration passed succesful";
                    $this->load->view('user/login/login', $data);
                } else {
                //checks if the username is unique, but for this we have to change row "username" in db to be unique
                    $data['message'] = "This username is used already";
                    $this->load->view('user/login/register', $data);
                }
            } else {
            $data['message'] = "You entered the different passwords";
            $this->load->view('user/login/register', $data);
        }
    }

    function log_in_procedure()
    {
        //function for entering the system
        $givenUsername = $this->input->post('username');
        $givenPassword = $this->input->post('password');
        $db_password = $this->User_model->getPassword($givenUsername);
        //verify the password
        if (password_verify($givenPassword, $db_password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $givenUsername;
            $data['message'] = "Succesful";
            $data['page'] = 'user/dashboard';
            $this->load->view('templates/content', $data);
        } else {
            $_SESSION['logged_in'] = false;
            echo "Something went wrong";
        }

        // $data['page']='users/';
        // $this->load->view('templates/content',$data);
    }

    public function profile($currentUser)
    {
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

    public function chat($username){
        $data['username'] = $username;
        $this->load->view('user/chat/chat_screen', $data);
    }
    
    public function getCategories()
    {
        $data["categories"] = $this->User_model->getCategories();
        $this->load->view("user/login/questionnaire", $data);
    }

    public function chooseCategories()
    {
        $insert_data = array(
            'idUser' => '1',
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
        $this->User_model->addPreferredCategories($insert_data);
=======

    public function chat($username){
        $data['username'] = $username;
        $currentUser = $_SESSION['username'];
        $data['idChat'] = $this->User_model->openConvo($currentUser, $username);
        $this->load->view('user/chat/chat_screen', $data);
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
        $this -> load -> view ('user/profile/headerProfile');
        $this -> load -> view("settings/settings");
        $this -> load -> view ('user/profile/footerProfile');
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
      $this -> load -> view ('user/profile/headerProfile');
      $this -> load -> view('user/profile/profile');
      $this -> load -> view ('user/profile/footerProfile');
    }

    public function do_upload()
    {
            $config['upload_path']          = './images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;
            $config['max_width']            = 2024;
            $config['max_height']           = 2024;

            $this->load->library('upload', $config);
            echo($this->upload->data('file_name'));

            if ( $this->upload->do_upload('userfile') )
            {
                  echo "success!";
                  $_SESSION['image']=$this->User_model->setUpPicture($_SESSION['username'],$this->upload->data('file_name'));
                redirect('user/profile/profile');
            }
            else
            {
               $data['messageSettings']="The file is too big";
               $this -> load -> view ('user/profile/headerProfile');
               $this -> load -> view("settings/settings",$data);
               $this -> load -> view ('user/profile/footerProfile');

            }
    }
    function logout(){
        $_SESSION['logged_in']=false;
        redirect(site_url("main_page"));
>>>>>>> master
    }
}
        