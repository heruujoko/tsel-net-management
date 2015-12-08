<?php
class SignatureController extends \BaseController {
	public function index()
	{
		$data['active'] = 'signature';
		$data['signature'] = Signature::all();
		return View::make('admin.signature.show', $data);
	}
	public function store()
	{
		$current = Auth::user()->id;
		$signature = new Signature;
		$signature->user_id = Input::get($current);
		$signature->signature_pic = Input::get('signature_pic');
		$signature->save();

		Session::flash('success', 'Data telah disimpan');
		return Redirect::to('/admin/signature');
	}
	public function edit($id)
	{
		$signature = Signature::find($id);
		$data['active'] = 'signature';
		Return View::make('admin.signature.edit', $data);
	}
	public function update($id)
	{
		$current = Auth::user()->id;
		$signature = Signature::find($id);
		$signature->user_id = Input::get($current);
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
