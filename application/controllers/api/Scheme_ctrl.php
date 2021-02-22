<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Scheme_ctrl extends REST_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->helper('form');
		$this->load->database();
    }
	
	function index_get(){
		echo "Scheme_ctrl";
	}
	
	function all_get($stateCode=null){
		if($stateCode == null){ 
			$this->db->select('*');
			$result = $this->db->get_where('scheme',array('status'=>1))->result_array();
		} else {
			$this->db->select('*');
			$result = $this->db->get_where('scheme',array('state_code'=>$stateCode,'status'=>1))->result_array();
		}
		
		if(count($result)>0){
			$this->response($result,200);
		} else {
			$this->response('no record found.',500);
		}
	}
	
	function schemeDetail_get($schemeId){
		$this->db->select('ROW_NUMBER() OVER (
		ORDER BY id
		) as Sno,qty as sold Qty in KG,gift as Gift');
		$result['schemeDetail'] = $this->db->get_where('scheme_detail',array('scheme_id'=>$schemeId,'status'=>1))->result_array();
		
		$this->db->select('*');
		$result['scheme'] = $this->db->get_where('scheme',array('scheme_id' => $schemeId))->result_array();
		if(count($result)>0){
			$this->response($result,200);
		} else {
			$this->response('no record found.',500);
		}
	}
}