<?php

use Illuminate\Support\Facades\Route;
use App\Notice;

//basic pages routes
Route::get('/', 'NavigationController@index');
Route::get('/about', 'NavigationController@about');
Route::get('/contact', 'NavigationController@contact');
Route::get('/loanScheme', 'NavigationController@loanScheme');
Route::get('/savingScheme', 'NavigationController@savingScheme');

Route::get('/get-front-notice',function(){
  $notice = Notice::where('set_front',1)->first();
  return Response::json($notice);
});

//notices
Route::get('/notices', 'NavigationController@notices');
Route::get('/view-notice/{slug}', 'NavigationController@notice');

//downloads
Route::get('/downloads', 'NavigationController@downloads');
Route::get('/download-item/{slug}', 'NavigationController@download');

//online-account
Route::get('/online-account', 'NavigationController@onlineAccountForm');

//loan route
Route::get('/online-loan', 'NavigationController@loanForm');


//Auth routes
Auth::routes(['register'=>false, 'request' => false, 'reset' => false]);
Route::get('/home', 'HomeController@index')->name('home');

//Slider Admin Routes
Route::get('/slider','SliderController@index')->name('sliders.index');
Route::post('/slider','SliderController@store')->name('sliders.store');
Route::delete('slider/{id}','SliderController@destroy')->name('sliders.delete');

//Notice Admin Routes
Route::get('/notice','NoticeController@index')->name('notices.index');
Route::post('/notice','NoticeController@store')->name('notices.store');
Route::get('notice/{slug}','NoticeController@edit')->name('notices.edit');
Route::put('notice/{slug}','NoticeController@update')->name('notices.update');
Route::delete('notice/{slug}','NoticeController@destroy')->name('notices.delete');

Route::put('/set-front/{slug}','NoticeController@setFront');
Route::put('/remove-front/{slug}','NoticeController@removeFront');

//Download Admin Routes
Route::get('/download','DownloadController@index')->name('downloads.index');
Route::post('/download','DownloadController@store')->name('downloads.store');
Route::delete('download/{id}','DownloadController@destroy')->name('downloads.delete');

// Account Admin Routes
Route::post('/add-account','AccountController@store')->name('application-store');
Route::get('/view-application/{app_id}','AccountController@view')->name('application-detail');
Route::get('/edit-application/{app_id}','AccountController@edit')->name('application-edit');
Route::get('/print-application/{app_id}','AccountController@print')->name('application-print');
Route::delete('/delete-application/{app_id}','AccountController@delete')->name('application-delete');
Route::put('/update-application/{app_id}','AccountController@update')->name('application-update');

//Loan admin routes
Route::post('/add-loan','LoanController@store')->name('loan-store');

