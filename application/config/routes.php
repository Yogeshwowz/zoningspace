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
$route['default_controller'] = 'home';
$route['pricing'] = 'home/pricing';
//$route['searching'] = 'advancedsearch/searching';
$route['search-view-data'] = 'advancedsearch/searchViewData';
$route['view-single-record/(:any)'] = "advancedsearch/viewSingleRecord/$1";
//$route['404_override'] = '';
$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;
$route['logout'] = 'login/logout';
$route['dashboard'] = 'dashboard/dashboard';
$route['my-saved-search'] = 'dashboard/mySaveSearch';
$route['members'] = 'dashboard/Member';
$route['buy-search'] = "dashboard/buySearchRecords";
$route['purchased-data-list/(:any)'] = "dashboard/purchasedDataList/$1";
$route['view-purchased-record/(:any)'] = "dashboard/viewPurchasedDataSingleRecord/$1";
$route['payment-method/(:any)'] = "payment/paymentMethod/$1";

$route['save-search'] = "dashboard/SaveSearch";

$route['buy-connect'] = "dashboard/buyConnect";
$route['payment/buy'] = "payment/buy";
$route['our-data'] = 'home/OurData';
$route['verify-account/(:any)'] = 'login/verifyAccount/$1';
// End here







$route['administrator'] = 'administrator/loginMe';
$route['administrator/dashboard'] = 'administrator/dashboard';
$route['administrator/logout'] = 'administrator/logout';
$route['administrator/visit-user'] = 'administrator/visitUser';
$route['administrator/data-submitted'] = 'administrator/dataSubmitted';


$route['signin'] = "login/signin";
$route['signup'] = "login";

$route['stripePost']['post'] = "stripe/stripePost";
$route['payment/(:any)'] = "payment/paymentmodule/$1";
$route['stripePayment']['post'] = "stripe/stripePayment";

$route['user-dashboard'] = "login/dashboard";
$route['search-saved'] = "dashboard/searchSaved";
$route['view-save-search'] = "dashboard/viewSaveSearch";
$route['success'] = "dashboard/success";
$route['cart'] = "dashboard/cart";


$route['view-data'] = 'advancedsearch/searchingMap';



$route['single-searching/(:any)/(:any)'] = "advancedsearch/singleSearching/$1/$1";
