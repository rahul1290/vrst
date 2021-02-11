<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function login($data){
        if($data['user_type'] == 'Distributor'){

        }
        else if($data['user_type'] == 'Retailer'){
            $sql = "select user_id,user_name,contact_no,email,state_id,lastlogin from users where (contact_no = '".$data['contact']."' or alternet_no = '".$data['contact']."') and password = '".$data['password']."' and status = 1";
            $result = $this->db->query($sql)->result_array();
            
            if(count($result)>0){
                $this->db->where('user_id',$result[0]['user_id']);
                $this->db->update('users',array('lastlogin'=>date('Y-m-d H:i:s')));
                return $result[0];
            } else {
                return false;
            }
        } else if($data['user_type'] == 'Sales Agent'){

        }
    }

    function generate_otp_login($data){
        $sql = "select * from users where (contact_no = '".$data['contact_no']."' OR alternet_no = '".$data['contact_no']."') and status = 1";
        $result = $this->db->query($sql)->result_array();
        if(count($result)>0){
            $result['otp'] =  $this->my_library->generateNumericOTP();
            $this->db->where(array('user_id'=> $result[0]['user_id'],'status'=>1));
            $this->db->update('users',array(
                    'activation_code' => $result['otp'])
            );
            $this->my_library->sendOTP($data['contact_no'],$result['otp']);
            return true;
        } else {
            return false;
        }
    }

    function login_with_otp($data) {
        $sql = "select * from users where (contact_no = '".$data['contact']."' OR alternet_no = '".$data['contact']."') and activation_code = '".$data['otp']."' and status = 1";
        $result = $this->db->query($sql)->result_array();
        if(count($result)>0){
            $sql = "select user_id,user_name,contact_no,email,state_id,lastlogin from users where user_id = '".$result[0]['user_id']."'";
            $result = $this->db->query($sql)->result_array();

            if(count($result)>0){
                $this->db->where('user_id',$result[0]['user_id']);
                $this->db->update('users',array('activation_code'=>null,'lastlogin'=>date('Y-m-d H:i:s')));
                return $result[0];
            }
        } else {
            return false;
        }   
    }

    function otp_after_registration($data) {
        $sql = "select * from users where (contact_no = '".$data['contact']."' OR alternet_no = '".$data['contact']."') and activation_code = '".$data['otp']."'";
        $result = $this->db->query($sql)->result_array();
        if(count($result)>0){
            $sql = "select user_id,user_name,contact_no,email,state_id,lastlogin from users where user_id = '".$result[0]['user_id']."'";
            $result = $this->db->query($sql)->result_array();

            if(count($result)>0){
                $this->db->where('user_id',$result[0]['user_id']);
                $this->db->update('users',array('activation_code'=>null,'status'=>1,'lastlogin'=>date('Y-m-d H:i:s')));
                return $result[0];
            }
        } else {
            return false;
        }   
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