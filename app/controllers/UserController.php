<?php
class UserController extends \BaseController {
	public function index()
	{
		$data['active'] = 'users';
		$data['users'] = User::all();
		$data['lokasi'] = LokasiKerja::all();
		$data['mitras'] = Mitra::all();
		return View::make('admin.users.show', $data);
	}
	public function store()
	{
		$user = new User;
		$user->nama = Input::get('nama');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->role = Input::get('role');
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

		Session::flash('success' , 'Data telah disimpan');
		return Redirect::to('admin/users');
	}
	public function edit($id)
	{
		$data['user'] = User::find($id);
		$data['lokasi'] = LokasiKerja::all();
		$data['active'] = 'users';
		$data['mitras'] = Mitra::all();
		return View::make('admin.users.edit', $data);
	}
	public function update($id)
	{
		$user = User::find($id);
		$user->nama = Input::get('nama');
		$user->email = Input::get('email');
		if(Input::get('password') != ''){
			$user->password = Hash::make(Input::get('password'));	
		}
		$user->role = Input::get('role');
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

		Session::flash('success' , 'Data telah diperbarui');
		return Redirect::to('admin/users');

	}
	public function destroy($id)
	{
		$bantek = User::find($id);
		$bantek->delete();

		Session::flash('success' , 'Data telah dihapus');
		return Redirect::to('admin/bantek');
	}
}
