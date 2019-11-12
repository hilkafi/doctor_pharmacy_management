<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/region', 'RegionController');
Route::post('/region/search', 'RegionController@search');
Route::get('/region/{id}/details', 'RegionController@view_details');
Route::get('region/{id}/view_pharmacy', 'RegionController@view_pharmacy_details');
//district as area in new version
Route::resource('/area', 'DistrictController');
Route::post('/area/search', 'DistrictController@search');
Route::get('/area/{id}/details', 'DistrictController@view_details');
Route::get('area/{id}/view_pharmacy', 'DistrictController@view_pharmacy_details');
//teritory as area in old version
Route::resource('/teritory', 'TeritoryController');
Route::post('/teritory/list_district', 'TeritoryController@list_district');
Route::post('/teritory/list_area', 'TeritoryController@list_area');
Route::post('/teritory/list_market', 'TeritoryController@list_market');
Route::post('/teritory/list_consulting_center', 'TeritoryController@list_consulting_center');
Route::post('/teritory/list_hospital', 'TeritoryController@list_hospital');
Route::post('/teritory/search', 'TeritoryController@search');
Route::get('/teritory/{id}/details', 'TeritoryController@view_details');
Route::get('teritory/{id}/view_pharmacy', 'TeritoryController@view_pharmacy_details');

Route::resource('/market', 'MarketController');
Route::post('/market/search', 'MarketController@search');
Route::get('/market/{id}/details', 'MarketController@view_details');
Route::get('market/{id}/view_pharmacy', 'MarketController@view_pharmacy_details');

//consulting center related route
Route::resource('/consulting_center', 'ConsultingCenterController');
Route::post('/consulting_center/search', 'ConsultingCenterController@search');
Route::get('/consulting_center/{id}/details', 'ConsultingCenterController@view_details');

//hospital related routes
Route::resource('/hospital', 'HospitalController');
Route::post('/hospital/search', 'HospitalController@search');
Route::get('/hospital/{id}/details', 'HospitalController@view_details');
Route::get('hospital/hospitals', 'HospitalController@hospitals');
Route::get('/hospital/clinic','HospitalController@show_clinics');


//Doctor related Route
Route::resource('/doctor', 'DoctorController');
Route::post('/doctor/search', 'DoctorController@search');
Route::get('/doctor/{id}/visit', 'DoctorController@visit_view');
Route::post('/doctor/visit/{id}', 'DoctorController@visit_confirm');
Route::get('doctor/visit/log', 'DoctorController@visit_log');
Route::get('doctor/visit/{id}/details', 'DoctorController@visited_doctor_details');
Route::get('/doctor/chamber/{id}', 'DoctorController@add_chamber');
Route::post('/doctor/add_chamber', 'DoctorController@final_add_chamber');

Route::resource('/dispensary', 'DispensaryController');
Route::post('/dispensary/search', 'DispensaryController@search');
Route::get('/dispensary/{id}/visit', 'DispensaryController@visit_view');
Route::post('/dispensary/visit/{id}', 'DispensaryController@visit_confirm');


Route::resource('/clinic', 'ClinicController');
Route::post('/clinic/search', 'ClinicController@search');
Route::get('/clinic/{id}/visit', 'ClinicController@visit_view');
Route::post('/clinic/visit/{id}', 'ClinicController@visit_confirm');

Route::resource('/employee', 'EmployeeController');


//Employee Related Route
Route::get('/login/employee', 'Auth\AdminLoginController@showLoginForm');
Route::post('/login/employee', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//This is a test Route
Route::get('/employee-profile', 'AdminController@index');
Route::get('/logout', 'Auth\AdminLoginController@logout');

//User related Route
Route::resource('user', 'UserController');
