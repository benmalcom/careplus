<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('front.welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

///////////////////////////////////////////////////////////////Auth///////////////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'/api'],function(){
    Route::post('/register','Api\AuthController@register');
    Route::post('/login','Api\AuthController@login');
    Route::post('/v-code','Api\AuthController@postVerificationCode');
    Route::post('/v-code/resend','Api\AuthController@resendVerificationCode');
});



Route::get('/auth/v-code','Auth\AuthController@getVerificationCode');
Route::post('/auth/v-code','Auth\AuthController@postVerificationCode');
Route::get('/auth/resend-v-code','Auth\AuthController@resendVerificationCode');


///////////////////////////////////////////////////////////////////////App routes///////////////////////////////////////////////////////////////
Route::get('/user/profile','User\ProfileController@getProfile');
Route::post('/user/profile','User\ProfileController@postProfile');

Route::get('/user/settings','User\SettingsController@getSettings');

Route::get('/user/accounts','User\AccountsController@getAccounts');


Route::get('/journals/create','JournalController@getCreate');
Route::post('/journals/create','JournalController@postCreate');


Route::get('/medications','MedicationsController@getIndex');
Route::get('/medications/add','MedicationsController@getAddMedication');

Route::get('/contacts','ContactsController@getIndex');
Route::get('/contacts/add','ContactsController@getAddContact');

Route::get('/notes','NotesController@getIndex');
Route::get('/notes/add','NotesController@getAddNote');



Route::get('/todos','TodosController@getIndex');

Route::get('/uploads','PhotosAndFilesController@getIndex');
Route::get('/uploads/new','PhotosAndFilesController@getAddUpload');

Route::get('/calendar-events','CalendarController@getIndex');