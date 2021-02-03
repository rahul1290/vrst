<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function login($data){
        // $this->db->select('*');
        // $result = $this->db->get_where('users',array())->result_array();
        // return $result;
    }

    function register($data){
        $this->db->insert('users',$data);
        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function setotp($userId,$otp){
        $this->db->where('user_id',$userId);
        $this->db->update('users',array('activation_code'=>$otp));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function activate_user($data){
        $this->db->trans_begin();

        $this->db->select('*');
        $this->db->get_where('users',array('user_id'=>$data['user_id'],'contact_no'=>$data['contactno'],'activation_code'=>$data['otp'],'status'=>0))->result_array();
        
        if($this->db->affected_rows() == 1){
            $this->db->where('user_id',$data['user_id']);
            $this->db->update('users',array('activation_code'=>null,'status'=>1));
        } else {
            return false;
        }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }
        else {
            $this->db->trans_commit();
            $this->db->select('user_id,user_name,contact_no,email,state_id');
            $result = $this->db->get_where('users',array('user_id'=>$data['user_id'],'status'=>1))->result_array();
            return $result[0];
        }
    }
}