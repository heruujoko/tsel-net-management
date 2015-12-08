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
	Route::resource('/bantek', 'BantekController', array('except' => array('show', 'create', 'destroy')));
	// method destroy bantek(id)
	Route::get('/bantek/{id}/delete', 'BantekController@destroy');
	Route::resource('/mitra', 'MitraController', array('except' => array('show', 'create', 'destroy')));
	// method destroy mitra(id)
	Route::get('/mitra/{id}/delete', 'MitraController@destroy');
	Route::resource('/signature', 'SignatureController', array('except' => array('show', 'create', 'destroy')));
	// method destroy signature(id)
	Route::get('/signature/{id}/delete', 'SignatureController@destroy');
});
