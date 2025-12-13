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
$route['default_controller'] = 'AuthController/form_login_admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Hook
$route['webhook'] = 'HookController/index';
$route['get-questions']['GET'] = 'HookController/questions';

$route['login-admin']['GET'] = 'AuthController/form_login_admin';
$route['login-admin']['POST'] = 'AuthController/login_admin';
$route['logout-admin']['POST'] = 'AuthController/logout';
$route['add-member']['POST'] = 'AuthController/add_member';
$route['check-member']['POST'] = 'AuthController/check_member';

$route['dashboard']['GET'] = 'MainController/dashboard';
$route['reply-message']['GET'] = 'MainController/reply_message';
$route['manage-admin']['GET'] = 'MainController/manage_admin';
$route['manage-member']['GET'] = 'MainController/manage_member';
$route['manage-renew']['GET'] = 'MainController/manage_renew';
$route['manage-broadcast']['GET'] = 'MainController/manage_broadcast';
$route['manage-interested']['GET'] = 'MainController/manage_interested';

// Reply
$route['fetch-answer']['GET'] = 'ReplyController/fetch_answer';
$route['get-question-answer']['POST'] = 'ReplyController/get_question_answer';
$route['add-keyword']['POST'] = 'ReplyController/add_keyword';
$route['del-keyword']['POST'] = 'ReplyController/del_keyword';
$route['add-reply-message']['POST'] = 'ReplyController/add_reply_message';
$route['get-reply-message']['POST'] = 'ReplyController/get_reply_message';
$route['update-reply-message']['POST'] = 'ReplyController/update_reply_message';
$route['del-reply-message']['POST'] = 'ReplyController/del_reply_message';
$route['update-img-reply-message']['POST'] = 'ReplyController/update_img_reply_message';

// Liff
$route['register']['GET'] = 'LiffController/register';
$route['renew']['GET'] = 'LiffController/renew';
$route['profile']['GET'] = 'LiffController/profile';
$route['product/(:any)']['GET'] = 'LiffController/product/$1';
$route['add-renew']['POST'] = 'LiffController/add_renew';
$route['payment']['GET'] = 'LiffController/payment';
$route['info']['GET'] = 'LiffController/info';
$route['interested']['GET'] = 'LiffController/interested';
$route['add-interested']['POST'] = 'LiffController/add_interested';



// Admin
$route['fetch-admin']['GET'] = 'AdminController/fetch_admin';
$route['add-admin']['POST'] = 'AdminController/add_admin';
$route['get-admin']['POST'] = 'AdminController/get_admin';
$route['update-status-admin']['POST'] = 'AdminController/update_status_admin';
$route['reset-password-admin']['POST'] = 'AdminController/reset_password_admin';


// Member
$route['fetch-member']['GET'] = 'MemberController/fetch_member';
$route['get-member-info-by-uid']['POST'] = 'MemberController/get_member_info_by_uid';
$route['get-insurance-info-by-uid']['POST'] = 'MemberController/get_insurance_info_by_uid';
$route['get-member-info']['POST'] = 'MemberController/get_member_info';
$route['search-member']['POST'] = 'MemberController/search_member';
$route['del-member']['POST'] = 'MemberController/del_member';


// Renew
$route['fetch-renew']['GET'] = 'LiffController/fetch_renew';
$route['search-renew']['POST'] = 'RenewController/search_renew';
$route['fetch-interested']['GET'] = 'LiffController/fetch_interested';
$route['search-interested']['POST'] = 'RenewController/search_interested';
$route['notify-message-interested']['POST'] = 'BroadcastController/notify_message_interested';


$route['test-broadcast/(:num)']['GET'] = 'BroadcastController/testAlertMonth/$1';
$route['broadcast']['GET'] = 'BroadcastController/getAlertMonth';


$route['broadcast-installments']['GET'] = 'BroadcastController/getInstallments';

// $route['broadcast_v2']['GET'] = 'BroadcastController/getAlertMonthV2';
// $route['broadcast_transport']['GET'] = 'BroadcastController/getAlertMonthTransport';
// $route['broadcast_accident']['GET'] = 'BroadcastController/getAlertMonthAccident';
// $route['broadcast_home']['GET'] = 'BroadcastController/getAlertMonthHome';
// $route['broadcast-logistic']['GET'] = 'BroadcastController/getAlertLogistic';

// 
$route['broadcast_v2/(:num)']['GET'] = 'BroadcastController/getAlertMonthV2/$1';
$route['broadcast_transport/(:num)']['GET'] = 'BroadcastController/getAlertMonthTransport/$1';
$route['broadcast_accident/(:num)']['GET'] = 'BroadcastController/getAlertMonthAccident/$1';
$route['broadcast_home/(:num)']['GET'] = 'BroadcastController/getAlertMonthHome/$1';

// $route['broadcast-logistic/(:num)']['GET'] = 'BroadcastController/getAlertLogistic/$1';

$route['broadcast-car-check']['GET'] = 'BroadcastController/getCheckCar';





// $route['test-broadcast']['GET'] = 'BroadcastController/index';


$route['manual']['GET'] = 'MainController/manual';