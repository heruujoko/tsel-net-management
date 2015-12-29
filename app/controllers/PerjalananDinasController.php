<?php
	
	class PerjalananDinasController extends \BaseController {

		public function index(){
			$data['active'] = 'pj';
			$data['pjs'] = PerjalananDinas::all();
			$data['users'] = User::all();
			return View::make('admin.pj.list' , $data);
		}

		public function store(){
			$pj = new PerjalananDinas;
			$pj->user_id = Input::get('nama');
			$pj->kota_tujuan = Input::get('tujuan');
			$pj->kegiatan = Input::get('kegiatan');
			$pj->tanggal_berangkat = Carbon::parse(Input::get('pergi'));
			$pj->tanggal_kembali = Carbon::parse(Input::get('kembali'));
			$pj->kendaraan = Input::get('kendaraan');
			$pj->jenis_uhpd = Input::get('jenis_uhpd');
			if( Input::get('trans_bandara') != ''){
				$pj->transport_bandara = Input::get('trans_bandara');
			}
			if( Input::get('hotel_hari') != ''){
				$pj->hari_hotel = Input::get('hotel_hari');	
			}
			if( Input::get('hotel_perhari') != ''){
				$pj->biaya_hotel = Input::get('hotel_perhari');	
			}
			if( Input::get('pesawat_biaya') != '' ){
				$pj->biaya_pesawat = Input::get('pesawat_biaya');	
			}
			if( Input::get('pesawat_kota') != '' ){
				$pj->tujuan_pesawat = Input::get('pesawat_kota');	
			}
			$pj->save();
			$listlain = Input::get('ids_lain');
			if($listlain != ''){
				$listlain = substr($listlain, 0, -1);
				$lain = explode(",",$listlain);
				if(count($lain > 0)){
					for ($i=0; $i < count($lain) ; $i++) { 
						$pjlain = PJLain::find($lain[$i]);
						$pjlain->pj_id = $pj->id;
						$pjlain->save();
					}
				}
			}

			//create STPD
			$stpd = new STPD;
			$stpd->user_id = Input::get('nama');
			$stpd->tujuan_penugasan = Input::get('tujuan');
			$stpd->tanggal_berangkat = Carbon::parse(Input::get('pergi'));
			$stpd->tanggal_kembali = Carbon::parse(Input::get('kembali'));
			$stpd->kendaraan = Input::get('kendaraan');
			$stpd->kegiatan = Input::get('kegiatan');
			$stpd->jenis_uhpd = Input::get('jenis_uhpd');
			if( Input::get('trans_bandara') != ''){
				$stpd->trans_bandara = Input::get('trans_bandara');
			}
			$stpd->tanggal_stpd = Carbon::parse(Input::get('pergi'));
			$stpd->pd_id = $pj->id;
			// $stpd->user_menugaskan = Input::get('menugaskan');
			// $stpd->user_mengetahui = Input::get('mengetahui');
			$stpd->save();

			//hitung jumlah
			$harian =0;
			if($stpd->user->level_jabatan == 'manager'){
				if($stpd->jenis_uhpd == 'darat'){
					$harian = 290000;
				} elseif ($stpd->jenis_uhpd == 'udara') {
					$harian = 420000;
				} else {
					$harian = 230000;
				}
			} elseif($stpd->user->level_jabatan == 'spv'){
				if($stpd->jenis_uhpd == 'darat'){
					$harian = 275000;
				} elseif ($stpd->jenis_uhpd == 'udara') {
					$harian = 395000;
				} else {
					$harian = 215000;
				}
			} elseif ($stpd->user->level_jabatan == 'staff') {
				if($stpd->jenis_uhpd == 'darat'){
					$harian = 260000;
				} elseif ($stpd->jenis_uhpd == 'udara') {
					$harian = 370000;
				} else {
					$harian = 200000;
				}
			} else {
				$harian = 0;
			}	

			$berangkat = Carbon::parse(Input::get('pergi'));
			$kembali = Carbon::parse(Input::get('kembali'));
			$day = $kembali->diffInDays($berangkat);
			$jumlah = ($harian * $day) + $stpd->trans_bandara;
			$stpd->jumlah = $jumlah;
			$stpd->save();

			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/admin/perjalanandinas');
		}

		public function edit($id){
			$data['active'] = 'pj';
			$data['pj'] = PerjalananDinas::find($id);
			$ids = '';
			foreach ($data['pj']->lainlain as $key) {
				$ids .= $key->id.',';	
			}
			$data['lain_ids'] = $ids;
			return View::make('admin.pj.edit' , $data);
		}

		public function update($id){
			$pj = PerjalananDinas::find($id);
			$pj->nama = Input::get('nama');
			$pj->kota_tujuan = Input::get('tujuan');
			$pj->kegiatan = Input::get('kegiatan');
			$pj->tanggal_berangkat = Carbon::parse(Input::get('pergi'));
			$pj->tanggal_kembali = Carbon::parse(Input::get('kembali'));
			$pj->kendaraan = Input::get('kendaraan');
			$pj->jenis_uhpd = Input::get('jenis_uhpd');
			if( Input::get('trans_bandara') != ''){
				$pj->transport_bandara = Input::get('trans_bandara');
			}
			if( Input::get('hotel_hari') != ''){
				$pj->hari_hotel = Input::get('hotel_hari');	
			}
			if( Input::get('hotel_perhari') != ''){
				$pj->biaya_hotel = Input::get('hotel_perhari');	
			}
			if( Input::get('pesawat_biaya') != '' ){
				$pj->biaya_pesawat = Input::get('pesawat_biaya');	
			}
			if( Input::get('pesawat_kota') != '' ){
				$pj->tujuan_pesawat = Input::get('pesawat_kota');	
			}
			$pj->save();

			$listlain = Input::get('ids_lain');
			if($listlain != ''){
				$listlain = substr($listlain, 0, -1);
				$lain = explode(",",$listlain);
				if(count($lain > 0)){
					for ($i=0; $i < count($lain) ; $i++) { 
						$pjlain = PJLain::find($lain[$i]);
						$pjlain->pj_id = $pj->id;
						$pjlain->save();
					}
				}
			}

			//delete unused
			$nowlain = array();
			foreach ($pj->lainlain as $key) {
				array_push($nowlain , $key->id);
			}
			$lain = explode(",",$listlain);

			$diff_lain = array_diff($nowlain , $lain);
			foreach ($diff_lain as $key) {
				PJLain::where('id','=',$key)->delete();
			}

			PJLain::where('pj_id','=','')->delete();
			Session::flash('success' , 'Data telah diubah.');
			return Redirect::to('/admin/perjalanandinas');
		}

		public function destroy($id){
			PerjalananDinas::find($id)->delete();
			PJLain::where('pj_id','=',$id)->delete();
			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/perjalanandinas');
		}

	}

?>