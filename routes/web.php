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

Route::get('/region/{id}/details', 'RegionController@view_details');
Route::get('region/{id}/view_pharmacy', 'RegionController@view_pharmacy_details');
Route::get('region/delete/{id}', 'RegionController@delete');
Route::resource('/region', 'RegionController');
Route::post('/region/search', 'RegionController@search');

//district as area in new version
Route::get('/area/{id}/details', 'DistrictController@view_details');
Route::get('area/{id}/view_pharmacy', 'DistrictController@view_pharmacy_details');
Route::get('area/delete/{id}', 'DistrictController@delete');
Route::resource('/area', 'DistrictController');
Route::post('/area/search', 'DistrictController@search');

//teritory as area in old version
Route::get('/teritory/{id}/details', 'TeritoryController@view_details');
Route::get('teritory/{id}/view_pharmacy', 'TeritoryController@view_pharmacy_details');
Route::get('teritory/delete/{id}', 'TeritoryController@delete');
Route::resource('/teritory', 'TeritoryController');
Route::post('/teritory/list_district', 'TeritoryController@list_district');
Route::post('/teritory/list_area', 'TeritoryController@list_area');
Route::post('/teritory/list_market', 'TeritoryController@list_market');
Route::post('/teritory/list_consulting_center', 'TeritoryController@list_consulting_center');
Route::post('/teritory/list_hospital', 'TeritoryController@list_hospital');
Route::post('/teritory/search', 'TeritoryController@search');


Route::get('/market/{id}/details', 'MarketController@view_details');
Route::get('market/{id}/view_pharmacy', 'MarketController@view_pharmacy_details');
Route::get('market/delete/{id}', 'MarketController@delete');
Route::resource('/market', 'MarketController');
Route::post('/market/search', 'MarketController@search');


//consulting center related route
Route::get('/consulting_center/{id}/details', 'ConsultingCenterController@view_details');
Route::get('/consulting_center/delete/{id}', 'ConsultingCenterController@delete');
Route::get('/view_pharmacys/{id}', 'ConsultingCenterController@visit_cc_pharmacy');
Route::resource('/consulting_center', 'ConsultingCenterController');
Route::post('/consulting_center/search', 'ConsultingCenterController@search');


//hospital related routes
Route::get('/hospital/view_pharmacy/{id}', 'HospitalController@view_pharmacy');
Route::get('/hospital/{id}/details', 'HospitalController@view_details');
Route::get('/hospitals', 'HospitalController@hospitals');
Route::get('/clinics','HospitalController@show_clinics');
Route::get('/others','HospitalController@show_others');
Route::get('/institute/delete/{id}','HospitalController@delete');
Route::resource('/hospital', 'HospitalController');
Route::post('/hospital/search', 'HospitalController@search');
Route::post('/hospitals/search', 'HospitalController@hospital_search');
Route::post('/clinicsearch', 'HospitalController@clinic_search');
Route::post('/otherssearch', 'HospitalController@others_search');


//Doctor related Route
Route::get('/doctor/cover/{id}', 'DoctorController@cover');
Route::get('/doctor/uncover/{id}', 'DoctorController@uncover');
Route::get('/chamber/edit/{id}', 'DoctorController@edit_chamber');
Route::get('/chamber/delete/{id}', 'DoctorController@delete_chamber');
Route::get('/doctor/{id}/visit', 'DoctorController@visit_view');
Route::get('doctor/visit/log', 'DoctorController@visit_log');
Route::get('doctor/visit/{id}/details', 'DoctorController@visited_doctor_details');
Route::get('/doctor/chamber/{id}', 'DoctorController@add_chamber');
Route::get('/doctor/delete/{id}', 'DoctorController@delete');
Route::resource('/doctor', 'DoctorController');
Route::post('/doctor/add_chamber', 'DoctorController@final_add_chamber');
Route::post('/doctor/search', 'DoctorController@search');
Route::post('/doctor/visit/{id}', 'DoctorController@visit_confirm');
Route::post('/chamber/chamedit/{id}','DoctorController@edit_store');



//personal info related route
Route::get('/personalinfo/{id}', 'PersonalInfoController@personal_info');
Route::get('/personalinfo/show/{key}', 'PersonalInfoController@show_personal_index');
Route::get('/birthday', 'PersonalInfoController@show_birthday');
Route::get('/marriage-anniversary', 'PersonalInfoController@show_marriage_anniversary');
Route::resource('/doctorpersonalinfo', 'PersonalInfoController');
Route::post('/personalinfo/add', 'PersonalInfoController@add_personal_info');



Route::get('/dispensary/{id}/visit', 'DispensaryController@visit_view');
Route::get('/dispensary/delete/{id}', 'DispensaryController@delete');
Route::resource('/dispensary', 'DispensaryController');
Route::post('/dispensary/search', 'DispensaryController@search');
Route::post('/dispensary/visit/{id}', 'DispensaryController@visit_confirm');
Route::get('/dispensary/cover/{id}', 'DispensaryController@cover');
Route::get('/dispensary/uncover/{id}', 'DispensaryController@uncover');


//Route::resource('/clinic', 'ClinicController');
//Route::post('/clinic/search', 'ClinicController@search');
//Route::get('/clinic/{id}/visit', 'ClinicController@visit_view');
//Route::post('/clinic/visit/{id}', 'ClinicController@visit_confirm');

Route::get('/employee/delete/{id}', 'EmployeeController@delete');
Route::resource('employee', 'EmployeeController');
Route::post('employee/search', 'EmployeeController@search');


//Employee Related Route
Route::get('/login/employee', 'Auth\AdminLoginController@showLoginForm');
Route::post('/login/employee', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//This is a test Route
Route::get('/employee-profile', 'AdminController@index');
Route::get('/logout', 'Auth\AdminLoginController@logout');

//User related Route
Route::resource('user', 'UserController');
