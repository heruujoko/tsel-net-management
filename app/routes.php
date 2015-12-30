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

	Route::get('/oss/material' , 'OSSController@showmaterial');
	Route::post('/oss/material' , 'OSSController@storematerial');
	Route::get('/oss/material/{id}/details' , 'OSSController@detailmaterial');
	Route::get('/oss/material/{id}/edit' , 'OSSController@editmaterial');
	Route::post('/oss/material/{id}/update' , 'OSSController@updatematerial');
	Route::get('/oss/material/{id}/delete' , 'OSSController@deletematerial');

	Route::get('/oss/spj' , 'OSSController@showspj');
	Route::post('/oss/spj' , 'OSSController@storespj');
	Route::get('/oss/spj/{id}/details' , 'OSSController@detailspj');
	Route::get('/oss/spj/{id}/edit' , 'OSSController@editspj');
	Route::post('/oss/spj/{id}/update' , 'OSSController@updatespj');
	Route::get('/oss/spj/{id}/delete' , 'OSSController@deletespj');

	Route::resource('/fpl', 'FPLController', array('except' => array('show', 'create', 'destroy')));
	// method destroy fpl(id)
	Route::get('/fpl/{id}/delete', 'FPLController@destroy');

	Route::resource('/spph', 'SPPHController', array('except' => array('show', 'create', 'destroy')));
	// method destroy spph(id)
	Route::get('/spph/{id}/delete', 'SPPHController@destroy');

	Route::resource('/surattugas', 'SuratTugasController', array('except' => array('show', 'create', 'destroy')));
	// method destroy surattugas(id)
	Route::get('/surattugas/{id}/delete', 'SuratTugasController@destroy');

	Route::resource('/perjalanandinas', 'PerjalananDinasController', array('except' => array('show', 'create', 'destroy')));
	// method destroy perjalanandinas(id)
	Route::get('/perjalanandinas/{id}/delete', 'PerjalananDinasController@destroy');

	Route::resource('/stpd', 'STPDController', array('except' => array('show', 'create', 'destroy')));
	// method destroy STPD(id)
	Route::get('/stpd/{id}/delete', 'STPDController@destroy');
});


// template surat
Route::group(array('prefix'=>'surat'), function(){
	Route::get('/oss_bantek', function(){
		return View::make('templatesurat.oss_bantek');
	});
	Route::get('/oss_material', function(){
		return View::make('templatesurat.oss_material');
	});
	// bantek dengan biaya transport
	Route::get('/oss_bantek_2', function(){
		return View::make('templatesurat.oss_bantek_2');
	});
	Route::get('/fpl', function(){
		return View::make('templatesurat.fpl');
	});
	Route::get('/rekapan_fpl', function(){
		return View::make('templatesurat.fpl_rekapan');
	});
	Route::get('/spph', function(){
		return View::make('templatesurat.spph');
	});
	Route::get('surat_tugas', function(){
		return View::make('templatesurat.surat_tugas');
	});
	Route::get('/stpd', function(){
		return View::make('templatesurat.STPD');
	});
	Route::get('/verification', function(){
		return View::make('templatesurat.verification');
	});

});
//route ajax form

Route::post('/ajax/mastertp/create' , 'MastertpController@storefromajax');
Route::post('/ajax/shoplist/create' , 'ShoplistController@storefromajax');
Route::post('/ajax/fpl/perbaikan/create' , 'FPLPerbaikanController@storefromajax');
Route::post('/ajax/fpl/pembelian/create' , 'FPLPembelianController@storefromajax');
Route::post('/ajax/fpl/kebutuhan/create' , 'FPLKebutuhanController@storefromajax');
Route::post('/ajax/fpl/spec/create' , 'FPLSpecController@storefromajax');
Route::post('/ajax/st/activity/create' , 'STActivityController@storefromajax');
Route::post('/ajax/bantek/create' , 'BantekController@storefromajax');
Route::post('/ajax/pj/lain/create' , 'PJLainController@storefromajax');
