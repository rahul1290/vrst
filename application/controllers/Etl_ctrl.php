<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etl_ctrl extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Auth_model'));
    }

    function get_states(){
        $x = json_decode(file_get_contents('https://www.vnrseeds.co.in/hrims/RcdDetails?action=Details&val=State',true),true);
        
        if(count($x['State_list']) > 0){
            $data = array();

            foreach($x['State_list'] as $row) {
                $temp = array();
                $temp['state_name'] = $row['State'];
                $temp['state_code'] = $row['StateCode'];
                if($row['Status'] == 'A'){
                    $temp['status'] = 1;
                } else {
                    $temp['status'] = 0;
                }
                array_push($data,$temp);
            }

            $this->db->truncate('state');
            $this->db->insert_batch('state',$data);
        }
    }

    function get_headquarter(){
        $x = json_decode(file_get_contents('https://www.vnrseeds.co.in/hrims/RcdDetails?action=Details&val=Headquarter',true),true);
        if(count($x['Headquarter_list']) > 0){
            $data = array();

            foreach($x['Headquarter_list'] as $row) {
                $temp = array();
                $temp['HqId'] = $row['HqId'];
                $temp['HqName'] = $row['HqName'];
                $temp['StateId'] = $row['StateId'];
                $temp['status'] = 1;
                array_push($data,$temp);
            }

            $this->db->truncate('master_headquater');
            $this->db->insert_batch('master_headquater',$data);
        }
    }
}