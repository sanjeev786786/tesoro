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
$route['default_controller'] = 'LoginController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'LoginController/login';
$route['forgot'] = 'LoginController/forgot';
$route['logout'] = 'LoginController/logout';
$route['admin']=   'Admin/AdminController/index';
$route['admin/change_password']=   'Admin/ChangePassword/index';
$route['admin/client_listing']=   'Admin/Client_listingController/index';
$route['admin/delete_create']=   'Admin/Client_listingController/delete_create';
$route['admin/client_cts_listing']=   'Admin/Client_listingController/client_cts_listing';
$route['admin/delete_create']=   'Admin/Client_listingController/delete_create';
$route['admin/edit_create']='Admin/Client_listingController/edit_create';
$route['admin/add_client']=   'Admin/Client_listingController/add_client';
$route['admin/update_client']=   'Admin/Client_listingController/update_client';
$route['client']='Client_roles/ClientController/index';
$route['client/create']='Client_roles/ClientController/create';
$route['client/add_create']='Client_roles/ClientController/add_create';
$route['client/add_create_step']='Client_roles/ClientController/add_create_step';
$route['client/delete_create']='Client_roles/ClientController/delete_create';
$route['client/edit_create']='Client_roles/ClientController/edit_create';
$route['client/change_password']='Client_roles/ChangePassword/index';
$route['json/Cts']='Api/CtsController/index';