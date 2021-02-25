<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scheme_model extends CI_Model {
    
    function SchemeList($schemeId = null){
        if($schemeId == null){
            $this->db->select('sch.*,s.state_name,c.CropName');
            $this->db->join('state s','s.state_code = sch.state_code AND s.status = 1');
			$this->db->join('crop c','c.CropId = sch.crop_id AND c.status = 1');
			$this->db->order_by('sch.from_date','desc');
            $result = $this->db->get_where('scheme sch',array('sch.status'=>1))->result_array();
        } else {
            $this->db->select('sch.*,s.state_name');
            $this->db->join('state s','s.state_code = sch.state_code AND s.status = 1');
            $this->db->order_by('sch.from_date','desc');
            $result = $this->db->get_where('scheme sch',array('sch.scheme_id'=>$schemeId,'sch.status'=>1))->result_array();
        }
        return $result;
    }
    
    function schemeGiftDetail($schemeId){
        $this->db->select('from_qty,to_qty,gift');
        $result = $this->db->get_where('scheme_detail',array('scheme_id'=>$schemeId,'status'=>1))->result_array();
        return $result;
    }

    function delete($schemeId){
        $this->db->where('scheme_id',$schemeId);
        $this->db->delete('scheme');
        return true;
    }
	
	function crop_list(){
		$this->db->select('*');
		return $result = $this->db->get_where('crop',array('status'=>1))->result_array();
	}
	
	function cropVariety($cropId){
		$this->db->select('*');
		return $reult = $this->db->get_where('crop_variety',array('CropId'=>$cropId,'status'=>1))->result_array();
	}
}