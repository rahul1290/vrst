<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Distributor extends REST_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->helper('form');
		$this->load->database();
    }

	function all_get(){
		$this->db->select('*');
		$result = $this->db->get('distributor')->result_array();
		if(count($result)>0){
			echo json_encode(array($result));
		}
	}

	function stateWise_get($stateId){
		$this->db->select('d.DealerId,d.DealerName,mh.HqId,s.state_id,s.state_code,s.state_name');
		$this->db->join('master_headquater mh','mh.StateId = s.state_id AND mh.status = 1');
		$this->db->join('distributor d','d.HqId = mh.HqId');
		$result = $this->db->get_where('state s',array('s.state_code'=>$stateId))->result_array();
		if(count($result)>0){
			$this->response($result,200);	
		}
	}

	function index_get($distributorId = null){
		if(is_null($distributorId)){
			$this->db->select('*');
			$result = $this->db->get_where('bill',array('varified_by_role'=>1))->result_array();
			echo json_encode($result);
		} else {
			$this->db->select('*');
			$result = $this->db->get_where('bill',array('varified_by_role'=>1))->result_array();
			echo json_encode($result);
		}
	}
}
