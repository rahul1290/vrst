<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Auth extends REST_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->model(array('api/Auth_model'));
    }

    function index(){
        if($this->session->userdata('userId') != ''){
            //redirect('auth');
        }  else{
            $this->login();
        }
    }

	function login_post(){  
        $this->form_validation->set_rules('contact', 'Contact no', 'required|trim|is_natural|exact_length[10]');
        $this->form_validation->set_rules('password', 'password', 'trim|min_length[4]');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        
        if ($this->form_validation->run() == FALSE){    
            echo validation_errors();
        }
        else {
            $data['contact'] = $this->post('contact');
            $data['password'] = $this->post('password');
            $data['user_type'] = $this->post('user_type');
            $result = $this->Auth_model->login($data);
            if($result){
                $jwt['id'] = $result['user_id'];
                $jwt['email'] = $result['email'];
                $jwt['time'] = time();
                $result['token'] = $this->authorization_token->generateToken($jwt);
                $result['msg'] = 'Login successfully.';
                $this->response($result,200);
            } else {
                $result['msg'] = 'Credentials not matched.';
                $this->response($result,500);
            }
        }        
    }

    function generate_otp_login_post(){
        $this->form_validation->set_rules('contact','Contact no','required|trim|is_natural|exact_length[10]');
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        } else {
            $data['contact_no'] = $this->post('contact');
            $result = $this->Auth_model->generate_otp_login($data);
            if($result){
                $userData['contact_no'] = $this->post('contact');
                $userData['msg'] = 'OTP sent';
                $this->response($userData,200);
            } else {
                $result['msg'] = 'Contact no. not registred with system.';
                $this->response($result,500);
            }
        }
    }

    function otp_after_registration_post(){
        $this->form_validation->set_rules('contact','Contact no','required|trim|is_natural|exact_length[10]');
        $this->form_validation->set_rules('otp','OTP','required|trim|is_natural|exact_length[4]');
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        } else {
            $data['contact'] = $this->post('contact');
            $data['otp'] = $this->post('otp');
            $result = $this->Auth_model->otp_after_registration($data);
            if($result){
                $jwt['id'] = $result['user_id'];
                $jwt['email'] = $result['email'];
                $jwt['time'] = time();
                $result['token'] = $this->authorization_token->generateToken($jwt);
                $result['msg'] = 'Login successfully.';
                $this->response($result,200);
            } else {
                $result['msg'] = 'Wrong OTP';
                $this->response($result,500);
            }
        }
    }

    function login_with_otp_post(){
        $this->form_validation->set_rules('contact','Contact no','required|trim|is_natural|exact_length[10]');
        $this->form_validation->set_rules('otp','OTP','required|trim|is_natural|exact_length[4]');
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        } else {
            $data['contact'] = $this->post('contact');
            $data['otp'] = $this->post('otp');
            $result = $this->Auth_model->login_with_otp($data);
            if($result){
                $jwt['id'] = $result['user_id'];
                $jwt['email'] = $result['email'];
                $jwt['time'] = time();
                $result['token'] = $this->authorization_token->generateToken($jwt);
                $result['msg'] = 'Login successfully.';
                $this->response($result,200);
            }
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
                $otp = $this->my_library->generateNumericOTP();
                if($this->Auth_model->setotp($insertid,$otp)){
                    $userData['user_id'] = $insertid;
                    $userData['contact_no'] = $data['contact_no'];
                    $userData['msg'] = 'OTP sent to contact no.:'.$data['contact_no'];
                    //opt send
                    $this->my_library->sendOTP($data['contact_no'],$otp);
                    
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
