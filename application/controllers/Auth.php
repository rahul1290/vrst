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

    function index(){
        if($this->my_library->is_login()){
            if($this->session->userdata('user_type') == 'admin'){
                redirect('Admin');
            } else if($this->session->userdata('user_type') == 'distributor') {
                redirect('Distributor');
            } else {
				redirect('Salesagent_ctrl');
			}
        } else {
            $this->login();
        }
    }
	
	function signup(){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			$data = array();
			$data['header'] = $this->load->view('common/header','',true);
			$data['mainBody'] = $this->load->view('auth/signup','',true);
			$data['footer'] = $this->load->view('common/footer','',true);
			$this->load->view('common/layout',$data);
		}
	}
	
	function checkuser(){
		$this->form_validation->set_rules('usertype', 'usertype', 'required|trim');
		$this->form_validation->set_rules('identity', 'Identity', 'required|trim');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			echo json_encode(array('msg'=>'something wrong.','status'=>500));
		}
		else {
			if($this->input->post('usertype') == 'distributor'){
				$identity = $this->input->post('identity');
				$sql = "select * from distributor where (DealerId = ".$identity." OR DealerEmail = ".$identity." OR DealerCont = ".$identity.")";
				$result = $this->db->query($sql)->result_array();
				if(count($result) == 1){
					echo json_encode(array('msg'=>'user exist.','data'=>$result,'status'=>200));
				} else {
					echo json_encode(array('msg'=>'user not exist.','status'=>500));
				}
			} else {
				$identity = $this->input->post('identity');
				$sql = "select * from sale_executive where password = '' AND EmpId =".$identity;
				$result = $this->db->query($sql)->result_array();
				if(count($result) == 1){
					echo json_encode(array('msg'=>'user exist.','data'=>$result,'status'=>200));
				} else {
					echo json_encode(array('msg'=>'user not exist.','status'=>500));
				}
			}
			
		}
	}
	
	function generate_password(){
		if($this->input->post('usertype') == 'distributor'){
			$this->db->where('DealerId',$this->input->post('identity'));
			$this->db->update('distributor',array('password'=>$this->input->post('password')));
			echo json_encode(array('status'=>200));
		} else {
			$this->db->where('EmpId',$this->input->post('identity'));
			$this->db->update('sale_executive',array('password'=>$this->input->post('password')));
			echo json_encode(array('status'=>200));
		}
	}

    function login(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
			if($this->my_library->is_login()){
				redirect('Auth');
			}
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
                if(count($result)>0){
                    $sessionData = array();
                    $sessionData['user_id'] = $result[0]['DealerId'];
                    $sessionData['user_name'] = $result[0]['DealerName'];
                    $sessionData['user_contact'] = $result[0]['DealerCont'];
                    $sessionData['is_active'] = $result[0]['DealerSts'];
                    $sessionData['user_type'] = $result[0]['user_type'];
                    $this->session->set_userdata($sessionData);
                    if($data['user_type'] == 'distributor'){
                        redirect('Distributor');
                    }
					if($data['user_type'] == 'sale-agent'){
						redirect('Salesagent_ctrl');
					}
                    if($data['user_type'] == 'admin'){
                        redirect('Admin');
                    }
                } else {
					return false;
				}
            }
        }
    }
}