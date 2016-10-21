<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "admin";
$route['404_override'] = '';
$route['family'] = 'admin/family';
$route['register'] = 'admin/memberCreate';
$route['schema'] = 'admin/schema';
$route['plan'] = 'admin/plan';
$route['memberList'] = 'admin/memberList';
$route['view/:num'] = 'admin/memberView';
$route['memberdelete/:num'] = 'admin/memberDelete';
$route['memberdelcf/:num'] = 'admin/memberdelcf';
$route['memberedit/:num'] = 'admin/memberEdit';
$route['alert'] = 'admin/alert';
$route['subadmin'] = 'admin/subAdmin';
$route['backup'] = 'admin/backup';
$route['tariff'] = 'admin/tariff';
$route['forgetPass'] = 'auth/forgetPass';
$route['resettrue/(:any)'] = 'auth/resetPassword';






/* End of file routes.php */
/* Location: ./application/config/routes.php */