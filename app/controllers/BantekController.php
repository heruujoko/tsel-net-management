<?php
class BantekController extends \BaseController {
	public function index()
	{
		$data['active'] = 'bantek';
		$data['banteks'] = Bantek::all();
		return View::make('admin.bantek.show', $data);
	}
	public function store()
	{
		$bantek = new Bantek;
		$bantek->nama = Input::get('nama');
		$bantek->hp = Input::get('hp');
		$bantek->perusahaan = Input::get('perusahaan');
		$bantek->save();

		Session::flash('success' , 'Data telah disimpan');
		return Redirect::to('admin.bantek.show');
	}
	public function edit($id)
	{
		$bantek = Bantek::find($id);
		$data['active'] = 'bantek';
		return View::make('admin.bantek.edit', $data);
	}
	public function update($id)
	{
		$bantek = Bantek::find($id);
		$bantek->nama = Input::get('nama');
		$bantek->hp = Input::get('hp');
		$bantek->perusahaan = Input::get('perusahaan');
		$bantek->save();

		Session::flash('success' , 'Data telah diperbarui');
		return Redirect::to('admin.bantek.show');

	}
	public function destroy($id)
	{
		$bantek = Bantek::find($id);
		$bantek->delete();

		Session::flash('success' , 'Data telah dihapus');
		return Redirect::to('admin.bantek.show');
	}
}
