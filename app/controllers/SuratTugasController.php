<?php

	class SuratTugasController extends \BaseController {

		public function index(){
			$data['active'] = 'st';
			$data['surat'] = SuratTugas::all();
			$data['bantek'] = Bantek::all();
			$data['sites'] = Mastertp::all();
			$data['user_no'] = User::where('role' , '=', 'no')->get();
			return View::make(Auth::user()->role.'.surattugas.list' , $data);
		}

		public function store(){
			$st = new SuratTugas;
			$st->tempat_tanggal = Carbon::now();
			$st->menyetujui = Input::get('menyetujui');
			$st->save();

			$romans = array(
				0 => '',
				1 => 'I',
				2 => 'II',
				3 => 'III',
				4 => 'IV',
				5 => 'V',
				6 => 'VI',
				7 => 'VII',
				8 => 'VIII',
				9 => 'IX',
				10 => 'X',
				11 => 'XI',
				12 => 'XII'
			);

			$day = Carbon::now();
			$st->no_surat = $st->id.'/TC.01'.'/RO-43'.'/'.$romans[$day->month].'/'.$day->year;
			$st->save();
			$banteks = Input::get('bantek');
			for ($i=0; $i < count($banteks); $i++) {
				$stb = new STBantek;
				$stb->bantek_id = $banteks[$i];
				$stb->st_id	= $st->id;
				$stb->save();
			}

			$activities = Input::get('activity');
			if($activities != ''){
				$activities = substr($activities, 0, -1);
				$activity = explode(",",$activities);
				if(count($activity > 0)){
					for ($i=0; $i < count($activity) ; $i++) {
						$sta = STActivity::find($activity[$i]);
						$sta->st_id = $st->id;
						$sta->save();
					}
				}
			}

			STActivity::where('st_id','=','')->delete();
			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/'.Auth::user()->role.'/surattugas');
		}

		public function edit($id){
			$data['active'] = 'st';
			$data['surat'] = SuratTugas::find($id);
			$data['bantek'] = Bantek::all();
			$data['sites'] = Mastertp::all();
			$data['user_no'] = User::where('role' , '=', 'no')->get();
			$ids = '';
			foreach ($data['surat']->activities as $key) {
				$ids .= $key->id.',';
			}
			$data['activity_ids'] = $ids;
			return View::make('admin.surattugas.edit' , $data);
		}

		public function update($id){
			$st = SuratTugas::find($id);
			$st->menyetujui = Input::get('menyetujui');
			$st->save();

			STBantek::where('st_id','=',$id)->delete();
			$banteks = Input::get('bantek');
			for ($i=0; $i < count($banteks); $i++) {
				$stb = new STBantek;
				$stb->bantek_id = $banteks[$i];
				$stb->st_id	= $st->id;
				$stb->save();
			}

			$activities = Input::get('activity');
			if($activities != ''){
				$activities = substr($activities, 0, -1);
				$activity = explode(",",$activities);
				if(count($activity > 0)){
					for ($i=0; $i < count($activity) ; $i++) {
						$sta = STActivity::find($activity[$i]);
						$sta->st_id = $st->id;
						$sta->save();
					}
				}
			}

			//delete unused
			$nowact = array();
			foreach ($st->activities as $key) {
				array_push($nowact , $key->id);
			}
			$act = explode(",",$activities);

			$diff_act = array_diff($nowact , $act);
			foreach ($diff_act as $key) {
				STActivity::where('id','=',$key)->delete();
			}

			STActivity::where('st_id','=','')->delete();
			Session::flash('success' , 'Data telah ubah.');
			return Redirect::to('/admin/surattugas');
		}

		public function destroy($id){
			SuratTugas::find($id)->delete();
			STActivity::where('st_id','=',$id)->delete();
			STBantek::where('st_id','=',$id)->delete();
			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/surattugas');
		}

		public function detail($id){
	 		$surat = SuratTugas::find($id);
	 		$data['active'] = 'st';
	 		$data['surat'] = $surat;

	 		return View::make(Auth::user()->role.'.surattugas.detail', $data);
 		}

 		public function printpdf($id){
	 		$surat = SuratTugas::find($id);
	 		$data['no'] = 1;
	 		$data['sites'] = $surat->activities;
	 		$data['surat'] = $surat;
	 		$pdf = PDF::loadView('templatesurat.surat_tugas' , $data);
	 		return $pdf->setPaper('a4')->stream();
 		}


	}

?>
