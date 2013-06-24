<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$route['default_controller'] = "map";
// $route['(.*)'] = "map/index/$1";
$route[''] = 'map/index';
$route['(.*)'] = "/$1";

