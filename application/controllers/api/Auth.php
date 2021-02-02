<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Auth extends REST_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->model(array('Auth_model'));
    }

    function index(){
        if($this->session->userdata('userId') != ''){
            //redirect('auth');
        }  else{
            $this->login();
        }
    }

	function login(){  
        if(!$this->my_library->is_login()){
            $jwt['id'] = 'a';
            $jwt['ecode'] = 'sdfasd';
            $jwt['time'] = time();
            $jwt['token'] = $this->authorization_token->generateToken($jwt);
            $this->load->view('auth/login');
        } else {
            $this->index();
        }
    }
    
    function register_post(){
        $this->form_validation->set_rules('name', 'User Name', 'required|trim');
        $this->form_validation->set_rules('pan', 'User PAN', 'trim');
        $this->form_validation->set_rules('contact', 'User Contact', 'required|trim|is_natural');
        $this->form_validation->set_rules('alternetcontact', 'User alternet Contact', 'required|trim|is_natural');
        $this->form_validation->set_rules('aadhar', 'User Aadhar', 'trim|exact_length[12]');
        if ($this->form_validation->run() == FALSE){    
            echo validation_errors();
        }
        else {  //success
            echo "form validation done";
            if($this->Auth_model->register()){

            }
        }
    }
}
