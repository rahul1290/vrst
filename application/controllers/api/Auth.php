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
        $this->form_validation->set_rules('contact', 'User Contact', 'required|trim|is_natural|exact_length[10]');
        $this->form_validation->set_rules('alternetcontact', 'User alternet Contact', 'trim|is_natural');
        $this->form_validation->set_rules('aadhar', 'User Aadhar', 'trim|exact_length[12]');
        $this->form_validation->set_rules('email','Email','trim|valid_email');
        $this->form_validation->set_rules('password','Password','trim|min_length[4]');
        $this->form_validation->set_rules('state_id','State','required|is_natural_no_zero');
        if ($this->form_validation->run() == FALSE){    
            echo validation_errors();
        }
        else {  //success
            $data['user_name'] = $this->post('name');
            $data['contact_no'] = $this->post('contact');
            $data['alternet_no'] = $this->post('alternetcontact');
            $data['pan_no'] = $this->post('pan');
            $data['aadhar_no'] = $this->post('aadhar');
            $data['email'] = $this->post('email');
            $data['password'] = $this->post('password');
            $data['state_id'] = $this->post('state_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $insertid = $this->Auth_model->register($data);
            if($insertid){
                if($this->Auth_model->setotp($insertid,$this->my_library->generateNumericOTP())){
                    $userData['user_id'] = $insertid;
                    $userData['contact_no'] = $data['contact_no'];
                    $userData['msg'] = 'OTP sent to contact no.:'.$data['contact_no'];
                    $this->response($userData,200);
                }
            } else {
                echo "error";
            }
        }
    }

    function activate_user_post(){
        $this->form_validation->set_rules('userid', 'User Id', 'required|trim');
        $this->form_validation->set_rules('contactno', 'Contact no', 'required|trim|is_natural|exact_length[10]');
        $this->form_validation->set_rules('otp','OTP','required|trim|is_natural|exact_length[4]');
        if ($this->form_validation->run() == FALSE){    
            echo validation_errors();
        }
        else {
            $data['user_id'] = $this->post('userid');
            $data['contactno'] = $this->post('contactno');
            $data['otp'] = $this->post('otp');

            $result = $this->Auth_model->activate_user($data);
            if($result){
                $result['msg'] = 'Account activated successfully.';
                $this->response($result,200);
            } else {
                $result['msg'] = 'OTP not matched.';
                $this->response($result,500);
            }
        }
    }
}
