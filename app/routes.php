<?php
// home routes
Route::get('/' , 'HomeController@showLogin');
Route::post('/auth' , 'SessionController@auth');
Route::get('/logout' , 'SessionController@logout');

Route::group(array('prefix' => 'home' , 'before' => 'auth') , function(){
	Route::get('/' , 'SessionController@authrole');
});

// route admin

Route::group(array('prefix' => 'admin' , 'before' => 'auth.admin') , function(){
	Route::get('/' , 'AdminController@dashboard');
	Route::resource('/users', 'UserController', array('except' => array('show', 'create', 'destroy')));
	// method destroy user(id)
	Route::get('/users/{id}/delete', 'UserController@destroy');
	Route::resource('/bantek', 'BantekController', array('except' => array('show', 'create', 'destroy')));
	// method destroy bantek(id)
	Route::get('/bantek/{id}/delete', 'BantekController@destroy');
	Route::resource('/mitra', 'MitraController', array('except' => array('show', 'create', 'destroy')));
	// method destroy mitra(id)
	Route::get('/mitra/{id}/delete', 'MitraController@destroy');
	Route::resource('/signature', 'SignatureController', array('except' => array('show', 'create', 'destroy')));
	// method destroy signature(id)
	Route::get('/signature/{id}/delete', 'SignatureController@destroy');
	Route::resource('/lokasikerja', 'LokasiController', array('except' => array('show', 'create', 'destroy')));
	// method destroy lokasi(id)
	Route::get('/lokasikerja/{id}/delete', 'LokasiController@destroy');
});

// template surat
Route::group(array('prefix'=>'surat'), function(){
	Route::get('/oss_bantek', function(){
		return View::make('templatesurat.oss_bantek');
	});
});
