<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    
    function login($data){
        if($data['user_type'] == 'distributor'){
            $sql = "select * from distributor where 
            (DealerEmail = '".$data['identity']."' OR DealerCont = '".$data['identity']."' OR DealerCont2 = '".$data['identity']."') AND password = '".$data['password']."'";
            $result = $this->db->query($sql)->result_array();
            
            if(count($result)>0){
                return $result;
            } else {
                return $result;
            }
        } 
		else if($data['user_type'] == 'admin'){
            if($data['identity'] == 'admin@vrst.com' && $data['password'] = 'vrst@vrst'){
                $result[0] = array(
                       'DealerId'=> '999999',
                        'DealerName' => 'admin',
                        'DealerCont' => '9770866241',
                        'DealerSts' => 'A',
                        'user_type' => 'admin'
                );
            }
            if(count($result)>0){
                return $result;
            } else {
                return false;
            }
        } 
		else {
			$sql = "select * from sale_executive where 
            EmpId = '".$data['identity']."' AND password = '".$data['password']."'";
            $result = $this->db->query($sql)->result_array();
            if(count($result)>0){
				$sessionData[0] = array(
									'DealerId' => $result[0]['EmpId'],
									'DealerName' => $result[0]['Fname'],
									'DealerCont' => '9999999999',
									'DealerSts' => 'A',
									'user_type' => 'Sales Agent'
								);
                return $sessionData;
            } else {
                return $result;
            }
		}
    }
}