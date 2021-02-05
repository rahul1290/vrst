<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Auth_model'));
    }

    function session_data(){
        print_r($this->session->userdata());
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login','refresh');
    }

    function login(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $data = array();
            $data['header'] = $this->load->view('common/header','',true);
            $data['mainBody'] = $this->load->view('auth/login','',true);
            $data['footer'] = $this->load->view('common/footer','',true);
            $this->load->view('common/layout',$data);
        } else {
            $this->form_validation->set_rules('identity', 'Identity', 'required|trim');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('usertype', 'User Type', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() == FALSE) {
                $data = array();
                $data['header'] = $this->load->view('common/header','',true);
                $data['mainBody'] = $this->load->view('auth/login','',true);
                $data['footer'] = $this->load->view('common/footer','',true);
                $this->load->view('common/layout',$data);
            }
            else {
                $data['identity'] = $this->input->post('identity');
                $data['password'] = $this->input->post('password');
                $data['user_type'] = $this->input->post('usertype');
                $result = $this->Auth_model->login($data);
                if($result){
                    $sessionData = array();
                    $sessionData['user_id'] = $result[0]['DealerId'];
                    $sessionData['user_name'] = $result[0]['DealerName'];
                    $sessionData['user_contact'] = $result[0]['DealerCont'];
                    $sessionData['is_active'] = $result[0]['DealerSts'];
                    $sessionData['user_type'] = $data['user_type'];
                    $this->session->set_userdata($sessionData);
                    if($data['user_type'] == 'distributor'){
                        redirect('Distributor');
                    }
                }
            }
        }
    }
}