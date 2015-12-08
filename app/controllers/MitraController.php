<?php
class MitraController extends \BaseController {
	public function index()
	{
		$data['active'] = 'mitra';
		$data['mitra']	=	Mitra::all();
		return View::make('admin.mitra.show', $data);
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

		Session::flash('success', 'Data berhasil disimpan');
		return Redirect::to('admin.mitra.show');
	}
	public function edit($id)
	{
		$mitra = find($id);
		$data['active'] = 'mitra';
		return View::make('admin.mitra.edit');

	}
	public function update($id)
	{
		$mitra = Mitra::find($id);
	}
	public function destroy($id)
	{
		$mitra = Mitra::find($id);

	}
}
