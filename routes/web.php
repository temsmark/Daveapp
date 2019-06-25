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
    Route::get('manage/users/{id}', 'UserController@destroy');
});
//all
Route::get('claim/claim','ClaimController@index');
Route::get('claim/recent','ClaimController@recent');
Route::get('claim/{id}/more/{user_id}','ClaimController@more');


Route::group(['middleware' => ['user']], function () {
    Route::get('/user','UserPageController@index');

});
Route::group(['middleware' => 'finance'], function () {

    Route::get('/finance','FinanceController@index');
    Route::get('finance/claim','FinanceController@create');
});

Route::group(['middleware' => ['chairman']], function () {
    Route::get('chairman','ChairmanController@index');
});