<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    
    function orderList(){	
		if($this->session->userdata('user_type') == 'admin'){		
			$this->db->SELECT('b.bill_id,b.bill_image,b.bill_image,b.bill_status,b.created_at,b.bill_no,b.bill_status,u.user_name,b.verified_by_role,b.verified_by,b.status,ste.state_name');
			$this->db->from('bill b');
			$this->db->join('users u','u.user_id = b.created_by and u.status = 1');
			$this->db->JOIN('state ste','ste.state_code = u.state_id and ste.status = 1');
			$this->db->WHERE(array('b.transection_type' => 'purchase','b.bill_status'=>'draft','b.status' => 1));
			$this->db->order_by('b.created_at','desc');
			$result = $this->db->get()->result_array();
		}
		else if($this->session->userdata('user_type') == 'distributor'){
			$this->db->SELECT('b.bill_id,b.bill_image,b.bill_image,b.bill_status,b.bill_no,b.created_at,b.bill_status,u.user_name,b.verified_by_role,b.verified_by,b.status,ste.state_name');
			$this->db->from('bill b');
			$this->db->join('users u','u.user_id = b.created_by and u.status = 1');
			$this->db->JOIN('state ste','ste.state_code = u.state_id and ste.status = 1');
			$result = $this->db->WHERE(array('b.transection_type' => 'purchase','b.bill_status'=>'draft','distributor_id'=>$this->session->userdata('user_id'),'b.status' => 1));
			$this->db->order_by('b.created_at','desc');
			$result = $this->db->get()->result_array();
		}
		else {
		    $result = $this->db->query("SELECT `b`.`bill_id`, `b`.`bill_image`, `b`.`bill_image`, `b`.`bill_status`, `b`.`bill_no`, `b`.`created_at`, `b`.`bill_status`, `u`.`user_name`, `b`.`verified_by_role`, `b`.`verified_by`, `b`.`status`, `ste`.`state_name`
                FROM `bill` `b`
                JOIN `users` `u` ON `u`.`user_id` = `b`.`created_by` and `u`.`status` = 1
                JOIN `state` `ste` ON `ste`.`state_code` = `u`.`state_id` and `ste`.`status` = 1
                WHERE `b`.`transection_type` = 'purchase'
                AND `b`.`bill_status` = 'draft'
                AND `distributor_id` in (SELECT DealerId FROM `distributor` WHERE Terr_vc = '".$this->session->userdata('user_id')."' OR Terr_fc = '".$this->session->userdata('user_id')."')
                AND `b`.`status` = 1
                ORDER BY `b`.`created_at` DESC")->result_array();
		}
        return $result;
    } 
	
	function orderListHistory(){
		if($this->session->userdata('user_type') == 'admin'){
			$this->db->SELECT('b.bill_id,b.bill_image,b.bill_image,b.bill_status,b.created_at,b.bill_no,b.bill_status,b.verified_at,u.user_name,b.verified_by_role,b.verified_by,b.status,ste.state_name');
			$this->db->from('bill b');
			$this->db->join('users u','u.user_id = b.created_by and u.status = 1');
			$this->db->JOIN('state ste','ste.state_code = u.state_id and ste.status = 1');
			$this->db->WHERE(array('b.transection_type' => 'purchase','b.bill_status'=>'sended','b.status' => 1));
			$this->db->order_by('b.created_at','desc');
			$result = $this->db->get()->result_array();
		}
		else if($this->session->userdata('user_type') == 'distributor'){
			$this->db->SELECT('b.bill_id,b.bill_image,b.bill_image,b.bill_status,b.created_at,b.bill_no,b.bill_status,b.verified_at,u.user_name,b.verified_by_role,b.verified_by,b.status,ste.state_name');
			$this->db->from('bill b');
			$this->db->join('users u','u.user_id = b.created_by and u.status = 1');
			$this->db->JOIN('state ste','ste.state_code = u.state_id and ste.status = 1');
			$this->db->WHERE(array('b.transection_type' => 'purchase','b.distributor_id'=>$this->session->userdata('user_id'),'b.bill_status'=>'sended','b.status' => 1));
			$this->db->order_by('b.created_at','desc');
			$result = $this->db->get()->result_array();
		} else {
		    $result = $this->db->query("SELECT `b`.`bill_id`, `b`.`bill_image`, `b`.`bill_image`, `b`.`bill_status`, `b`.`created_at`, `b`.`bill_no`, `b`.`bill_status`, `b`.`verified_at`, `u`.`user_name`, `b`.`verified_by_role`, `b`.`verified_by`, `b`.`status`, `ste`.`state_name`
		    FROM `bill` `b`
		    JOIN `users` `u` ON `u`.`user_id` = `b`.`created_by` and `u`.`status` = 1
		    JOIN `state` `ste` ON `ste`.`state_code` = `u`.`state_id` and `ste`.`status` = 1
		    WHERE `b`.`transection_type` = 'purchase'
		        AND `b`.`distributor_id`  in (SELECT DealerId FROM `distributor` WHERE Terr_vc = '".$this->session->userdata('user_id')."' OR Terr_fc = '".$this->session->userdata('user_id')."')
		    AND `b`.`bill_status` = 'sended'
		    AND `b`.`status` = 1
		    ORDER BY `b`.`created_at` DESC")->result_array();
		}
		return $result;
	}
    
    function distributors(){
        $this->db->select('*');
        $result = $this->db->get('distributor')->result_array();
        return $result;
    }
    
    function sale_executive(){
        $this->db->select('*');
        $result = $this->db->get('sale_executive')->result_array();
        return $result;
    }
}