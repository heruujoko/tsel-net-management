<?php
class UserController extends \BaseController {
	public function index()
	{
		$data['active'] = 'users';
		$data['users'] = User::all();
		$data['lokasi'] = LokasiKerja::all();
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
		$user->cluster = Input::get('cluster');
		$user->nik = Input::get('nik');
		$user->lokasi_kerja_id = Input::get('lokasi');
		$user->bank = Input::get('bank');
		$user->no_rekening = Input::get('rekening');
		$user->save();

		Session::flash('success' , 'Data telah disimpan');
		return Redirect::to('admin/users');
	}
	public function edit($id)
	{
		$data['user'] = User::find($id);
		$data['lokasi'] = LokasiKerja::all();
		$data['active'] = 'users';
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
		$user->cluster = Input::get('cluster');
		$user->nik = Input::get('nik');
		$user->lokasi_kerja_id = Input::get('lokasi');
		$user->bank = Input::get('bank');
		$user->no_rekening = Input::get('rekening');
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
