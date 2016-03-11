<?php

	class PerjalananDinasController extends \BaseController {

		public function index(){
			$data['active'] = 'pj';
			$data['pjs'] = PerjalananDinas::all();
			$data['users'] = User::all();
			$data['user_no'] = User::where("role","=","no")->get();
			return View::make(Auth::user()->role.'.pj.list' , $data);
		}

		public function store(){
			$ext = Input::file('file')->getClientOriginalExtension();

			$validator = Validator::make(
			     array('ext' => $ext),
			     array('ext' => 'in:pdf')
			);

			if($validator->fails()){
				Session::flash('error' , 'File format tidak di dukung');
				return Redirect::to('/'.Auth::user()->role.'/perjalanandinas');
			} else {
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

				//file nodin
				Input::file('file')->move(public_path(), 'nodin-'.$pj->id.'.pdf');
				$pj->nodin = '/nodin-'.$pj->id.'.pdf';
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
				$stpd->user_menugaskan = Input::get('menugaskan');
				$stpd->user_mengetahui = Input::get('mengetahui');
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
				$day = $kembali->diffInDays($berangkat)+1;
				$jumlah = ($harian * $day) + $stpd->trans_bandara;
				$stpd->jumlah = $jumlah;
				$stpd->save();

				//Buat Versheet

				$vs = new Versheet;
				$vs->user_id = Auth::user()->id;
				$vs->untuk_pembayaran = Input::get('kegiatan');
				$vs->jumlah_pembayaran = $stpd->jumlah;
				$vs->kepada_nama = $pj->user->nama;
				$vs->kepada_bank = $pj->user->bank;
				$vs->pd_id = $pj->id;
				$vs->kepada_rekening = $pj->user->no_rekening;
				$vs->save();

				$vd = new VersheetDocs;
				$vd->versheet_id = $vs->id;
				$vd->docs = 'FPJP';
				$vd->save();

				//Buat FPJP

				$fpjp = new FPJP;
				$fpjp->user_id = Auth::user()->id;
				$fpjp->pd_id = $pj->id;
				$fpjp->tanggal = Carbon::parse(Input::get('pergi'));
				$fpjp->user_mengetahui = Input::get('mengetahui');
				$fpjp->save();

				//Biaya UHPD
				$ur = new FPJPUraian;
				$ur->uraian = 'UHPD ke '.$pj->kota_tujuan.' dalam rangka '.$pj->kegiatan;
				$ur->jumlah = $pj->stpd->jumlah;
				$ur->fpjp_id = $fpjp->id;
				$ur->save();

				//Biaya Pesawat
				if($pj->biaya_pesawat != 0){
					$ur = new FPJPUraian;
					$ur->uraian = 'Biaya tiket';
					$ur->jumlah = $pj->biaya_pesawat;
					$ur->fpjp_id = $fpjp->id;
					$ur->save();
				}

				//Biaya Hotel
				if($pj->biaya_hotel != 0){
					$ur = new FPJPUraian;
					$ur->uraian = 'Biaya hotel '.$pj->hari_hotel.' hari x Rp '.number_format($pj->biaya_hotel);
					$ur->jumlah = $pj->hari_hotel*$pj->biaya_hotel;
					$ur->fpjp_id = $fpjp->id;
					$ur->save();
				}

				//PJ Lain
				$lain2 = PJLain::where('pj_id','=',$pj->id)->get();
				foreach($lain2 as $l){
					$ur = new FPJPUraian;
					$ur->uraian = $l->detail;
					$ur->jumlah = $l->jumlah;
					$ur->fpjp_id = $fpjp->id;
					$ur->save();
				}

				//Total Uraian
				$turai = FPJPUraian::where('fpjp_id','=',$fpjp->id)->get();
				$jum_fpjp = 0;
				foreach($turai as $tu){
					$jum_fpjp += $tu->jumlah;
				}
				$fpjp->total = $jum_fpjp;
				$fpjp->save();
				$vs->jumlah_pembayaran = $fpjp->total;
				$vs->save();

				Session::flash('success' , 'Data telah dibuat.');
				return Redirect::to('/'.Auth::user()->role.'/perjalanandinas');
			}
		}

		public function edit($id){
			$data['active'] = 'pj';
			$data['pj'] = PerjalananDinas::find($id);
			$ids = '';
			foreach ($data['pj']->lainlain as $key) {
				$ids .= $key->id.',';
			}
			$data['lain_ids'] = $ids;
			$data['users'] = User::all();
			return View::make('admin.pj.edit' , $data);
		}

		public function details($id){
			$data['active'] = 'pj';
			$data['pj'] = PerjalananDinas::find($id);
			//hitung jumlah
			$harian =0;
			$stpd = $data['pj']->stpd;
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
			$berangkat = Carbon::parse($data['pj']->tanggal_berangkat);
			$kembali = Carbon::parse($data['pj']->tanggal_kembali);
			$day = $kembali->diffInDays($berangkat)+1;
			$data['day'] = $day;
			$data['harian'] = $harian;
			return View::make(Auth::user()->role.'.pj.details' , $data);
		}

		public function update($id){
			$pj = PerjalananDinas::find($id);
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

			//Update STPD
			$stpd = STPD::find($pj->stpd->id);
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
			$stpd->user_menugaskan = Input::get('menugaskan');
			$stpd->user_mengetahui = Input::get('mengetahui');
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

			//Update Versheet
			$vs = Versheet::find($pj->versheet->id);
			$vs->user_id = Auth::user()->id;
			$vs->untuk_pembayaran = Input::get('kegiatan');
			$vs->jumlah_pembayaran = $stpd->jumlah;
			$vs->kepada_nama = $pj->user->nama;
			$vs->kepada_bank = $pj->user->bank;
			$vs->pd_id = $pj->id;
			$vs->kepada_rekening = $pj->user->no_rekening;
			$vs->save();

			//Update FPJP
			$fpjp = FPJP::find($pj->fpjp->id);
			$fpjp->user_id = Auth::user()->id;
			$fpjp->pd_id = $pj->id;
			$fpjp->tanggal = Carbon::parse(Input::get('pergi'));
			$fpjp->user_mengetahui = Input::get('mengetahui');
			$fpjp->save();

			//delete uraian lama
			FPJPUraian::where('fpjp_id','=',$pj->fpjp->id)->delete();

			//Biaya UHPD
			$ur = new FPJPUraian;
			$ur->uraian = 'UHPD '.$stpd->jenis_uhpd.' '.$day.' x Rp. '.number_format($harian);
			$ur->jumlah = $day*$harian;
			$ur->fpjp_id = $fpjp->id;
			$ur->save();

			//Biaya Pesawat
			if($pj->biaya_pesawat != 0){
				$ur = new FPJPUraian;
				$ur->uraian = 'Biaya tiket pesawat ke '.$pj->tujuan_pesawat;
				$ur->jumlah = $pj->biaya_pesawat;
				$ur->fpjp_id = $fpjp->id;
				$ur->save();
			}

			//Trans Bandara
			if($pj->transport_bandara !=0 ){
				$ur = new FPJPUraian;
				$ur->uraian = 'Transport bandara '.$pj->transport_bandara;
				$ur->jumlah = $pj->transport_bandara;
				$ur->fpjp_id = $fpjp->id;
				$ur->save();
			}

			//Biaya Hotel
			if($pj->biaya_hotel != 0){
				$ur = new FPJPUraian;
				$ur->uraian = 'Biaya hotel '.$pj->hari_hotel.' hari x Rp '.number_format($pj->biaya_hotel);
				$ur->jumlah = $pj->hari_hotel*$pj->biaya_hotel;
				$ur->fpjp_id = $fpjp->id;
				$ur->save();
			}

			//PJ Lain
			$lain2 = PJLain::where('pj_id','=',$pj->id)->get();
			foreach($lain2 as $l){
				$ur = new FPJPUraian;
				$ur->uraian = $l->detail;
				$ur->jumlah = $l->jumlah;
				$ur->fpjp_id = $fpjp->id;
				$ur->save();
			}

			//Total Uraian
			$turai = FPJPUraian::where('fpjp_id','=',$fpjp->id)->get();
			$jum_fpjp = 0;
			foreach($turai as $tu){
				$jum_fpjp += $tu->jumlah;
			}
			$fpjp->total = $jum_fpjp;
			$fpjp->save();

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
