<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Auth_model'));
    }

    function index(){
        $data = array();
        $data['header'] = $this->load->view('common/header','',true);
        $data['topheader'] = $this->load->view('common/topheader','',true);
        $data['sidebar_nav'] = $this->load->view('common/sidebar_nav','',true);
        $data['mainBody'] = $this->load->view('tasks-list',$data,true);
        $data['footer'] = $this->load->view('common/footer','',true);
        $this->load->view('common/layout',$data);
    }
}