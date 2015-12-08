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
	Route::resource('/bantek', 'BantekController', array('except' => array('show', 'create')));
	Route::resource('/mitra', 'MitraController', array('except' => array('show', 'create')));
	Route::resource('/signature', 'SignatureController', array('except' => array('show', 'create')));
});
