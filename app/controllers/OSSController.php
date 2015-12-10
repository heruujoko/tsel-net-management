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
			
			return Redirect::to('/admin/oss/material');
		}

	}

?>