<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_library{
    
    protected $CI;
    
    public function __construct(){
        $this->CI =& get_instance();
    }

    function is_login(){
        if($this->CI->session->userdata('user_id')){
			
            return true;
        } else {
			
            return false;
        }
    }
    
    function generateNumericOTP() {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= 4; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
        return $result;
    }


    function sendOTP($mobile,$otp){
    //    return true;
            $username = "developerinvnr@gmail.com";
            $hash = "736397e8c20036f67d304d4d8ee316720a93c9d9d83046cbb453303194086efa";
            $test = "0";
            $sender = "RECVNR";
            
            $message = "Your Mobile Verification OTP is: $otp";
            $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$mobile."&test=".$test;
            $ch = curl_init('http://api.textlocal.in/send/?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
           // print_r($result);
            if(strpos($result,'failure')!==false)
            {
                return "failure";
            }else{
                return "success";
            }
            curl_close($ch);
    }
    
    
    function number_to_word($amount){
        $number = $amount;
        $no = round($number);
        $point = round($no - $number, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
            } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        //print_r($point);die;
        $points = ($point) ? "." . $words[$point / 10] . " " . $words[$point = $point % 10] : '';
        
        return $result . "Rupees" ;
    }
    
    
    
}
