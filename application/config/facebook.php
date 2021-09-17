<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['facebook_app_id']              = '151890508328344';
$config['facebook_app_secret']          = '60dd250cb72622aa8ca90002e20dfc06';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'login/register';
$config['facebook_logout_redirect_url'] = 'login/logout';
$config['facebook_permissions']         = array('email,user_birthday,user_location,public_profile');
//$config['facebook_permissions']         = array('');