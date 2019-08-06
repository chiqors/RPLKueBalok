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
$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/login'] = 'auth/login';

// -----------------
// KOKI
// -----------------

$route['koki'] = 'Koki_Menu/index';

$route['koki/menu'] = 'Koki_Menu/index';

$route['koki/menu/create'] = 'Koki_Menu/create';
$route['koki/menu/store'] = 'Koki_Menu/store';
$route['koki/menu/bahanbaku/create'] = 'Koki_Menu/create_menu_bahanbaku';
$route['koki/menu/bahanbaku/store'] = 'Koki_Menu/store_menu_bahanbaku';

$route['koki/menu/show/(:any)'] = 'Koki_Menu/show/$1';
$route['koki/menu/show/(:any)/create'] = 'Koki_Menu/show_create_menu_bahanbaku/$1';
$route['koki/menu/show/(:any)/store'] = 'Koki_Menu/show_store_menu_bahanbaku';

$route['koki/menu/edit/(:any)'] = 'Koki_Menu/edit/$1';
$route['koki/menu/update/(:any)'] = 'Koki_Menu/update/$1';
$route['koki/menu/destroy/(:any)'] = 'Koki_Menu/destroy/$1';

$route['koki/pesanan'] = 'Koki_Pesanan/index';
$route['koki/pesanan/confirm/(:any)/(:any)'] = 'Koki_Pesanan/show/$1/$2';

$route['koki/bahanbaku'] = 'Koki_Bahanbaku/index';
$route['koki/bahanbaku/show/(:any)'] = 'Koki_Bahanbaku/show/$1';

// -----------------
// PANTRY
// -----------------

$route['pantry'] = 'pantry_beranda/index';

$route['pantry/bahanbaku'] = 'pantry_bahanbaku/index';
$route['pantry/bahanbaku/create'] = 'pantry_bahanbaku/create';
$route['pantry/bahanbaku/store'] = 'pantry_bahanbaku/store';
$route['pantry/bahanbaku/edit/(:any)'] = 'pantry_bahanbaku/edit/$1';
$route['pantry/bahanbaku/update/(:any)'] = 'pantry_bahanbaku/update/$1';
$route['pantry/bahanbaku/destroy/(:any)'] = 'pantry_bahanbaku/destroy/$1';

$route['pantry/bahanbaku/belanja/(:any)'] = 'pantry_bahanbaku/show/$1';
$route['pantry/bahanbaku/belanja/(:any)/create'] = 'pantry_bahanbaku/create_belanja/$1';
$route['pantry/bahanbaku/belanja/(:any)/store'] = 'pantry_bahanbaku/store_belanja/$1';
