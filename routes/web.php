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

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

// Route::get('/payment-order', function (){
//     return view('sales.payments');
// });


Route ::group(['middleware'=>'auth'],function(){
    Route::get('changeStatus/{id}','StaffController@changeStatus')->name('changeStatus'); 
    Route::get('/staff_dashboard', 'StaffController@staff_dashboard')->name('staffs.staff_dashboard');
    Route::get('/staffs/trashed', 'StaffController@trashed')->name('staffs.trashed');
    Route::get('/staffs/kill/{id}', 'StaffController@kill')->name('staffs.kill');
    Route::get('/staffs/restore/{id}', 'StaffController@restore')->name('staffs.restore');
    Route::resource('/staffs',"StaffController");
});

Route ::group(['middleware'=>'auth'],function(){

    Route::get('/dashboard',"AdminProfileController@admin_dashboard")->name('dashboard');
    Route::get('/adminprofile/create',"AdminProfileController@create")->name('create');
    Route::get('/adminprofile/{id}/edit',"AdminProfileController@edit")->name('edit');
    Route::get('/adminprofile/{id}',"AdminProfileController@show")->name('show');
    Route::post('/adminprofile/store',"AdminProfileController@store")->name('store');
    Route::post('/adminprofile/{id}/update',"AdminProfileController@update")->name('update');
    Route::get('/adminprofile/{id}/destroy',"AdminProfileController@destroy")->name('destroy');
    Route::get('/register_2',"NewUserController@create")->name('register_2');
    Route::post('/store',"NewUserController@user_store")->name('user_store');     
});
Route::resource('/sales',"SalesController");
Route::resource('/receiving',"ReceivingController");
Route::resource('/products',"ProductsController");
Route::resource('/customers',"CustomersController");
Route::resource('/suppliers',"SuppliersController");
Route::resource('/categories',"CategoryController");
Route::resource('/inventories',"InventoryController");
Route::resource('/accounts',"AccountController");
Route::resource('/transactions',"TransactionsController");
Route::resource('/expense',"ExpenseController");
Route::resource('/expense_cat',"ExpenseCategoryController");
Route::get('/pdf',"CustomersController@Customer_PDF")->name('customer_pdf');
Route::resource('api/saletemp','SaleApiController');
Route::resource('api/receivingtemp','ReceivingApiController');
Route::resource('api/prodtemp','ProductsApiController');
Route::resource('/receivingsreport', 'ReceivingsReportController');
Route::resource('/salesreport', 'SaleReportController');

Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/home', 'HomeController@index')->name('home');

