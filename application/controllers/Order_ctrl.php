<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_ctrl extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Auth_model','Order_model'));
		if(!$this->my_library->is_login()){
			redirect('Auth/login');
		} 
    }

    function index(){
        $data = array();
        $data['orders'] = $this->Order_model->orderList();
        $data['header'] = $this->load->view('common/header','',true);
        $data['topheader'] = $this->load->view('common/topheader','',true);
        $data['sidebar_nav'] = $this->load->view('common/sidebar_nav','',true);
        $data['mainBody'] = $this->load->view('order/order',$data,true);
        $data['footer'] = $this->load->view('common/footer','',true);
        $this->load->view('common/layout',$data);
    }
    
    
    function orderDetail($orderId){
       $this->db->select('bd.*,c.CropName,cv.ProductName');
       $this->db->join('crop c','c.CropId = bd.crop');
       $this->db->join('crop_variety cv','cv.ProductId = bd.crop_variety');
       $result['order_detail'] = $this->db->get_where('bill_detail bd',array('bd.bill_id'=>$orderId,'bd.status'=>1))->result_array();
	   
	   
		$this->db->SELECT('b.bill_id,b.bill_image,b.bill_image,b.bill_status,b.created_at,b.bill_no,u.user_name,u.contact_no,u.alternet_no,u.email,b.verified_by_role,b.verified_by,b.status,ste.state_name');
		$this->db->from('bill b');
		$this->db->join('users u','u.user_id = b.created_by and u.status = 1');
		$this->db->JOIN('state ste','ste.state_code = u.state_id and ste.status = 1');
		$this->db->WHERE(array('b.transection_type' => 'purchase','b.status' => 1,'b.bill_id'=>$orderId));
		$result['order_info'] =  $this->db->get()->result_array();
	   
       if(count($result)>0){
           echo json_encode(array('data'=>$result,'status'=>200));
       } else {
           echo json_encode(array('status'=>500));
       }
    }
	
	function history(){
		$data = array();
        $data['orders'] = $this->Order_model->orderListHistory();
        $data['header'] = $this->load->view('common/header','',true);
        $data['topheader'] = $this->load->view('common/topheader','',true);
        $data['sidebar_nav'] = $this->load->view('common/sidebar_nav','',true);
        $data['mainBody'] = $this->load->view('order/order_history',$data,true);
        $data['footer'] = $this->load->view('common/footer','',true);
        $this->load->view('common/layout',$data);
	}
	
	
	function order_edit($orderId =null){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			$this->db->select('bd.*,c.CropName,cv.ProductName');
			$this->db->join('crop c','c.CropId = bd.crop');
			$this->db->join('crop_variety cv','cv.ProductId = bd.crop_variety');
			$data['orders'] = $this->db->get_where('bill_detail bd',array('bd.bill_id'=>$orderId,'bd.status'=>1))->result_array();
			
			
			$this->db->SELECT('b.bill_id,b.bill_image,b.bill_image,b.bill_status,b.created_at,b.bill_no,u.user_name,u.contact_no,u.alternet_no,u.email,b.verified_by_role,b.verified_by,b.status,ste.state_name');
			$this->db->from('bill b');
			$this->db->join('users u','u.user_id = b.created_by and u.status = 1');
			$this->db->JOIN('state ste','ste.state_code = u.state_id and ste.status = 1');
			$this->db->WHERE(array('b.transection_type' => 'purchase','b.status' => 1,'b.bill_id'=>$orderId));
			$data['order_detail'] =  $this->db->get()->result_array();
			
		
			$data['crops'] = $this->db->get('crop')->result_array();
			$data['variety'] = $this->db->get('crop_variety')->result_array();
			
			$data['header'] = $this->load->view('common/header','',true);
			$data['topheader'] = $this->load->view('common/topheader','',true);
			$data['sidebar_nav'] = $this->load->view('common/sidebar_nav','',true);
			$data['mainBody'] = $this->load->view('order/order_edit',$data,true);
			$data['footer'] = $this->load->view('common/footer','',true);
			$this->load->view('common/layout',$data);
		} else {
			$orderId = $this->input->post('orderId');
			$entries = $this->input->post('entries');
			
			$data = array();
			foreach($entries as $entry){
				$temp = array();
				$temp['crop'] = $entry['crop'];
				$temp['crop_variety'] = $entry['crop_variety'];
				$temp['qty'] = $entry['qty'];
				$temp['unit'] = $entry['unit'];
				$temp['bill_id'] = $orderId;	
				$temp['status'] = 1;
				$data[] = $temp;
			}
			
			$this->db->trans_begin();
			$this->db->where('bill_id',$orderId);
			$this->db->delete('bill_detail');
			
			$this->db->insert_batch('bill_detail',$data);
			
			if($this->session->userdata('user_type') == 'admin'){
			    $role = null;
			} else if($this->session->userdata('user_type') == 'distributor'){
			    $role = '1';
			} else {
			    $role = '3';
			}
			
			$this->db->where('bill_id',$orderId);
			$this->db->update('bill',array(
				'verified_by_role' => $role,
				'verified_by' => $this->session->userdata('user_id'),
				'verified_at' => date('Y-m-d H:i:s'),
				'bill_status' => 'sended',
			));
			
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				echo json_encode(array('msg'=>'something worng.','status'=>500));
			}
			else {
				$this->db->trans_commit();
				echo json_encode(array('msg'=>'You successfully verified the purchase order.','status'=>200));
			}
		}
	}
	
	function returnOrder($orderId=null){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$this->db->select('bd.*,c.CropName,cv.ProductName');
			$this->db->join('crop c','c.CropId = bd.crop');
			$this->db->join('crop_variety cv','cv.ProductId = bd.crop_variety');
			$data['orders'] = $this->db->get_where('bill_detail bd',array('bd.bill_id'=>$orderId,'bd.status'=>1))->result_array();
			
			
			$this->db->SELECT('b.bill_id,b.bill_image,b.bill_image,b.bill_status,b.created_at,b.bill_no,u.user_name,u.contact_no,u.alternet_no,u.email,b.verified_by_role,b.verified_by,b.status,ste.state_name');
			$this->db->from('bill b');
			$this->db->join('users u','u.user_id = b.created_by and u.status = 1');
			$this->db->JOIN('state ste','ste.state_code = u.state_id and ste.status = 1');
			$this->db->WHERE(array('b.transection_type' => 'purchase','b.status' => 1,'b.bill_id'=>$orderId));
			$data['order_detail'] =  $this->db->get()->result_array();
			
		
			$data['crops'] = $this->db->get('crop')->result_array();
			$data['variety'] = $this->db->get('crop_variety')->result_array();
			
			$data['header'] = $this->load->view('common/header','',true);
			$data['topheader'] = $this->load->view('common/topheader','',true);
			$data['sidebar_nav'] = $this->load->view('common/sidebar_nav','',true);
			$data['mainBody'] = $this->load->view('order/order_return',$data,true);
			$data['footer'] = $this->load->view('common/footer','',true);
			$this->load->view('common/layout',$data);
		} else {
			$orderId = $this->input->post('orderId');
			$entries = $this->input->post('entries');
			
			$data = array();
			foreach($entries as $entry){
				$temp = array();
				$temp['crop'] = $entry['crop'];
				$temp['crop_variety'] = $entry['crop_variety'];
				$temp['qty'] = $entry['qty'];
				$temp['unit'] = $entry['unit'];
				$temp['bill_id'] = $orderId;	
				$temp['return_qty'] = $entry['return_qty'];
				$temp['status'] = 1;
				$data[] = $temp;
			}
			
			$this->db->trans_begin();
			$this->db->where('bill_id',$orderId);
			$this->db->delete('bill_detail');
			
			$this->db->insert_batch('bill_detail',$data);
			
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				echo json_encode(array('msg'=>'something worng.','status'=>500));
			}
			else {
				$this->db->trans_commit();
				echo json_encode(array('msg'=>'You successfully verified the purchase order.','status'=>200));
			}
		}
	}
	
}