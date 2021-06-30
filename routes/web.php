<?php

use Illuminate\Support\Facades\Route;

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
    return view('employee/login');
});

Route::get('/admin_login', function () {
    return view('admin/login');
});

Route::post('validateLogin/employee', 'App\Http\Controllers\LoginController@employee');
Route::post('validateLogin/admin', 'App\Http\Controllers\LoginController@admin');
Route::get('logout', function () {
	session()->flush();

	return redirect('/');
  
});
Route::get('admin_logout', function () {
	session()->flush();

	return redirect('/admin_login');
  
});

Route::group(['middleware'=>['EmpAuth']],function(){
	Route::get('employee/dashboard','App\Http\Controllers\EmployeeController@index');
	Route::get('employee/experience','App\Http\Controllers\EmployeeController@experience');
	Route::get('employee/family','App\Http\Controllers\EmployeeController@family');
	Route::get('employee/edit', 'App\Http\Controllers\EmployeeController@edit');
	Route::post('employee/update', 'App\Http\Controllers\EmployeeController@update');
	Route::view('employee/add_experience', 'employee/add_experience');
	Route::view('employee/add_member', 'employee/add_member');
	Route::post('employee/save_experience', 'App\Http\Controllers\EmployeeController@save_experience');
	Route::post('employee/save_member', 'App\Http\Controllers\EmployeeController@save_member');
	Route::get('employee/delete_experience/{id}', 'App\Http\Controllers\EmployeeController@delete_experience');
	Route::get('employee/delete_member/{id}', 'App\Http\Controllers\EmployeeController@delete_member');






});
Route::group(['middleware'=>['AdminAuth']],function(){
	Route::get('admin/dashboard','App\Http\Controllers\AdminController@index');
	Route::get('admin/employees','App\Http\Controllers\AdminController@employees');
	Route::view('/admin/addemployee', 'admin/addemployee');
	Route::post('admin/saveEmployee','App\Http\Controllers\AdminController@store');
	Route::get('admin/employee/{id}','App\Http\Controllers\AdminController@show');
	Route::get('admin/edit/{id}','App\Http\Controllers\AdminController@edit');
	Route::get('admin/delete/{id}','App\Http\Controllers\AdminController@destroy');
	Route::post('admin/updateEmployee','App\Http\Controllers\AdminController@update');
	Route::get('admin/export/', 'App\Http\Controllers\AdminController@export');
	Route::get('admin/export_excel/', 'App\Http\Controllers\UsersController@export');
	Route::view('admin/import/', 'admin/import');
	Route::get('admin/exportpdf/{id}', 'App\Http\Controllers\pdfController@export');
	Route::post('admin/upload_file', 'App\Http\Controllers\AdminController@upload_file');


	
	
 

});



