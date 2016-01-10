<?php
class LokasiController extends \BaseController {
	public function index()
	{
		$data['active'] = 'lokasi';
		$data['lokasi'] = LokasiKerja::all();
		return View::make(Auth::user()->role.'.lokasi.show', $data);
	}
	public function store()
	{
		$lokasi = new LokasiKerja;
		$lokasi->nama = Input::get('nama');
		$lokasi->save();

		Session::flash('success' , 'Data telah disimpan');
		return Redirect::to('/'.Auth::user()->role.'/lokasikerja');
	}
	public function edit($id)
	{
		$data['lokasi'] = LokasiKerja::find($id);
		$data['active'] = 'lokasi';
		return View::make('admin.lokasi.edit', $data);
	}
	public function update($id)
	{
		$lokasi = LokasiKerja::find($id);
		$lokasi->nama = Input::get('nama');
		$lokasi->save();

		Session::flash('success' , 'Data telah diperbarui');
		return Redirect::to('admin/lokasikerja');

	}
	public function destroy($id)
	{
		$lokasi = LokasiKerja::find($id);
		$lokasi->delete();

		Session::flash('success' , 'Data telah dihapus');
		return Redirect::to('admin/lokasikerja');
	}
}
