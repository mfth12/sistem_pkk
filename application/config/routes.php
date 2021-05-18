<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/////////////////////////////////////////////////////
////////////////PEMBATAS SAJA////////////////////////
/////////////////////////////////////////////////////
$route['admin'] = 'admin/overview';
$route['berita/(:num)'] = 'berita';
// $route['perangkatdesa'] = 'perangkatdesa/overview';
