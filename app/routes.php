<?php
// home routes
Route::get('/' , 'HomeController@showScreen');
Route::get('/login', 'HomeController@showLogin');
Route::post('/auth' , 'SessionController@auth');
Route::get('/logout' , 'SessionController@logout');

Route::group(array('prefix' => 'home' , 'before' => 'auth') , function(){
	Route::get('/' , 'SessionController@authrole');
});

// route admin

Route::group(array('prefix' => 'admin' , 'before' => 'auth.admin') , function(){
	Route::get('/' , 'AdminController@dashboard');
	Route::post('/updateprofile' , 'AdminController@updateProfile');
	Route::get('/profile' , 'AdminController@profile');

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
	Route::get('/oss/material/{id}/print' , 'OSSController@printmaterial');
	Route::get('/oss/material/{id}/edit' , 'OSSController@editmaterial');
	Route::post('/oss/material/{id}/update' , 'OSSController@updatematerial');
	Route::get('/oss/material/{id}/delete' , 'OSSController@deletematerial');

	Route::get('/oss/spj' , 'OSSController@showspj');
	Route::post('/oss/spj' , 'OSSController@storespj');
	Route::get('/oss/spj/{id}/details' , 'OSSController@detailspj');
	Route::get('/oss/spj/{id}/print' , 'OSSController@printspj');
	Route::get('/oss/spj/{id}/edit' , 'OSSController@editspj');
	Route::post('/oss/spj/{id}/update' , 'OSSController@updatespj');
	Route::get('/oss/spj/{id}/delete' , 'OSSController@deletespj');

	Route::resource('/fpl', 'FPLController', array('except' => array('show', 'create', 'destroy')));
	Route::get('/fpl/{id}/print', 'FPLController@printpdf');
	Route::get('fpl/{id}/details', 'FPLController@detail');
	// method destroy fpl(id)
	Route::get('/fpl/{id}/delete', 'FPLController@destroy');

	Route::resource('/spph', 'SPPHController', array('except' => array('show', 'create', 'destroy')));
	Route::get('/spph/{id}/print', 'SPPHController@printpdf');
	Route::get('spph/{id}/details', 'SPPHController@detail');
	// method destroy spph(id)
	Route::get('/spph/{id}/delete', 'SPPHController@destroy');

	Route::resource('/surattugas', 'SuratTugasController', array('except' => array('show', 'create', 'destroy')));
	Route::get('/surattugas/{id}/print', 'SuratTugasController@printpdf');
	Route::get('/surattugas/{id}/details', 'SuratTugasController@detail');
	// method destroy surattugas(id)
	Route::get('/surattugas/{id}/delete', 'SuratTugasController@destroy');

	Route::resource('/perjalanandinas', 'PerjalananDinasController', array('except' => array('show', 'create', 'destroy')));
	Route::get('/perjalanandinas/{id}/print', 'PerjalananDinasController@print');
	Route::get('perjalanandinas/{id}/details', 'PerjalananDinasController@detail');
	// method destroy perjalanandinas(id)
	Route::get('/perjalanandinas/{id}/details', 'PerjalananDinasController@details');
	Route::get('/perjalanandinas/{id}/delete', 'PerjalananDinasController@destroy');

	Route::resource('/stpd', 'STPDController', array('except' => array('show', 'create', 'destroy')));
	Route::get('/stpd/{id}/print', 'STPDController@print');
	Route::get('/stpd/{id}/details', 'STPDController@detail');
	// method destroy STPD(id)
	Route::get('/stpd/{id}/details', 'STPDController@details');
	Route::get('/stpd/{id}/print', 'STPDController@printpdf');
	Route::get('/stpd/{id}/delete', 'STPDController@destroy');

	Route::resource('/versheet', 'VersheetController', array('except' => array('show', 'create', 'destroy')));
	Route::get('/versheet/{id}/print', 'VersheetController@print');
	// method destroy Versheet(id)
	Route::get('/versheet/{id}/details', 'VersheetController@details');
	Route::get('/versheet/{id}/print', 'VersheetController@printpdf');
	Route::get('/versheet/{id}/delete', 'VersheetController@destroy');

	Route::resource('/fpjp', 'FPJPController', array('except' => array('show', 'create', 'destroy')));
	Route::get('/fpjp/{id}/print', 'FPJPController@print');
	Route::get('/fpjp/{id}/details', 'FPJPController@detail');
	// method destroy FPJP(id)
	Route::get('/fpjp/{id}/details', 'FPJPController@details');
	Route::get('/fpjp/{id}/print', 'FPJPController@printpdf');
	Route::get('/fpjp/{id}/delete', 'FPJPController@destroy');

	Route::get('/import/shoplists' , 'ImportController@shoplists');
	Route::get('/import/mastertp' , 'ImportController@mastertp');
	Route::post('/import/shoplists' , 'ImportController@importshoplists');
	Route::post('/import/mastertp' , 'ImportController@importmastertp');
});

