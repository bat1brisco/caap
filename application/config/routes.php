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

$route['partslisting/index'] = 'partslisting/index';
$route['partslisting/create'] = 'partslisting/create';
$route['partslisting/(:any)'] = 'partslisting/view/$1';
$route['partslisting'] = 'partslisting/index';

$route['carslisting/index'] = 'carslisting/index';
$route['carslisting/create'] = 'carslisting/create';
$route['carslisting/update'] = 'carslisting/update';
$route['carslisting/(:any)'] = 'carslisting/view/$1';
$route['carslisting'] = 'carslisting/index';


// $route['chat/index'] = 'chat/index';
$route['chat'] = 'chat/index';
$route['chat/messages/(:any)'] = 'MessageController/index/$1';


$route['acceptrejectuser/index'] = 'acceptrejectuser/index';
$route['acceptrejectuser'] = 'acceptrejectuser/index';

$route['acceptrejectcar/index'] = 'acceptrejectcar/index';
$route['acceptrejectcar'] = 'acceptrejectcar/index';

$route['acceptrejectpart/index'] = 'acceptrejectpart/index';
$route['acceptrejectpart'] = 'acceptrejectpart/index';

$route['admindashboard/index'] = 'admindashboard/index';
$route['admindashboard'] = 'admindashboard/index';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
