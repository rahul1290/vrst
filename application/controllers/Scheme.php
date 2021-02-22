<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scheme extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Auth_model','Scheme_model'));
    }


    function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['state_code'] = $this->input->post('state');
			$data['crop_id'] = $this->input->post('crop');
            $data['heading'] = $this->input->post('heading');
            $data['subheading'] = $this->input->post('subheading');
			$data['instruction'] = $this->input->post('instruction');
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $entries = $this->input->post('entries');
            
            $this->db->trans_begin();
            $this->db->insert('scheme',$data);
            $insertId = $this->db->insert_id();
            if($insertId){
                $schemeDetail = array();
                foreach($entries as $entrie){
                    $temp = array();
                    $temp['scheme_id'] = $insertId;
                    $temp['qty'] = $entrie['qty'];
                    $temp['gift'] = $entrie['gift'];
                    $schemeDetail[] = $temp;
                }
                $this->db->insert_batch('scheme_detail',$schemeDetail);
            }
            if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    echo json_encode(array('msg'=>'something wrong.','status'=>500));
            }
            else{
                    $this->db->trans_commit();
                    echo json_encode(array('msg'=>'Scheme Successfully submitted.','status'=>200));
            }
        } else {    
            $data = array();
            $data['state'] = json_decode(file_get_contents(base_url().'api/get-states'),true);
			$data['crops'] = $this->Scheme_model->crop_list();
            $data['header'] = $this->load->view('common/header','',true);
            $data['topheader'] = $this->load->view('common/topheader','',true);
            $data['sidebar_nav'] = $this->load->view('common/sidebar_nav','',true);
            $data['mainBody'] = $this->load->view('scheme/scheme',$data,true);
            $data['footer'] = $this->load->view('common/footer','',true);
            $this->load->view('common/layout',$data);
        }
    }

	function cropVariety($cropId){
		$result = $this->Scheme_model->cropVariety($cropId);
		echo json_encode(array('data'=>$result,'status'=>200));
	}
	
    function index(){
        $data = array();
        $data['schemeList'] = $this->Scheme_model->SchemeList();
        $data['header'] = $this->load->view('common/header','',true);
        $data['topheader'] = $this->load->view('common/topheader','',true);
        $data['sidebar_nav'] = $this->load->view('common/sidebar_nav','',true);
        $data['mainBody'] = $this->load->view('scheme/scheme_list',$data,true);
        $data['footer'] = $this->load->view('common/footer','',true);
        $this->load->view('common/layout',$data);
    }

    function edit($schemeId){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['state_code'] = $this->input->post('state');
			$data['crop'] = $this->input->post('crop');
            $data['heading'] = $this->input->post('heading');
            $data['subheading'] = $this->input->post('subheading');
            $data['created_by'] = $this->session->userdata('user_id');
			$data['instruction'] = $this->input->post('instruction');
            $data['created_at'] = date('Y-m-d H:i:s');
            $entries = $this->input->post('entries');
            
            $this->db->trans_begin();
            $this->db->where('scheme_id',$schemeId);
            $this->db->update('scheme',array(
				'crop_id' => $data['crop'],
				'heading' => $data['heading'],
				'subheading' => $data['subheading'],
				'state_code' => $data['state_code'],
				'instruction' => $data['instruction'],
			));

			$this->db->where('scheme_id',$schemeId);
			$this->db->delete('scheme_detail');
			
			$schemeDetail = array();
			foreach($entries as $entrie){
				$temp = array();
				$temp['scheme_id'] = $schemeId;
				$temp['qty'] = $entrie['qty'];
				$temp['gift'] = $entrie['gift'];
				$schemeDetail[] = $temp;
			}
			$this->db->insert_batch('scheme_detail',$schemeDetail);
            
            if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    echo json_encode(array('msg'=>'something wrong.','status'=>500));
            }
            else{
                    $this->db->trans_commit();
                    echo json_encode(array('msg'=>'Scheme Successfully Updated.','status'=>200));
            }
        } else {
            $data = array();
            $data['schemeDetail'] = $this->Scheme_model->schemeList($schemeId);
            $data['schemeGiftDetail'] = $this->Scheme_model->schemeGiftDetail($schemeId);
            $data['crops'] = $this->Scheme_model->crop_list();
            $data['state'] = json_decode(file_get_contents(base_url().'api/get-states'),true);
            $data['header'] = $this->load->view('common/header','',true);
            $data['topheader'] = $this->load->view('common/topheader','',true);
            $data['sidebar_nav'] = $this->load->view('common/sidebar_nav','',true);
            $data['mainBody'] = $this->load->view('scheme/scheme',$data,true);
            $data['footer'] = $this->load->view('common/footer','',true);
            $this->load->view('common/layout',$data);
        }
    }

    function delete(){
        $schemeId = $this->input->post('schemeId');
        if($this->Scheme_model->delete($schemeId)){
            echo json_encode(array('msg'=>'Scheme deleted.','status'=>200));
        } else {
            echo json_encode(array('msg'=>'Scheme not exist.','status'=>500));
        }
    }
}