// route NO

Route::group(array('prefix' => 'no' , 'before' => 'auth.no'), function(){
	Route::get('/' , 'NOController@dash');
	Route::post('/updateprofile' , 'NOController@updateProfile');
	Route::get('/profile' , 'NOController@profile');
	Route::resource('/users', 'UserController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	// method destroy user(id)
	Route::get('/users/{id}/delete', 'UserController@destroy');

	Route::resource('/bantek', 'BantekController', array('except' => array('show', 'create', 'destroy'  , 'edit' , 'update')));

	Route::resource('/mitra', 'MitraController', array('except' => array('show', 'create', 'destroy'  , 'edit' , 'update')));

	Route::resource('/signature', 'SignatureController', array('except' => array('show', 'create', 'destroy'  , 'edit' , 'update')));

	Route::resource('/lokasikerja', 'LokasiController', array('except' => array('show', 'create', 'destroy'  , 'edit' , 'update')));

	Route::get('/oss/material' , 'OSSController@showmaterial');
	Route::post('/oss/material' , 'OSSController@storematerial');
	Route::get('/oss/material/{id}/details' , 'OSSController@detailmaterial');
	Route::get('/oss/material/{id}/print' , 'OSSController@printmaterial');

	Route::get('/oss/spj' , 'OSSController@showspj');
	Route::post('/oss/spj' , 'OSSController@storespj');
	Route::get('/oss/spj/{id}/details' , 'OSSController@detailspj');
	Route::get('/oss/spj/{id}/print' , 'OSSController@printspj');
	Route::get('/oss/spj/{id}/edit' , 'OSSController@editspj');
	Route::post('/oss/spj/{id}/update' , 'OSSController@updatespj');
	Route::get('/oss/spj/{id}/delete' , 'OSSController@deletespj');

	Route::resource('/fpl', 'FPLController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/fpl/{id}/details', 'FPLController@detail');
	Route::get('/fpl/{id}/print', 'FPLController@printpdf');
	Route::resource('/spph', 'SPPHController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/spph/{id}/details', 'SPPHController@detail');
	Route::get('/spph/{id}/print', 'SPPHController@printpdf');
	Route::resource('/surattugas', 'SuratTugasController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/surattugas/{id}/details', 'SuratTugasController@detail');
	Route::get('/surattugas/{id}/print', 'SuratTugasController@printpdf');
	Route::resource('/perjalanandinas', 'PerjalananDinasController', array('except' => array('show', 'create', 'destroy', 'edit','update')));
	Route::get('/perjalanandinas/{id}/details', 'PerjalananDinasController@details');

	Route::resource('/stpd', 'STPDController', array('except' => array('show', 'create', 'destroy','edit','update')));
	Route::get('/stpd/{id}/details', 'STPDController@details');
	Route::get('/stpd/{id}/print', 'STPDController@printpdf');

	Route::resource('/versheet', 'VersheetController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/versheet/{id}/details', 'VersheetController@details');
	Route::get('/versheet/{id}/print', 'VersheetController@printpdf');

	Route::resource('/fpjp', 'FPJPController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/fpjp/{id}/details', 'FPJPController@details');
	Route::get('/fpjp/{id}/print', 'FPJPController@printpdf');

	Route::get('/import/shoplists' , 'ImportController@shoplists');
	Route::get('/import/mastertp' , 'ImportController@mastertp');
	Route::post('/import/shoplists' , 'ImportController@importshoplists');
	Route::post('/import/mastertp' , 'ImportController@importmastertp');
});

// route bantek

Route::group(array('prefix' => 'bantek' , 'before' => 'auth.bantek'), function(){
	Route::get('/' , 'BantekController@dash');
	Route::resource('/users', 'UserController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	// method destroy user(id)
	Route::get('/users/{id}/delete', 'UserController@destroy');

	Route::resource('/bantek', 'BantekController', array('except' => array('show', 'create', 'destroy'  , 'edit' , 'update')));

	Route::resource('/mitra', 'MitraController', array('except' => array('show', 'create', 'destroy'  , 'edit' , 'update')));

	Route::resource('/signature', 'SignatureController', array('except' => array('show', 'create', 'destroy'  , 'edit' , 'update')));

	Route::resource('/lokasikerja', 'LokasiController', array('except' => array('show', 'create', 'destroy'  , 'edit' , 'update')));

	Route::get('/oss/material' , 'OSSController@showmaterial');
	Route::post('/oss/material' , 'OSSController@storematerial');
	Route::get('/oss/material/{id}/details' , 'OSSController@detailmaterial');
	Route::get('/oss/material/{id}/print' , 'OSSController@printmaterial');

	Route::get('/oss/spj' , 'OSSController@showspj');
	Route::post('/oss/spj' , 'OSSController@storespj');
	Route::get('/oss/spj/{id}/details' , 'OSSController@detailspj');
	Route::get('/oss/spj/{id}/print' , 'OSSController@printspj');
	Route::get('/oss/spj/{id}/edit' , 'OSSController@editspj');
	Route::post('/oss/spj/{id}/update' , 'OSSController@updatespj');
	Route::get('/oss/spj/{id}/delete' , 'OSSController@deletespj');

	Route::resource('/fpl', 'FPLController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/fpl/{id}/details', 'FPLController@detail');
	Route::get('/fpl/{id}/print', 'FPLController@printpdf');
	Route::resource('/spph', 'SPPHController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/spph/{id}/details', 'SPPHController@detail');
	Route::get('/spph/{id}/print', 'SPPHController@printpdf');
	Route::resource('/surattugas', 'SuratTugasController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/surattugas/{id}/details', 'SuratTugasController@detail');
	Route::get('/surattugas/{id}/print', 'SuratTugasController@printpdf');
	Route::resource('/perjalanandinas', 'PerjalananDinasController', array('except' => array('show', 'create', 'destroy', 'edit','update')));
	Route::get('/perjalanandinas/{id}/details', 'PerjalananDinasController@details');

	Route::resource('/stpd', 'STPDController', array('except' => array('show', 'create', 'destroy','edit','update')));
	Route::get('/stpd/{id}/details', 'STPDController@details');
	Route::get('/stpd/{id}/print', 'STPDController@printpdf');

	Route::resource('/versheet', 'VersheetController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/versheet/{id}/details', 'VersheetController@details');
	Route::get('/versheet/{id}/print', 'VersheetController@printpdf');

	Route::resource('/fpjp', 'FPJPController', array('except' => array('show', 'create', 'destroy' , 'edit' , 'update')));
	Route::get('/fpjp/{id}/details', 'FPJPController@details');
	Route::get('/fpjp/{id}/print', 'FPJPController@printpdf');

	Route::get('/import/shoplists' , 'ImportController@shoplists');
	Route::get('/import/mastertp' , 'ImportController@mastertp');
	Route::post('/import/shoplists' , 'ImportController@importshoplists');
	Route::post('/import/mastertp' , 'ImportController@importmastertp');
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
	Route::get('/fpjp', function(){
		return View::make('templatesurat.fpjp');
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
Route::post('/ajax/fpjp/uraian/create' , 'FPJPUraianController@storefromajax');
