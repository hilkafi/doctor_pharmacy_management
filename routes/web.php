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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/region', 'RegionController');
Route::post('/region/search', 'RegionController@search');
//district as area in new version
Route::resource('/area', 'DistrictController');
Route::post('/area/search', 'DistrictController@search');
//teritory as area in old version
Route::resource('/teritory', 'TeritoryController');
Route::post('/teritory/list_district', 'TeritoryController@list_district');
Route::post('/teritory/list_area', 'TeritoryController@list_area');
Route::post('/teritory/list_market', 'TeritoryController@list_market');
Route::post('/teritory/search', 'TeritoryController@search');

Route::resource('/market', 'MarketController');
Route::post('/market/search', 'MarketController@search');

//consulting center related route
Route::resource('/consulting_center', 'ConsultingCenterController');
Route::post('/consulting_center/search', 'ConsultingCenterController@search');

//hospital related routes
Route::resource('/hospital', 'HospitalController');
Route::post('/hospital/search', 'HospitalController@search');

//Doctor related Route
Route::resource('/doctor', 'DoctorController');
Route::post('/doctor/search', 'DoctorController@search');
Route::get('/doctor/{id}/visit', 'DoctorController@visit_view');
Route::post('/doctor/visit/{id}', 'DoctorController@visit_confirm');
Route::get('doctor/visit/log', 'DoctorController@visit_log');
Route::get('doctor/visit/{id}/details', 'DoctorController@visited_doctor_details');

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