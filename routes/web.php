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

Route::get('logout',function (){
    Session::flush();
    Auth::logout();
    return  Redirect::to('login')->with('message',array('type'=>'success','text'=> 'you have successfully logged out of the application'));

});

Auth::routes(['register'=>false,'reset'=>false]);

 Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/dashboard', function () {
//    return view('admin.dashboard');
//});

//admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard','AdminController@index');
    Route::get('manage/users','UserController@index');
    Route::get('manage/add','UserController@create');
    Route::post('manage/store','UserController@store');
    Route::get('manage/users/{id}', 'UserController@destroy');
    Route::get('edit/{id}','UserController@edit');
    Route::patch('admin/patch/{id}','UserController@adminupdate');

});
//all
Route::get('claim/claim','ClaimController@create');
Route::patch('user/patch/{id}','UserController@update');
Route::get('user/profile','UserController@show');
Route::post('claim/store','ClaimController@store');
Route::get('invoice/more/{id}','InvoiceController@show');
Route::get('claim/recent','ClaimController@recent');
Route::get('claim/{id}/more/{user_id}','ClaimController@more');
Route::get('document/pdf/{id}','DocumentController@index');

//USER
Route::group(['middleware' => ['user']], function () {
    Route::get('/user','UserPageController@index');

});
//FINANCE
Route::group(['middleware' => 'finance'], function () {

    Route::get('/finance','FinanceController@index');
    Route::get('finance/claim','FinanceController@create');
    Route::post('finance/message','FinanceController@store');
    Route::get('finance/voucher/more/{id}','InvoiceController@showmore');
    Route::get('finance/more/{id}','FinanceController@more');
    Route::get('finance/approve/{id}','FinanceController@approve');
    Route::get('finance/voucher','FinanceController@voucher');

});
//CHAIRMAN
Route::group(['middleware' => ['chairman']], function () {
    Route::get('chairman','ChairmanController@index');
    Route::get('chairman/claim','ChairmanController@claim');
    Route::post('chairman/message','ChairmanController@store');
    Route::get('chairman/approve/{id}','ChairmanController@approve');
    Route::get('chairman/more/{id}','ChairmanController@more');
});
//DIRECTOR
Route::group(['middleware'=>['director']], function () {
    Route::get('director','DirectorController@index');
    Route::get('director/claim','DirectorController@claim');
    Route::post('director/message','DirectorController@store');
    Route::get('director/more/{id}','DirectorController@more');
    Route::get('director/approve/{id}','DirectorController@approve');

});

Route::get('dean','DeanController@index');


//Dean
Route::get('dean','DeanController@index');
Route::get('dean/approve/{id}','DeanController@approve');
Route::post('dean/message','DeanController@store');
Route::get('dean/more/{id}','DeanController@more');
Route::get('dean/all','DeanController@all');


Route::get('/any', function () {

    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();


});
Route::get('master','InvoiceController@master');
