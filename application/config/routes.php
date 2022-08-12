<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
// $route['default_controller'] = 'Beranda_c';
// $route['Home'] = 'Beranda_c';
// $route['Our-Products'] = 'Layanan_c';
// $route['Our-Products/(:any)'] = 'Layanan_c/product/$1';
// $route['About-us'] = 'Tentang_c';
// $route['Contacts'] = 'Kontak_c';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;
// $route['Photo-Gallery'] = 'Galeri_c';
// $route['Photo-Gallery/(:any)'] = 'Galeri_c/detail/$1';
// $route['Our-Product/(:any)/(:any)'] = 'Layanan_c/detail/$2';

$route['default_controller'] = 'c_beranda';
$route['beranda'] = 'c_beranda';
$route['tentang_kami'] = 'c_tentang';
$route['materi'] = 'c_materi';
$route['importir'] = 'c_importir';
$route['importir'] = 'c_importir';