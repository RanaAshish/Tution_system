<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/Dashboard';
$route['admin/profile'] = 'admin/Dashboard/manage_profile';
$route['admin/checkpassword'] = 'admin/Dashboard/checkPassword';
$route['admin/changepassword'] = 'admin/Dashboard/change_password';
$route['admin/tutions'] = 'admin/tution/manage_tution';
$route['admin/tutions/(:any)'] = 'admin/tution/manage_tution/$1';
$route['admin/api/tutions/(:any)'] = 'admin/tution/manage_tution/$1';
$route['admin/tutions/(:any)/(:num)'] = 'admin/tution/manage_tution/$1/$2';
$route['admin/tutions/(:any)/(:num)/(:num)'] = 'admin/tution/manage_tution/$1/$2/$3';
$route['tution'] = 'tution/Branch';
$route['tution/profile'] = 'Dashboard/manage_profile';
$route['tution/checkpassword'] = 'Dashboard/checkPassword';
$route['tution/changepassword'] = 'Dashboard/change_password';
$route['tution/add'] = 'tution/Branch/add';
$route['tution/branch/(:num)'] = 'tution/Classes/index/$1';

$route['404'] = 'logout/page_not_found';
$route['403'] = 'logout/forbidden';

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
