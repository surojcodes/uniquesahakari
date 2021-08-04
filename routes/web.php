<?php

use Illuminate\Support\Facades\Route;
use App\Notice;

//basic pages routes
Route::get('/', 'NavigationController@index');
Route::get('/contact', 'NavigationController@contact');

//About Routes
Route::get('/about/bod', 'NavigationController@bod');
Route::get('/about/introduction', 'NavigationController@introduction');
Route::get('/about/membership', 'NavigationController@membership');
Route::get('/about/mvo', 'NavigationController@mvo');
Route::get('/about/principle', 'NavigationController@principle');

// Services Routes
Route::get('/services/loanScheme', 'NavigationController@loanScheme');
Route::get('/services/mobileBanking', 'NavigationController@mobileBanking');
Route::get('/services/other', 'NavigationController@other');
Route::get('/services/remittance', 'NavigationController@remittance');
Route::get('/services/savingScheme', 'NavigationController@savingScheme');
Route::get('/services/smsBanking', 'NavigationController@smsBanking');

// Gallery
Route::get('/gallery', 'NavigationController@gallery');
Route::get('/gallery-images/{slug}', 'NavigationController@galleryImages');

//notices
Route::get('/notices', 'NavigationController@notices');
Route::get('/view-notice/{slug}', 'NavigationController@notice');
Route::get('/get-front-notice',function(){
  $notice = Notice::where('set_front',1)->first();
  return Response::json($notice);
});

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
Route::get('/admin/slider','SliderController@index')->name('sliders.index');
Route::post('/admin/slider','SliderController@store')->name('sliders.store');
Route::delete('admin/slider/{id}','SliderController@destroy')->name('sliders.delete');

//Notice Admin Routes
Route::get('/admin/notice','NoticeController@index')->name('notices.index');
Route::post('/admin/notice','NoticeController@store')->name('notices.store');
Route::get('admin/notice/{slug}','NoticeController@edit')->name('notices.edit');
Route::put('admin/notice/{slug}','NoticeController@update')->name('notices.update');
Route::delete('admin/notice/{slug}','NoticeController@destroy')->name('notices.delete');

Route::put('/admin/set-front/{slug}','NoticeController@setFront');
Route::put('/admin/remove-front/{slug}','NoticeController@removeFront');

//Download Admin Routes
Route::get('/admin/download','DownloadController@index')->name('downloads.index');
Route::post('/admin/download','DownloadController@store')->name('downloads.store');
Route::delete('admin/download/{id}','DownloadController@destroy')->name('downloads.delete');

// Account Admin Routes
Route::post('/admin/add-account','AccountController@store')->name('application-store');
Route::get('/admin/view-application/{app_id}','AccountController@view')->name('application-detail');
Route::get('/admin/edit-application/{app_id}','AccountController@edit')->name('application-edit');
Route::get('/admin/print-application/{app_id}','AccountController@print')->name('application-print');
Route::delete('/admin/delete-application/{app_id}','AccountController@delete')->name('application-delete');
Route::put('/admin/update-application/{app_id}','AccountController@update')->name('application-update');


// Loan admin links
Route::get('/admin/loan','LoanController@viewLoans');
Route::get('/admin/view-loan/{loan_id}','LoanController@view')->name('loan-detail');
Route::get('/admin/print-loan/{loan_id}','LoanController@print')->name('loan-print');
Route::delete('/admin/delete-loan/{loan_id}','LoanController@delete')->name('loan-delete');
Route::post('/admin/add-loan','LoanController@store')->name('loan-store');

// About Admin routes
Route::get('/admin/bod', 'AboutController@bod');
Route::put('/admin/update-bod','AboutController@updateBod')->name('update.bod');

Route::get('/admin/introduction', 'AboutController@introduction');
Route::put('/admin/update-introduction','AboutController@updateIntroduction')->name('update.introduction');

Route::get('/admin/membership', 'AboutController@membership');
Route::put('/admin/update-membership','AboutController@updateMembership')->name('update.membership');

Route::get('/admin/mvo', 'AboutController@mvo');
Route::put('/admin/update-mvo','AboutController@updateMvo')->name('update.mvo');

Route::get('/admin/principle', 'AboutController@principle');
Route::put('/admin/update-principle','AboutController@updatePrinciple')->name('update.principle');


// Services Admin Routes
Route::get('/admin/loanScheme', 'ServicesController@loanScheme');
Route::put('/admin/update-loan','ServicesController@updateLoan')->name('update.loan');

Route::get('/admin/mobileBanking', 'ServicesController@mobileBanking');
Route::put('/admin/update-mobile','ServicesController@updateMobile')->name('update.mobile');

Route::get('/admin/other', 'ServicesController@other');
Route::put('/admin/update-other','ServicesController@updateOther')->name('update.other');

Route::get('/admin/remittance', 'ServicesController@remittance');
Route::put('/admin/update-remittance','ServicesController@updateRemittance')->name('update.remittance');

Route::get('/admin/savingScheme', 'ServicesController@savingScheme');
Route::put('/admin/update-saving','ServicesController@updateSaving')->name('update.saving');

Route::get('/admin/smsBanking', 'ServicesController@smsBanking');
Route::put('/admin/update-sms','ServicesController@updateSms')->name('update.sms');

// BOD Links
Route::get('/admin/bod','BodController@index')->name('bod.index');
Route::post('/admin/bod','BodController@store')->name('bod.store');
Route::get('admin/bod/{id}','BodController@edit')->name('bod.edit');
Route::put('admin/bod/{id}','BodController@update')->name('bod.update');
Route::delete('admin/bod/{id}','BodController@destroy')->name('bod.delete');

// Gallery and image Controller
Route::get('/admin/gallery','GalleryController@index')->name('gallery.index');
Route::post('/admin/gallery','GalleryController@store')->name('gallery.store');
Route::get('/admin/gallery/{id}','GalleryController@show')->name('gallery.show');
Route::put('/admin/gallery/{id}','GalleryController@update')->name('gallery.update');
Route::delete('/admin/gallery/{id}','GalleryController@destroy')->name('gallery.destroy');

Route::post('/admin/add-gallery-image/{id}','GalleryController@addImages')->name('galleryimage.store');
Route::resource('image','ImagesController', array('only' => array('destroy')));

// Settings Admin
Route::get('/admin/information','SettingsController@information');
Route::put('/admin/update-information','SettingsController@updateInformation')->name('update.info');

Route::get('/admin/links','SettingsController@links');