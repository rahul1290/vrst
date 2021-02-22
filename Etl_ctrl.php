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
                $temp['state_id'] = $row['StateId'];
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
    
    function get_sale_executive(){
        $x = json_decode(file_get_contents('https://vnrseeds.co.in/hrims/api/Retailer/retailerapi.php?value=salexelist_r',true),true);
        
        if(count($x['SalExecutive_list']) > 0){
            $data = array();
            
            foreach($x['SalExecutive_list'] as $row) {
                $temp = array();
                $temp['EmpId'] = $row['EmpId'];
                $temp['Fname'] = $row['Fname'];
                $temp['Sname'] = $row['Sname'];
                $temp['Lname'] = $row['Lname'];
                array_push($data,$temp);
            }
            
            $this->db->truncate('sale_executive');
            $this->db->insert_batch('sale_executive',$data);
        }
    }
	
	function get_crop(){
        $x = json_decode(file_get_contents('https://vnrseeds.co.in/hrims/api/Retailer/retailerapi.php?value=crop_r',true),true);
        
        if(count($x['Crop_list']) > 0){
            $data = array();

            foreach($x['Crop_list'] as $row) {
                $temp = array();
                $temp['CropId'] = $row['CropId'];
                $temp['CropName'] = $row['CropName'];
                $temp['CropCode'] = $row['CropCode'];
				$temp['GroupId'] = $row['GroupId'];
                array_push($data,$temp);
            }

            $this->db->truncate('crop');
            $this->db->insert_batch('crop',$data);
        }
    }
	
	function get_cropVariety(){
        $x = json_decode(file_get_contents('https://vnrseeds.co.in/hrims/api/Retailer/retailerapi.php?value=product_r',true),true);
        
        if(count($x['Product_list']) > 0){
            $data = array();

            foreach($x['Product_list'] as $row) {
                $temp = array();
                $temp['ProductId'] = $row['ProductId'];
                $temp['ProductName'] = $row['ProductName'];
                $temp['CropId'] = $row['CropId'];
				$temp['TypeId'] = $row['TypeId'];
                array_push($data,$temp);
            }

            $this->db->truncate('crop_variety');
            $this->db->insert_batch('crop_variety',$data);
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

    function get_distributor(){
        $x = json_decode(file_get_contents('https://vnrseeds.co.in/hrims/api/Retailer/retailerapi.php?value=dealerlist_r',true),true);
        if(count($x['Dealer_list']) > 0){
            $data = array();

            foreach($x['Dealer_list'] as $row) {
                $temp = array();
                $temp['DealerId'] = $row['DealerId'];
                $temp['DealerName'] = $row['DealerName'];
                $temp['DealerAdd'] = $row['DealerAdd'];
                $temp['DealerCity'] = $row['DealerCity'];
                $temp['DealerPerson'] = $row['DealerPerson'];
                $temp['DealerEmail'] = $row['DealerEmail'];
                $temp['password'] = null;
                $temp['DealerCont'] = $row['DealerCont'];
                $temp['DealerCont2'] = null;
                $temp['HqId'] = $row['HqId'];
                $temp['Hq_vc'] = $row['Hq_vc'];
                $temp['Hq_fc'] = $row['Hq_fc'];
                $temp['Terr_vc'] = $row['Terr_vc'];
                $temp['Terr_fc'] = $row['Terr_fc'];
                $temp['DealerSts'] = null;
                $temp['CompanyId'] = null;
                $temp['CreatedBy'] = null;
                $temp['CreatedDate'] = date('Y-m-d H:i:s');
                array_push($data,$temp);

                $this->db->truncate('distributor');
                $this->db->insert_batch('distributor',$data);
            }
        }
    }
}