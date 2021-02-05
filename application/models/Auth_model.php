<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    
    function login($data){
        if($data['user_type'] == 'distributor'){
            $sql = "select * from distributor where 
            (DealerEmail = '".$data['identity']."' OR DealerCont = '".$data['identity']."' OR DealerCont2 = '".$data['identity']."') AND password = '".$data['password']."' AND DealerSts = 'A' ";
            $result = $this->db->query($sql)->result_array();
            if(count($result)>0){
                return $result;
            } else {
                return false;
            }
        }
    }
}