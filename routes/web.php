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
Route::get('index', function () {
    return view('welcome');
});
// loginuser
Route::get('/', function () {
    return view('client/login');
});

Route::post('loginuser','homecontroller@login');

Route::get('userlogout','homecontroller@logout');
//logoutadmin

Route::get('logout','admincontroler@logout');

//-------------

Route::post('singupcontroler','homecontroller@singup');

Route::get('/home','homecontroller@home');

Route::get('datsan','homecontroller@getsp');

Route::get('gettheodc','homecontroller@seach');
//tet
// Route::get('tet','homecontroller@tett');
// Route::get('tettt/{id}','homecontroller@tettt');
//tet

Route::get('chitiet','homecontroller@xldatsan');

Route::get('them','homecontroller@themtinhtrang');
//dat lick
Route::get('confimbook','homecontroller@confimdat');
// login
//huy dat
Route::get('deleteddatsan/{id}/{stt}','homecontroller@deleteddatsan');

Route::get('/loginadmin',function(){
    return view('index');
});

Route::post('logincontroler','logincontroler@checklogin')->name('logincontroler');

Route::get('profile','homecontroller@showprifile');

//admin
Route::get('lisnhacc','admincontroler@listnhacc');

Route::get('editnhacc','admincontroler@viewedit');

Route::post('editncc','admincontroler@editncc');

Route::get('insertnhacc','admincontroler@viewinsertnhacc');

Route::post('insertncc','admincontroler@insertncc');

Route::get('deleted/{id}','admincontroler@deleterncc');

// Route::get('timmax','admincontroler@timmax');
//quan ly

Route::get('successlogin','admincontroler@successlogin');

Route::get('adminhuydat','admincontroler@adminhuydat');

Route::get('admidoitrangthai','admincontroler@admidoitrangthai');
