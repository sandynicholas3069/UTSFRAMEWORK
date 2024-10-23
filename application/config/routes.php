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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home/index';

$route['barang'] = 'barang/index'; // Menampilkan daftar barang
$route['barang/add'] = 'barang/create'; // Menampilkan form tambah barang
$route['barang/edit/(:any)'] = 'barang/update/$1'; // Menampilkan form edit barang berdasarkan ID
$route['barang/delete/(:any)'] = 'barang/delete/$1'; // Menghapus barang berdasarkan ID
$route['barang/search'] = 'barang/search'; // Fitur pencarian barang berdasarkan SKU/nama/kategori
$route['barang/filter'] = 'barang/filter_by_price'; // Filter barang berdasarkan range harga

$route['kategori'] = 'kategori/index'; // Menampilkan daftar kategori barang
$route['kategori/add'] = 'kategori/create'; // Menampilkan form tambah kategori
$route['kategori/edit/(:any)'] = 'kategori/update/$1'; // Menampilkan form edit kategori berdasarkan ID
$route['kategori/delete/(:any)'] = 'kategori/delete/$1'; // Menghapus kategori berdasarkan ID

$route['penjualan'] = 'penjualan/index'; // Menampilkan daftar penjualan
$route['penjualan/add'] = 'penjualan/create'; // Menampilkan form tambah penjualan
$route['penjualan/edit/(:any)'] = 'penjualan/update/$1'; // Menampilkan form edit penjualan berdasarkan ID
$route['penjualan/delete/(:any)'] = 'penjualan/delete/$1'; // Menghapus penjualan berdasarkan ID

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
