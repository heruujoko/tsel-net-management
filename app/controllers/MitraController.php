<?php
class MitraController extends \BaseController {
	public function index()
	{
		$data['active'] = 'data';
		$data['mitra']	=	Mitra::all();
		return View::make(Auth::user()->role.'.mitra.show', $data);
	}
	public function store()
	{
		$mitra = new Mitra;
		$mitra->nama = Input::get('nama');
		$mitra->cluster = Input::get('cluster');
		$mitra->pic = Input::get('pic');
		$mitra->hp = Input::get('hp');
		$mitra->no_rekening = Input::get('no_rekening');
		$mitra->nama_rekening = Input::get('nama_rekening');
		$mitra->bank = Input::get('bank');
		$mitra->save();

		Session::flash('success', 'Data berhasil disimpan');
		return Redirect::to('/'.Auth::user()->role.'/mitra');
	}
	public function edit($id)
	{
		$data['mitra'] = Mitra::find($id);
		$data['active'] = 'data';
		return View::make('admin.mitra.edit', $data);

	}
	public function update($id)
	{
		$mitra = Mitra::find($id);
		$mitra->nama = Input::get('nama');
		$mitra->cluster = Input::get('cluster');
		$mitra->pic = Input::get('pic');
		$mitra->hp = Input::get('no_rekening');
		$mitra->no_rekening = Input::get('nama_rekening');
		$mitra->bank = Input::get('bank');
		$mitra->save();

		Session::flash('success', 'Data telah diperbarui');
		return Redirect::to('admin/mitra');
	}
	public function destroy($id)
	{
		$mitra = Mitra::find($id);
		$mitra->delete();
		Session::flash('success', 'Data telah dihapus');
		return Redirect::to('admin/mitra');
	}
}
