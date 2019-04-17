<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginRegistration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Search_model');
    }

    public function index(){
        //check the cookie first
        //if it matches with the one stored in the server, load the dashboard
        $currentUser = get_cookie('username');
        $key = $this->input->cookie('verification');
        
        if ($this->User_model->verifyCookie($currentUser, $key)){
            //do the log in procedure
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $currentUser;
            $_SESSION['time']= $this->User_model->getDate($currentUser);
            $_SESSION['image']=$this->User_model->getPictureName($_SESSION['username']);
            $_SESSION['idUser']=$this->User_model->getIdUser($currentUser);
            
            redirect('user');
        }
        else{
            //if not, load the main page
            $data['page'] = 'user/mainpage';
            $this->load->view('templates/content', $data);
        }
    }

    public function login()
    {
        if( empty($_SESSION['logged_in']) || $_SESSION['logged_in']==false) $this->load->view('user/login/login');
        else redirect('user');
    }

    public function register()
    {
        $this->load->view('user/login/register');
    }

    function add_user()
    {
        //Registration function
        // Checks the passwords to be equal
        if ($this->input->post('pw1') == $this->input->post('pw2')) 
        {
            //hash the password and send the information to the database
            if ( $this->User_model->usernameChecker($this->input->post('un')) == $this->input->post('un'))
            {
                $data['message'] = "'".$this->input->post('un')."' username has already taken";
                $this->load->view('user/login/register', $data);
            } 
            else if ( $this->User_model->emailChecker($this->input->post('em')) == $this->input->post('em') )
            {
                $data['message'] = " <div class='col-md-12 text-center text-white bg-danger mb-0'> The user with this email exists alredy</div>";
                $this->load->view('user/login/login', $data);
            }
            else 
            {
                $hashedPassword = password_hash($this->input->post('pw1'), PASSWORD_DEFAULT);
                $insert_data = array(
                    "username" => $this->input->post('un'),
                    "email" => $this->input->post('em'),
                    "passwd" => $hashedPassword
                );
                $result = $this->User_model->add_user($insert_data);
                if ($result == 1) 
                {
                    $data['message'] = " <div class='col-md-12 text-center text-white bg-info mb-0'>Registration passed succesfully </div>";
                    $this->load->view('user/login/login', $data);
                } 
            }
        } 
        else 
        {
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
        $active = $this->User_model->getActive($givenUsername);
        $admin = $this->User_model->getAdmin($givenUsername);
        //verify the password
        if (password_verify($givenPassword, $db_password)&&$active==true) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $givenUsername;
            $_SESSION['time']= $this->User_model->getDate($givenUsername);
            $_SESSION['image']=$this->User_model->getPictureName($_SESSION['username']);
            $_SESSION['idUser']=$this->User_model->getIdUser($givenUsername);
            $_SESSION['admin']=$admin;
          
            //check if user wants to automatically log in 
            if ($this->input->post('rememberMe') == 'on'){
                $veriKey = $this->generateKey();
                $this->input->set_cookie('username', $_SESSION['username'], 365*24*60*60);
                $this->input->set_cookie('verification', $veriKey, 365*24*60*60);
                $this->User_model->addCookie($_SESSION['username'], $veriKey);
            }
            
            //check if user logs in as admin
            if ($admin==false) {
              if (  $this->User_model->getPreferredCategories($_SESSION['idUser'])){
                  redirect('User/index');
              } else {
                  redirect('User/getCategories');
              }
            } else {redirect('user/admin');}

        } else {
            $_SESSION['logged_in'] = false;
            if ($active==false) {
              $data['messagePassword']="You are banned!";
            }
            else {
              $data['messagePassword']="Wrong password or username";
            }
            $this->load->view('user/login/login', $data);
        } 
    }
  
    function logout(){
        $_SESSION['logged_in']=false;
        delete_cookie('username');
        delete_cookie('verification');
        $this->User_model->removeCookie($_SESSION['username']);
        redirect(site_url("LoginRegistration/index"));
    }

    public function generateKey(){
        //this will be a 10-character long string for cookie verification
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $key = '';
        for ($i = 0; $i < 10; $i++) {
            $key .= $characters[rand(0, $charactersLength - 1)];
        }
        return $key;
    }
}
