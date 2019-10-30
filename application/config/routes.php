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

//GET
$route['default_controller'] = 'URLcontroler';
$route['home'] = 'URLcontroler';
$route['produk'] = 'URLcontroler/tampilProduk';
$route['pembelian'] = 'URLcontroler/pembelian';
$route['detailBeli/(:any)'] = 'URLcontroler/detailBeli/$1';
$route['riwayatIdBeli'] = 'URLcontroler/riwayatIdBeli';
$route['insertproduk'] = 'URLcontroler/formInsertProduk';
$route['updateproduk/(:any)'] = 'URLcontroler/formUpdateProduk/$1';
$route['updatebeli/(:any)'] = 'URLcontroler/formUpdateBeli/$1';
$route['konfirmasi'] = 'URLcontroler/konfirmasi';
//POST
$route['post/insertproduk'] = 'postcontroler/insertProduk';
$route['post/cartbeli'] = 'postcontroler/cartPembelian';
$route['post/updateproduk/(:any)'] = 'postcontroler/updateProduk/$1';
$route['post/updatebeli/(:any)'] = 'postcontroler/updateBeli/$1';
$route['deleteproduk/(:any)'] = 'postcontroler/deleteProduk/$1';
$route['deletebeli/(:any)'] = 'postcontroler/deleteBeli/$1';
$route['deletecart/(:any)'] = 'postcontroler/deleteCart/$1';
$route['cetaknota/(:any)'] = 'postcontroler/cetakNota/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
