<?php

	class STPDController extends \BaseController {

		public function index(){
			$data['active'] = 'stpd';
			$data['user_no'] = User::where('role','=','no')->get();
			$data['stpd'] = STPD::all();
			return View::make(Auth::user()->role.'.stpd.list' , $data);
		}

		public function store(){
			$stpd = new STPD;
			$stpd->user_id = Input::get('nama');
			$stpd->tujuan_penugasan = Input::get('tujuan_penugasan');
			$stpd->tanggal_berangkat = Carbon::parse(Input::get('tanggal_berangkat'));
			$stpd->tanggal_kembali = Carbon::parse(Input::get('tanggal_kembali'));
			$stpd->kendaraan = Input::get('kelas_kendaraan');
			$stpd->kegiatan = Input::get('kegiatan');
			$stpd->jenis_uhpd = Input::get('uhpd');
			$stpd->trans_bandara = Input::get('trans_bandara');
			$stpd->tanggal_stpd = Carbon::parse(Input::get('tanggal_berangkat'));
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

			$berangkat = Carbon::parse(Input::get('tanggal_berangkat'));
			$kembali = Carbon::parse(Input::get('tanggal_kembali'));
			$day = $kembali->diffInDays($berangkat);
			$jumlah = ($harian * $day) + $stpd->trans_bandara;
			$stpd->jumlah = $jumlah;
			$stpd->save();

			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/'.Auth::user()->role.'/stpd');
		}

		public function edit($id){
			$data['active'] = 'stpd';
			$data['user_no'] = User::where('role','=','no')->get();
			$data['stpd'] = STPD::find($id);
			$data['users'] = User::all();
			return View::make('admin.stpd.edit' , $data);
		}

		public function update($id){
			$stpd = STPD::find($id);
			$stpd->user_id = Input::get('nama');
			$stpd->tujuan_penugasan = Input::get('tujuan_penugasan');
			$stpd->tanggal_berangkat = Carbon::parse(Input::get('tanggal_berangkat'));
			$stpd->tanggal_kembali = Carbon::parse(Input::get('tanggal_kembali'));
			$stpd->kendaraan = Input::get('kelas_kendaraan');
			$stpd->kegiatan = Input::get('kegiatan');
			$stpd->jenis_uhpd = Input::get('uhpd');
			$stpd->trans_bandara = Input::get('trans_bandara');
			$stpd->tanggal_stpd = Carbon::parse(Input::get('tanggal_berangkat'));
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

			$berangkat = Carbon::parse(Input::get('tanggal_berangkat'));
			$kembali = Carbon::parse(Input::get('tanggal_kembali'));
			$day = $kembali->diffInDays($berangkat);
			$jumlah = ($harian * $day) + $stpd->trans_bandara;
			$stpd->jumlah = $jumlah;
			$stpd->save();

			Session::flash('success' , 'Data telah ubah.');
			return Redirect::to('/admin/stpd');
		}

		public function details($id){
			$data['active'] = 'stpd';
			$data['stpd'] = STPD::find($id);
			return View::make(Auth::user()->role.'.stpd.details',$data);
		}

		public function printpdf($id){
			$data['active'] = 'stpd';
			$data['stpd'] = STPD::find($id);
			$day = Carbon::parse($data['stpd']->tanggal_stpd);
			$data['day'] = $day;
			$pdf = PDF::loadView('templatesurat.STPD' , $data);
			return $pdf->stream();
		}

		public function destroy($id){
			STPD::find($id)->delete();
			Session::flash('success' , 'Data telah hapus.');
			return Redirect::to('/admin/stpd');
		}

	}

?>
