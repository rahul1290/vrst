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
$route['generate-otp'] = 'api/auth/generate_otp_login'; 
$route['login-otp'] = 'api/auth/login_with_otp';
$route['registration-otp'] = 'api/auth/otp_after_registration';
$route['registration'] = 'api/auth/register';
$route['activate'] = 'api/auth/activate_user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
