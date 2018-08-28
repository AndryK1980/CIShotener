<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//$route['auth'] = 'auth';
//$route ['auth /(:any)'] = 'index.php/auth/$1';
$route['default_controller'] = 'Short';
$route[':any'] = 'short/redirect_url';

//$route['(:any)'] = $route['default_controller']."/$1";
$route['404_override'] = '';
$route['error_404'] = '';

$route['translate_uri_dashes'] = FALSE;
