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
        if ($this->input->post('pw1') == $this->input->post('pw2')) 
        {
            //hash the password and send the information to the database
            if ( $this->User_model->usernameChecker($this->input->post('un')) == $this->input->post('un'))
            {
                $data['message'] = "'".$this->input->post('un')."' username has already taken";
                $this->load->view('user/login/register', $data);
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
                    $data['message'] = "Registration passed succesful";
                    $this->load->view('user/login/login', $data);
                    $checkingName = $this->User_model->usernameChecker($insert_data["username"]);
                    echo $checkingName;
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
            $data['message'] = "Succesful";
            // $this->load->view('user/profile');

            if ($admin==false) {
              if (  $this->User_model->getPreferredCategories($_SESSION['idUser'])){
                  redirect('User/index');
              } else {
                  redirect('User/getCategories');
              }
            }
            if ($admin==true) {redirect('user/admin');}
   
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
}
