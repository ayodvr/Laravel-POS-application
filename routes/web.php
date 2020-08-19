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

 
// Route::get('/calendar',function (){
// return view('calendar');
// });

Route::get('/', function (){
    return view('auth/login');
});

Auth::routes();


Route ::group(['middleware'=>'auth'],function(){

    Route::get('/staff_dashboard', 'StaffController@staff_dashboard')->name('staffs.staff_dashboard');
    Route::get('/staffs/trashed', 'StaffController@trashed')->name('staffs.trashed');
    Route::get('/staffs/kill/{id}', 'StaffController@kill')->name('staffs.kill');
    Route::get('/staffs/restore/{id}', 'StaffController@restore')->name('staffs.restore');
    Route::resource('/staffs',"StaffController");
});

Route ::group(['middleware'=>'auth'],function(){

    Route::get('/dashboard',"AdminProfileController@admin_dashboard")->name('dashboard');
    Route::get('/index',"AdminProfileController@index")->name('index');
    Route::get('/adminprofile/create',"AdminProfileController@create")->name('create');
    Route::get('/adminprofile/{id}/edit',"AdminProfileController@edit")->name('edit');
    Route::get('/adminprofile/{id}',"AdminProfileController@show")->name('show');
    Route::post('/adminprofile/store',"AdminProfileController@store")->name('store');
    Route::post('/adminprofile/{id}/update',"AdminProfileController@update")->name('update');
    Route::get('/adminprofile/{id}/destroy',"AdminProfileController@destroy")->name('destroy');
    Route::get('/register_2',"NewUserController@create")->name('register_2');
    Route::post('/store',"NewUserController@user_store")->name('user_store');
    Route::post('/checkemail','NewUserController@checkEmail');      
});

Route::get('/home', 'HomeController@index')->name('home');

