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
    
    function distributors_get($stateId){
        $this->db->select('d.DealerId,d.DealerName,mh.HqId,s.state_id,s.state_code,s.state_name');
		$this->db->join('master_headquater mh','mh.StateId = s.state_id AND mh.status = 1');
		$this->db->join('distributor d','d.HqId = mh.HqId');
		$result = $this->db->get_where('state s',array('s.state_code'=>$stateId))->result_array();
		if(count($result)>0){
			$this->response($result,200);	
		}
    }

    function crop_get(){
        $this->db->select('*');
		$result['crops'] = $this->db->get_where('crop',array('status'=>1))->result_array();

        if(count($result)>0){
            $this->response($result,200);
        } else {
            $this->response('No record found.',500);
        }
    }

    function crop_variety_get($cropid = null){
		if($cropid == null){
			$this->db->select('*');
			$result = $this->db->get_where('crop_variety',array('status'=>1))->result_array();
		} else {
			$this->db->select('*');
			$result['varieties'] = $this->db->get_where('crop_variety',array('CropId'=>$cropid,'status'=>1))->result_array();
		}
        if(count($result)>0){
            $this->response($result,200);
        } else {
            $this->response('No record found.',500);
        }
    }
    
    /*
    function claim_scheme_get(){
        select sd.*,t2.crop,
        (case
            WHEN t2.qty >= from_qty && sd.to_qty = 'AB' then 'claim'
            WHEN t2.qty >= sd.from_qty && t2.qty > sd.to_qty then 'passed'
            when t2.qty >= sd.from_qty && t2.qty <= sd.to_qty then 'claim'
            ELSE 'next to close'
            end) as status
            from
            (select t1.*,s.scheme_id from
                (SELECT bd.crop,b.created_at,u.state_id,bd.qty,sum(bd.qty)
                    FROM users u
                    JOIN bill b on b.created_by = u.user_id
                    JOIN bill_detail bd on bd.bill_id = b.bill_id
                    where u.user_id = 15
                    GROUP by bd.crop
                    ) as t1
                JOIN scheme s on s.crop_id = t1.crop and s.state_code = t1.state_id
                and (t1.created_at between s.from_date AND s.to_date)
                ) as t2
                join scheme_detail sd on sd.scheme_id = t2.scheme_id
    } 
    */

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
