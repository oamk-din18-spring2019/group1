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
            $_SESSION['time']= $this->User_model->getDate($givenUsername);
            $_SESSION['image']=$this->User_model->getPictureName($_SESSION['username']);
            $_SESSION['idUser']=$this->User_model->getIdUser($givenUsername);
            $data['message'] = "Succesful";

            //check if user wants to automatically log in 
            if ($this->input->post('rememberMe') == 'on'){
                $veriKey = $this->generateKey();
                setcookie('username', $_SESSION['username'], time() + 365*24*60*60);
                setcookie('key', $veriKey, time() + 365*24*60*60);
                $this->User_model->addCookie($_SESSION['username'], $veriKey);
                redirect('user');
            }
            //redirect('User/getCategories');

        } else {
            $_SESSION['logged_in'] = false;
            $data['messagePassword']="Wrong password or username";
            $this->load->view('user/login/login', $data);
        }
    }
    function logout(){
        $_SESSION['logged_in']=false;
        redirect(site_url("main_page"));
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
