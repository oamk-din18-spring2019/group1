<?php
class App extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('App_model');
    }

    public function aboutUs(){
		$data['page'] = 'app/aboutUs';
		$this->load->view('templates/content',$data);
    }
    
    public function addMotion(){
        if ( $_SERVER['REQUEST_METHOD'] == 'GET'){
            $data['added'] = false;
            $data['page'] = 'app/addMotion';
            // $this->load->view('templates/content', $data);
            $this->load->view('app/addMotion', $data);
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['added'] = true;
            $newMotion = array(
                'content' => $this->input->post('content'),
                'category' => $this->input->post('category')
            );
            $this->App_model->addMotion($newMotion);
            $this->load->view('app/addMotion', $data);
        }
    }
}