<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Motion extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model');
      if (empty($_SESSION['logged_in']) && $_SESSION['logged_in'] == false){
        header('location:User/access_denied');
      }
    }
    public function answerTheQuestion($category){
        $data['category']=$category;
        $data['question'] = $this-> User_model->findCategoryQuestion($category);
        // $this -> load -> view ('templates/navbarDashboard');
       $this-> load-> view('user/argument/answer',$data);
       $this -> load -> view ('templates/footer');
      }
    public function getAnswer($answer){
    $opinion=$this->input->post('defaultExampleRadios');
    $this->User_model->addOpinion($answer,$_SESSION['idUser'],$opinion);
    header("Location: ".$_SERVER['HTTP_REFERER']);
    // redirect('user/answerTheQuestion/')
    // addOpinion($idMotion,$idUser,$opinion)
    }
}