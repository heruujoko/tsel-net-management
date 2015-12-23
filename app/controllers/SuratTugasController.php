<?php
	
	class SuratTugasController extends \BaseController {

		public function index(){
			$data['active'] = 'st';
			$data['surat'] = SuratTugas::all();
			$data['bantek'] = Bantek::all();
			$data['sites'] = Mastertp::all();
			$data['user_no'] = User::where('role' , '=', 'no')->get();
			return View::make('admin.surattugas.list' , $data);
		}

		public function store(){
			$st = new SuratTugas;
			$st->tempat_tanggal = Carbon::now();
			$st->menyetujui = Input::get('menyetujui');
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
			return Redirect::to('/admin/surattugas');
		}

		public function edit($id){
			$data['active'] = 'st';
			$data['surat'] = SuratTugas::find($id);
			$data['bantek'] = Bantek::all();
			$data['sites'] = Mastertp::all();
			$data['user_no'] = User::where('role' , '=', 'no')->get();
			return View::make('admin.surattugas.edit' , $data);
		}

		public function update(){
			
		}

		public function destroy(){
			
		}

	}

?>