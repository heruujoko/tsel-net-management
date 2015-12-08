<?php
class SignatureController extends \BaseController {
	public function index()
	{
		$data['active'] = 'data';
		$data['signature'] = Signature::all();
		return View::make('admin.signature.show', $data);
	}
	public function store()
	{
		$signature = new Signature;
		$signature->user_id = Input::get('user_id');
		$signature->signature_pic = Input::get('signature_pic');
		$signature->save();

		Session::flash('success', 'Data telah disimpan');
		return Redirect::to('/admin/signature');
	}
	public function edit($id)
	{
		$data['signature'] = Signature::find($id);
		$data['active'] = 'data';
		Return View::make('admin.signature.edit', $data);
	}
	public function update($id)
	{
		$signature = Signature::find($id);
		$signature->user_id = Input::get('user_id');
		$signature->signature_pic = Input::get('signature_pic');
		$signature->save();

		Session::flash('success', 'Data telah diperbarui');
		return Redirect::to('/admin/signature');
	}
	public function destroy($id)
	{
		$signature = Signature::find($id);
		$signature->delete();

		Session::flash('success', 'Data telah dihapus');
		return Redirect::to('/admin/signature');
	}
}
