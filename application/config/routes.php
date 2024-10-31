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
$route['default_controller'] = 'home';

$route['items'] = 'barang/index'; // Menampilkan daftar barang
$route['add_items'] = 'barang/create'; // Menampilkan form tambah barang
$route['save_items'] = 'barang/store'; // Menyimpan data barang ke dalam database
$route['edit_items/(:any)'] = 'barang/edit/$1'; // Menampilkan form edit barang berdasarkan ID
$route['update_items/(:any)'] = 'barang/update/$1'; // Memperbarui data barang berdasarkan ID
$route['delete_items/(:any)'] = 'barang/delete/$1'; // Menghapus data barang berdasarkan ID
$route['search_items'] = 'barang/search'; // Melakukan pencarian berdasarkan SKU/Nama/Kategori
$route['filter_items'] = 'barang/filter'; // Melakukan filter berdasarkan range harga

$route['categories'] = 'kategori/index'; // Menampilkan daftar kategori
$route['add_categories'] = 'kategori/create'; // Menampilkan form tambah kategori
$route['save_categories'] = 'kategori/store'; // Menyimpan data kategori ke dalam database
$route['edit_categories/(:any)'] = 'kategori/edit/$1'; // Menampilkan form edit kategori berdasarkan ID
$route['update_categories/(:any)'] = 'kategori/update/$1'; // Memperbarui data kategori berdasarkan ID
$route['delete_categories/(:any)'] = 'kategori/delete/$1'; // Menghapus data kategori berdasarkan ID

$route['transactions'] = 'penjualan/index'; // Menampilkan daftar penjualan
$route['add_transactions'] = 'penjualan/create'; // Menampilkan form tambah penjualan
$route['save_transactions'] = 'penjualan/store'; // Menyimpan data penjualan ke dalam database
$route['edit_transactions/(:any)'] = 'penjualan/edit/$1'; // Menampilkan form edit penjualan berdasarkan ID
$route['update_transactions/(:any)'] = 'penjualan/update/$1'; // Memperbarui data penjualan berdasarkan ID
$route['delete_transactions/(:any)'] = 'penjualan/delete/$1'; // Menghapus data penjualan berdasarkan ID

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
