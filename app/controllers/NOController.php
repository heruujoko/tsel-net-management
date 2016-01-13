<?php

	class NOController extends \BaseController {

		public function dash(){
			$data['active'] = 'dashboard';
			return View::make('no/dashboard',$data);
		}

		public function profile(){
			$data['active'] = '';
			$data['user'] = User::find(Auth::user()->id);
			$data['mitras'] = Mitra::all();
			$data['lokasi'] = LokasiKerja::all();
			return View::make('admin.users.profile' , $data);
		}

		public function updateProfile(){
			$user = User::find(Auth::user()->id);
			$user->nama = Input::get('nama');
			$user->email = Input::get('email');
			if(Input::get('password') != ''){
				$user->password = Hash::make(Input::get('password'));
			}
			$user->jabatan = Input::get('jabatan');
			$user->nik = Input::get('nik');
			$user->lokasi_kerja_id = Input::get('lokasi');
			$user->mitra = Input::get('mitra');
			$user->bank = Input::get('bank');
			$user->no_rekening = Input::get('rekening');
			$user->level_jabatan = Input::get('level_jabatan');
			$user->is_manager_utama = Input::has('is_manager_utama');
			$user->can_be_poh = Input::has('can_be_poh');
			$user->save();
			return Redirect::to('admin');
		}

	}

?>
