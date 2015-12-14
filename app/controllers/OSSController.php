<?php
	
	class OSSController extends \BaseController {

		public function showmaterial(){
			$data['active'] = 'oss';
			$data['material'] = true;
			$data['oss'] = OSS::where('oss_type','=','material')->get();
			$data['sites'] = Mastertp::all();
			$data['shoplists'] = Shoplist::all();
			$data['userno'] = User::where('role' , '=' , 'no')->get();
			return View::make('admin.oss.showmaterial', $data);
		}

		public function storematerial(){
			$tanggal = Carbon::parse(Input::get('tanggal'));
			$oss = new Oss;
			$oss->site = Input::get('namasite');
			$oss->oss_type = "material";
			$oss->tanggal = $tanggal;
			$oss->permasalahan = Input::get('permasalahan');
			$oss->action = Input::get('action');
			$oss->user_mengerjakan = Input::get('mengerjakan');
			$oss->user_mengetahui = Input::get('mengetahui');
			$oss->save();

			$shopping_list = Input::get('shoplist');
			$harga = 0;
			for ($i=0; $i < count($shopping_list); $i++) { 
				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopping_list[$i];
				$ss->save();
				$sl = Shoplist::find($shopping_list[$i]);
				$harga += $sl->harga;
			}

			$oss->harga = $harga;
			$oss->save();

			$menyetujui = Input::get('menyetujui');
			
			for ($j=0; $j < count($menyetujui); $j++) { 
				$stj = new MenyetujuiOSS;
				$stj->oss_id = $oss->id;
				$stj->user_id = $menyetujui[$j];
				$stj->save();	
			}
			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/admin/oss/material');
		}

		public function detailmaterial($id){
			$data['active'] = 'oss';
			$data['material'] = true;
			$data['oss'] = OSS::where('oss_type','=','material')->where('id','=',$id)->first();
			return View::make('admin.oss.detailmaterial' , $data);
		}

		public function editmaterial($id){
			$data['active'] = 'oss';
			$data['material'] = true;
			$data['oss'] = OSS::where('oss_type','=','material')->where('id','=',$id)->first();
			$data['sites'] = Mastertp::all();
			$data['shoplists'] = Shoplist::all();
			$data['userno'] = User::where('role' , '=' , 'no')->get();
			return View::make('admin.oss.editmaterial' , $data);	
		}

		public function updatematerial($id){
			$tanggal = Carbon::parse(Input::get('tanggal'));
			$oss = Oss::where('id','=',$id)->first();
			$oss->site = Input::get('namasite');
			$oss->oss_type = "material";
			$oss->tanggal = $tanggal;
			$oss->permasalahan = Input::get('permasalahan');
			$oss->action = Input::get('action');
			$oss->user_mengerjakan = Input::get('mengerjakan');
			$oss->user_mengetahui = Input::get('mengetahui');
			$oss->save();
			
			OSShop::where('oss_id' , '=' ,$id)->delete();

			$shopping_list = Input::get('shoplist');
			$harga = 0;
			for ($i=0; $i < count($shopping_list); $i++) { 
				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopping_list[$i];
				$ss->save();
				$sl = Shoplist::find($shopping_list[$i]);
				$harga += $sl->harga;
			}

			$oss->harga = $harga;
			$oss->save();
			MenyetujuiOSS::where('oss_id' , '=' , $id)->delete();
			$menyetujui = Input::get('menyetujui');
			
			for ($j=0; $j < count($menyetujui); $j++) { 
				$stj = new MenyetujuiOSS;
				$stj->oss_id = $oss->id;
				$stj->user_id = $menyetujui[$j];
				$stj->save();	
			}
			Session::flash('success' , 'Data telah diperbarui.');
			return Redirect::to('/admin/oss/material/'.$id.'/edit');
		}

		public function deletematerial($id){
			$oss = OSS::find($id);
			$oss->delete();
			$sl = OSShop::where('oss_id' , '=', $id)->delete();
			
			$stj = MenyetujuiOSS::where('oss_id' , '=' , $id)->delete();
			
			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/oss/material/');
		}


		public function showspj(){
			$data['active'] = 'oss';
			$data['spj'] = true;
			$data['oss'] = OSS::where('oss_type','=','spj')->get();
			$data['sites'] = Mastertp::all();
			$data['shoplists'] = Shoplist::all();
			$data['bantek'] = Bantek::all();
			$data['userno'] = User::where('role' , '=' , 'no')->get();
			return View::make('admin.oss.showspj', $data);
		}

		public function storespj(){
			$oss = new OSS;
			$oss->site = Input::get('namasite');
			$oss->oss_type = "spj";
			$oss->tanggal = Carbon::parse(Input::get('tanggal'));
			$oss->bantek = Input::get('bantek');
			$oss->mulai = Carbon::parse(Input::get('mulai'));
			$oss->selesai = Carbon::parse(Input::get('selesai'));
			$oss->transport = Input::get('transport');
			$oss->user_mengerjakan = Input::get('mengerjakan');
			$oss->user_mengetahui = Input::get('mengetahui');
			$oss->save();

			$shopping_list = Input::get('shoplist');
			$harga = 0;
			for ($i=0; $i < count($shopping_list); $i++) { 
				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopping_list[$i];
				$ss->save();
				$sl = Shoplist::find($shopping_list[$i]);
				$harga += $sl->harga;
			}

			$oss->harga = $harga;
			$oss->save();

			$menyetujui = Input::get('menyetujui');
			
			for ($j=0; $j < count($menyetujui); $j++) { 
				$stj = new MenyetujuiOSS;
				$stj->oss_id = $oss->id;
				$stj->user_id = $menyetujui[$j];
				$stj->save();	
			}

			//perhitungan RKS
			$biaya_rks = 0;
			$st = new Carbon(Input::get('mulai'));
			$nd = new Carbon(Input::get('selesai'));
			$diff = $nd->diff($st)->days;	

			if($diff > 1){
				$biaya_rks = 350000 * ( $diff -1 );
				$biaya_rks+= 150000;
			} else {
				$biaya_rks = 150000;
			}

			//biaya perjalanan
			$biayafee = 0;
			if(Input::get('transport') == 'no'){
				$oss->harga +=$biaya_rks;		
			} else {
				$shopl = new Shoplist;
				$shopl->kode = Input::get('kode_sl_trans');
				$shopl->deskripsi = Input::get('deskripsi_sl_trans');
				$shopl->satuan = Input::get('satuan_sl_trans');
				$shopl->harga = Input::get('harga_sl_trans');
				$shopl->type = 'transport';
				$shopl->save();

				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopl->id;
				$ss->save();

				if($shopl->harga <= 500000){
					$biayafee = (15/100)*$shopl->harga;
				} else {
					$biayafee = (10/100)*$shopl->harga;
				}

				$oss->harga +=$biaya_rks + $biayafee +$shopl->harga;
			}
			$oss->save();

			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/admin/oss/spj');
		}

	}

?>