<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Auth';
//============WEB=============================//
$route['login'] = 'Auth/login';
$route['signup'] = 'Auth/signup';
$route['distributor'] = 'Distributor';
$route['Admin'] = 'Admin_ctrl';
$route['Orders'] = 'Order_ctrl';
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
$route['api/get-distributors/(:any)'] = 'api/Utility_ctrl/distributors/$1';
$route['api/get-cropList'] = 'api/Utility_ctrl/crop';
$route['api/get-cropvariety'] = 'api/Utility_ctrl/crop_variety/';
$route['api/get-cropvariety/(:num)'] = 'api/Utility_ctrl/crop_variety/$1';
$route['api/get-bill'] = 'api/Utility_ctrl/bill_detail';

$route['api/all-scheme'] = 'api/Scheme_ctrl/all';
$route['api/all-scheme/(:any)'] = 'api/Scheme_ctrl/all/$1';
$route['api/scheme-detail/(:num)'] = 'api/Scheme_ctrl/schemeDetail/$1';

$route['api/my-orders-crop'] = 'api/Purchase_ctrl/myPurchasedCrop';
$route['api/my-orders-cropvariety/(:num)'] = 'api/Purchase_ctrl/myPurchasedCropVariety/$1';
$route['api/get-distributor/(:num)/(:num)'] = 'api/Purchase_ctrl/get_crop_distributor/$1/$2';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
