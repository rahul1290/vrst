<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Distributor extends REST_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->helper('form');
		$this->load->database();
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
