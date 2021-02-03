<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';

$route['get-allDistributor'] = 'api/Distributor';
$route['get-allDistributor/(:num)'] = 'api/Distributor/$1';

$route['registration'] = 'api/auth/register';
$route['activate'] = 'api/auth/activate_user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
