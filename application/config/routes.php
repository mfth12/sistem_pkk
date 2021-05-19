<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
////////////////WEBSITE CUSTOM ROUTES/////////////////////
$route['admin'] = 'admin/overview'; //rute halaman admin
$route['berita/kategori/(:any)'] = 'berita/kategori/$1'; //rute pagination kategori berita
$route['berita/read/(:any)'] = 'berita/read/$1'; //rute baca berita
$route['berita/(:num)'] = 'berita'; //rute pagination berita
////////////////SYSTEM CUSTOM ROUTES/////////////////////