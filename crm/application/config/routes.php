<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'User';
//$route['contact-us'] = 'Merchant/contact_us';
//$route['about-us'] = 'Merchant/about_us';
//$route['plan'] = 'Merchant/plan';
//$route['user_login'] = 'Merchant/login';
//$route['register'] = 'Merchant/register';
//$route['forget-password'] = 'Merchant/forget_password';
// $route['buy-service'] = 'Social/buy_service';
// $route[':num'] = 'Social/buy_service/$1/$2';
// $route['([a-zA-Z0-9]+)'] = 'Social/buy_service/$1/$2';
// $route['why-tsc'] = 'Namah/why_tsc';
// $route['team'] = 'Namah/team';
// $route['academics'] = 'Namah/academics';
// $route['iit-jee'] = 'Namah/iit_jee';
// $route['neet-aiims'] = 'Namah/neet_aiims';
// $route['achievers'] = 'Namah/achievers';
// $route['testimonials'] = 'Namah/testimonials';
// $route['gallery'] = 'Namah/gallery';
//$route['(:any)'] = 'Namah/index/$1';
//['(:num)'] = 'Namah/index/$1';
//$route['([a-zA-Z0-9]+)'] = "Namah/index/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
