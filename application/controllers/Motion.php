<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Motion extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model');
      if (empty($_SESSION['logged_in']) && $_SESSION['logged_in'] == false){
      redirect('user/access_denied');
      }
    }
    public function answerTheQuestion($category){
        $data['category']=$category;
        $data["preferredCategories"] = $this->User_model->getPreferredCategories($_SESSION['idUser']);
        $data["categories"] = $this->User_model->getCategories();
        $data['question'] = $this-> User_model->findCategoryQuestion($category,$_SESSION['idUser']);
        $data['answeredMotions']=$this-> User_model->showAnsweredMotions($category,$_SESSION['idUser']);
        // $this -> load -> view ('templates/navbarDashboard');
        $this->load->view('user/profile/headerProfile');
        $this->load->view('user/categories', $data);
        $this->load->view('user/argument/answer',$data);
        $this->load->view('user/profile/footerProfile');
      }
    public function answeredMotions($category)
    {
      $data['answeredMotions']=$this-> User_model->showAnsweredMotions($category,$_SESSION['idUser']);
      $data["preferredCategories"] = $this->User_model->getPreferredCategories($_SESSION['idUser']);
      $data["categories"] = $this->User_model->getCategories();
      $this->load->view('user/profile/headerProfile');
      $this->load->view('user/categories', $data);
      $this->load->view('user/answeredMotions', $data);
      $this->load->view('user/profile/footerProfile');
    }
    public function getAnswer($answer){
    $opinion=$this->input->post('defaultExampleRadios');
     $this->User_model->addOpinion($answer,$_SESSION['idUser'],$opinion);
    print_r($opinion);
    header("Location: ".$_SERVER['HTTP_REFERER']);
    // redirect('user/answerTheQuestion/')
    // addOpinion($idMotion,$idUser,$opinion)
    }
    public function listOfOpponents($idMotion){
      $data['opponents']=array();
      $data['opponents']=$this->User_model->findOpponents($idMotion,$_SESSION['idUser']);
      
      $this-> load-> view('user/profile/headerProfile');
        $this-> load-> view('user/argument/listOfOpponents',$data);
        $this-> load-> view('user/profile/footerProfile');
      

    }
}