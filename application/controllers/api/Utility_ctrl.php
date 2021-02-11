<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Utility_ctrl extends REST_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->model(array('api/Auth_model'));
    }

    function state_get(){
        $this->db->select('state_id,state_name,state_code');
        $this->db->order_by('state_code','ASC');
        $result = $this->db->get_where('state',array('status'=>1))->result_array();
        
        if(count($result)>0){
            // $temp[0] = array('state_id'=>'0','state_name'=>'Select State','state_code'=>'0');
            // $finalResult = array_merge($temp,$result);
            $this->response($result,200);
        } else {
            $this->response('no record found.',500);   
        }
    }
    
    function distributors_get(){
        $this->db->select('DealerId,DealerName');
        $result = $this->db->get_where('distributor',array('DealerSts'=>'A'))->result_array();
        if(count($result)>0){
            // $temp[0] = array('DealerId'=>'0','DealerName'=>'Select Distributors');
            // $finalResult = array_merge($temp,$result);
            $this->response($result,200);
        } else {
            $this->response('no record found.',500);
        }
    }

    function crop_get(){
        $result = array(
            array('crop_id'=>'0','crop_name'=>'Crop','crop_code'=>'0'),
            array('crop_id'=>'1','crop_name'=>'chilli','crop_code'=>'chi'),
            array('crop_id'=>'2','crop_name'=>'potato','crop_code'=>'pot'),
            array('crop_id'=>'3','crop_name'=>'tomato','crop_code'=>'tom'),
        );

        if(count($result)>0){
            $this->response($result,200);
        } else {
            $this->response('No record found.',500);
        }
    }

    function crop_variety_get(){
        $result = array(
            array('crop_variety_id'=>'0','variety_name'=>'variety','variety_code'=>'0'),
            array('crop_variety_id'=>'1','variety_name'=>'chilli','variety_code'=>'chi'),
            array('crop_variety_id'=>'2','variety_name'=>'potato','variety_code'=>'pot'),
            array('crop_variety_id'=>'3','variety_name'=>'tomato','variety_code'=>'tom'),
        );

        if(count($result)>0){
            $this->response($result,200);
        } else {
            $this->response('No record found.',500);
        }
    }

    function bill_detail_get($billId=null){
        $result = array(
            array('bill_id'=>'1','bill_no'=>'1001'),
            array('bill_id'=>'2','bill_no'=>'1002'),
            array('bill_id'=>'3','bill_no'=>'1003'),
        );

        if(count($result)>0){
            $this->response($result,200);
        } else {
            $this->response('No record found.',500);
        }
    }
}
