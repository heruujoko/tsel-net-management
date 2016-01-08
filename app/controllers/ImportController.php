<?php

	class ImportController extends \BaseController {

		public function shoplists(){
			$data['active'] = 'import';
			$data['sl'] = true;
			return View::make('admin.import.shoplists',$data);
		}

		public function importshoplists(){
			$ext = Input::file('file')->getClientOriginalExtension();

			$validator = Validator::make(
			     array('ext' => $ext),
			     array('ext' => 'in:xls,xlsx')
			);

			if($validator->fails()){
				Session::flash('error' , 'File format tidak di dukung');
				return Redirect::to('/admin/import/shoplists');
			} else {
				if($ext == 'xls'){
					Input::file('file')->move(public_path(), 'sl.xls');
					if(Input::get('replace') == 'on'){
						DB::table('shoplist')->delete();
					} else {

					}
					try{
						Excel::load('public/sl.xls', function($r){
							$res = $r->all()->toArray();
							foreach($res as $data){
								$d = new Shoplist;
								$d->kode = $data['kode_sl'];
								$d->deskripsi = $data['deskripsi_pekerjaan'];
								$d->satuan = $data['satuan'];
								$d->harga = $data['harga'];
								$d->save();
							}
						});	
					} catch(Exception $e) {
						Session::flash('error' , 'File tidak sesuai format');
						return Redirect::to('/admin/import/shoplists');
					}
					
				}
				elseif($ext == 'xlsx') {
					Input::file('file')->move(public_path(), 'sl.xlsx');
					if(Input::get('replace') == 'on'){
						DB::table('shoplist')->delete();
					} else {

					}
					try{
						Excel::load('public/sl.xlsx', function($r){
							$res = $r->all()->toArray();
							foreach($res as $data){
								$d = new Shoplist;
								$d->kode = $data['kode_sl'];
								$d->deskripsi = $data['deskripsi_pekerjaan'];
								$d->satuan = $data['satuan'];
								$d->harga = $data['harga'];
								$d->save();
							}
						});	
					} catch(Exception $e) {
						Session::flash('error' , 'File tidak sesuai format');
						return Redirect::to('/admin/import/shoplists');
					}
				} else {

				}
				Session::flash('success' , 'Data telah dibuat.');
				return Redirect::to('/admin/import/shoplists');
			}
		}

		public function mastertp(){
			$data['active'] = 'import';
			$data['mastertp'] = true;
			return View::make('admin.import.mastertp',$data);	
		}

		public function importmastertp(){
			$ext = Input::file('file')->getClientOriginalExtension();

			$validator = Validator::make(
			     array('ext' => $ext),
			     array('ext' => 'in:xls,xlsx')
			);

			if($validator->fails()){
				Session::flash('error' , 'File format tidak di dukung');
				return Redirect::to('/admin/import/mastertp');
			} else {
				if($ext == 'xls'){
					Input::file('file')->move(public_path(), 'mastertp.xls');
					if(Input::get('replace') == 'on'){
						DB::table('mastertp')->delete();
					} else {

					}
					try{
						Excel::load('public/mastertp.xls', function($r){
							$res = $r->all()->toArray();
							foreach($res as $data){
								$d = new Mastertp;
								if($data['site'] != '' && $data['site_id'] != ''){
									$d->sitelocation = $data['site'];
									$d->btsname = $data['site_id'];
									$d->save();
								}
							}
						});	
					} catch(Exception $e) {
						Session::flash('error' , ''.$e->getMessage());
						return Redirect::to('/admin/import/mastertp');
					}
					
				}
				elseif($ext == 'xlsx') {
					Input::file('file')->move(public_path(), 'mastertp.xlsx');
					if(Input::get('replace') == 'on'){
						DB::table('mastertp')->delete();
					} else {

					}
					try{
						Excel::load('public/mastertp.xlsx', function($r){
							$res = $r->all()->toArray();
							foreach($res as $data){
								$d = new Mastertp;
								if($data['site'] != '' && $data['site_id'] != ''){
									$d->sitelocation = $data['site'];
									$d->btsname = $data['site_id'];
									$d->save();
								}
							}
						});	
					} catch(Exception $e) {
						Session::flash('error' , ''.$e->getMessage());
						return Redirect::to('/admin/import/mastertp');
					}
				} else {

				}
				Session::flash('success' , 'Data telah dibuat.');
				return Redirect::to('/admin/import/mastertp');
			}
		}

	}

?>