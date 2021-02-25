<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Purchase_ctrl extends REST_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->model(array('api/Auth_model'));
    }
	
	function purchaseOrder_post(){
		$is_valid_token = $this->authorization_token->validateToken();
        if(!empty($is_valid_token) && $is_valid_token['status'] === true){
			
			$filename = date('U').rand(0,1000);
			$bill = array(
				'transection_type' => 'purchase',
				'bill_no' => $this->post('billno'),
				'bill_image' => $filename.'.jpg',
				'bill_status' => 'draft',
				'distributor_id' => $this->post('distributor'),
				'created_by' => $is_valid_token['data']->id,
				'created_at' => date('Y-m-d H:i:s'),
				'status' => 1
			);
			
			
			$this->db->trans_begin();
			
			$this->db->insert('bill',$bill);
			$billId = $this->db->insert_id();
			
			$realImage = base64_decode($this->post('billimage'));
			file_put_contents('./assets/images/bills/'.$filename.'.jpg', $realImage);
			
			$enrties = json_encode($this->post('entries'),false);
			$enrties = preg_replace('~[\\\\/*?"<>|[\]]~', ' ', $enrties);
			$enrties = explode('},',$enrties);
			
			$finalarray = array();
			foreach($enrties as $entry){
				$entry = preg_replace('~[\\\\/*?"<>|{\}[\]]~',' ', $entry);
				$entry = $entry.','; 
				$x = explode(',',$entry);
				unset($x[count($x)-1]);
				
				$temp = array();
				foreach($x as $key => $value){
					$t = explode(':',$value);
					$temp[trim($t[0])] = trim($t[1]);
				}
				$finalarray[] = $temp;
			}
			 
			
			foreach($finalarray as $billDetail){
				$temp = array();
				$temp['crop'] = $billDetail['crop'];
				$temp['crop_variety'] = $billDetail['variety'];
				$temp['qty'] = $billDetail['qty'];
				$temp['return_qty'] = '0';
				$temp['unit'] = '1';
				$temp['bill_id'] = $billId;
				$temp['status'] = '1';
				$billDetails[] = $temp;
			}
			
			$this->db->insert_batch('bill_detail',$billDetails);
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				$this->response(array('msg'=>'order not submitted.'),500);
			}
			else{
				$this->db->trans_commit();
				$this->response(array('msg'=>'order submitted.'),200);
			}
			
		}
		 else {
            $message = ['status' => FALSE,'message' => $is_valid_token['message'] ];
            $this->response($message, 404);
        }
	}
	
	function my_order_get(){
		$is_valid_token = $this->authorization_token->validateToken();
        if(!empty($is_valid_token) && $is_valid_token['status'] === true){
			
			$this->db->select('b.*,d.DealerName,DATE_FORMAT(b.created_at,"%d/%m/%Y") as created_at');
			$this->db->join('distributor d','d.DealerId = b.distributor_id');
			$this->db->order_by('b.created_at','desc');
			$result = $this->db->get_where('bill b',array('b.created_by'=>$is_valid_token['data']->id,'b.status'=>1))->result_array();
			
			$this->response($result,200);
		}
		else {
            $message = ['status' => FALSE,'message' => $is_valid_token['message'] ];
            $this->response($message, 404);
        }
	}
	
	function orderDetail_get($orderId = null){
		$is_valid_token = $this->authorization_token->validateToken();
        if(!empty($is_valid_token) && $is_valid_token['status'] === true){
			
			$this->db->select('c.CropName,cv.ProductName,bd.qty');
			$this->db->join('crop c','c.CropId = bd.crop');
			$this->db->join('crop_variety cv','cv.ProductId = bd.crop_variety');
			$result['order_detail'] = $this->db->get_where('bill_detail bd',array('bd.bill_id'=>$orderId,'bd.status'=>1))->result_array();
		  
			$this->db->SELECT('b.bill_id,b.bill_image,b.distributor_id,d.DealerName,b.bill_image,b.bill_status,b.created_at,b.bill_no,u.user_name,u.contact_no,u.alternet_no,u.email,b.verified_by_role,b.verified_by,b.status,ste.state_name');
			$this->db->from('bill b');
			$this->db->join('users u','u.user_id = b.created_by and u.status = 1');
			$this->db->JOIN('state ste','ste.state_code = u.state_id and ste.status = 1');
			$this->db->join('distributor d','d.DealerId = b.distributor_id');
			$this->db->WHERE(array('b.transection_type' => 'purchase','b.status' => 1,'b.bill_id'=>$orderId));
			$result['order_info'] =  $this->db->get()->result_array();
			
			$this->response($result,200);
		}
		else {
            $message = ['status' => FALSE,'message' => $is_valid_token['message'] ];
            $this->response($message, 404);
        }		
	}
	
	function myPurchasedCrop_get(){
		$is_valid_token = $this->authorization_token->validateToken();
        if(!empty($is_valid_token) && $is_valid_token['status'] === true){
		
			$this->db->select('Distinct(bd.crop),c.CropName');
			$this->db->JOIN('bill_detail bd','bd.bill_id = b.bill_id AND bd.status = 1');
			$this->db->JOIN('crop c','c.CropId = bd.crop and c.status = 1');
			$result = $this->db->get_where('bill b',array('b.created_by'=>$is_valid_token['data']->id,'b.status'=>1))->result_array();
			if(count($result)>0){
				$this->response($result,200);
			} else {
				$this->response(array('msg'=>'no record found.',500));
			}
		} else {
            $message = ['status' => FALSE,'message' => $is_valid_token['message'] ];
            $this->response($message, 404);
        }
	}
	
	function myPurchasedCropVariety_get($cropId = null){
		$is_valid_token = $this->authorization_token->validateToken();
        if(!empty($is_valid_token) && $is_valid_token['status'] === true){
			
			$this->db->select('Distinct(bd.crop_variety),cv.ProductName');
			$this->db->JOIN('bill_detail bd','bd.bill_id = b.bill_id AND bd.status = 1');
			$this->db->JOIN('crop_variety cv','cv.ProductId = bd.crop_variety and cv.status = 1');
			$result = $this->db->get_where('bill b',array('b.created_by'=>$is_valid_token['data']->id,'bd.crop' => $cropId,'b.status'=>1))->result_array();
			
			if(count($result)>0){
				$this->response($result,200);
			} else {
				$this->resposne(array('msg'=>'No record found.','status'=>500));
			}
			
		} else {
            $message = ['status' => FALSE,'message' => $is_valid_token['message'] ];
            $this->response($message, 404);
        }
	}
	
	function get_crop_distributor_get($cropId,$varietyId){
		$is_valid_token = $this->authorization_token->validateToken();
        if(!empty($is_valid_token) && $is_valid_token['status'] === true){
			
			$this->db->select('b.bill_id,b.distributor_id,d.DealerName');
			$this->db->JOIN('bill_detail bd','bd.bill_id = b.bill_id AND bd.status = 1');
			$this->db->JOIN('crop_variety cv','cv.ProductId = bd.crop_variety and cv.status = 1');
			$this->db->JOIN('distributor d','d.DealerId = b.distributor_id');
			$result = $this->db->get_where('bill b',array('b.created_by'=>$is_valid_token['data']->id,'bd.crop_variety'=>$varietyId,'bd.crop' => $cropId,'b.status'=>1))->result_array();
			if(count($result)>0){
				$this->response($result,200);
			} else {
				$this->resposne(array('msg'=>'No record found.','status'=>500));
			}
		}
		 else {
            $message = ['status' => FALSE,'message' => $is_valid_token['message'] ];
            $this->response($message, 404);
        }
	}
	
}