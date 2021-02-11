<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Auth';
//============WEB=============================//
$route['login'] = 'Auth/login';
$route['distributor'] = 'Distributor';
//============API=============================//
$route['get-allDistributor'] = 'api/Distributor';
$route['get-allDistributor/(:num)'] = 'api/Distributor/$1';
$route['api/login'] = 'api/auth/login';
$route['api/generate-otp'] = 'api/auth/generate_otp_login'; 
$route['api/login-otp'] = 'api/auth/login_with_otp';
$route['api/registration-otp'] = 'api/auth/otp_after_registration';
$route['api/registration'] = 'api/auth/register';
$route['activate'] = 'api/auth/activate_user';

$route['api/get-states'] = 'api/Utility_ctrl/state';
$route['api/get-distributors'] = 'api/Utility_ctrl/distributors';
$route['api/get-cropList'] = 'api/Utility_ctrl/crop';
$route['api/get-cropvariety'] = 'api/Utility_ctrl/crop_variety';
$route['api/get-bill'] = 'api/Utility_ctrl/bill_detail';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
