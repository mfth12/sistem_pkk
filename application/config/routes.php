<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/////////////////////////////////////////////////////
////////////////PEMBATAS SAJA////////////////////////
/////////////////////////////////////////////////////
$route['superadmin'] = 'superadmin/overview';
// $route['perangkatdesa'] = 'perangkatdesa/overview';
