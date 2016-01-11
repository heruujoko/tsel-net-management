<?php
class SignatureController extends \BaseController {
	public function index()
	{
		$data['active'] = 'data';
		$data['signature'] = Signature::all();
		$data['users'] = User::where('role','=','no')->get();
		return View::make(Auth::user()->role.'.signature.show', $data);
	}
	public function store()
	{	
		$ext = Input::file('file')->getClientOriginalExtension();
		$user_id = Input::get('user_id');
		$validator = Validator::make(
		     array('ext' => $ext),
		     array('ext' => 'in:jpg,png')
		);
		if($validator->fails()){
			Session::flash('error', 'Format tidak di dukung');
			return Redirect::to('/'.Auth::user()->role.'/signature');
		} else {
			if($ext == 'jpg'){
				$signpic = Input::file('file')->move(public_path(), 'signature_'.$user_id.'.jpg');
			} else if($ext == 'png'){
				$signpic = Input::file('file')->move(public_path(), 'signature_'.$user_id.'.png');
			} else {

			}
			$signature = new Signature;
			$signature->user_id = Input::get('user_id');
			$signature->signature_pic = '/signature_'.$user_id.'.'.$ext;
			$signature->save();
		}
		Session::flash('success', 'Data telah disimpan');
		return Redirect::to('/'.Auth::user()->role.'/signature');
	}
	public function edit($id)
	{
		$data['signature'] = Signature::find($id);
		$data['active'] = 'data';
		$data['users'] = User::where('role','=','no')->get();
		Return View::make('admin.signature.edit', $data);
	}
	public function update($id)
	{
		$ext = Input::file('file')->getClientOriginalExtension();
		$user_id = Input::get('user_id');
		$validator = Validator::make(
		     array('ext' => $ext),
		     array('ext' => 'in:jpg,png')
		);
		if($validator->fails()){
			Session::flash('error', 'Format tidak di dukung');
			return Redirect::to('/admin/signature');
		} else {
			if($ext == 'jpg'){
				$signpic = Input::file('file')->move(public_path(), 'signature_'.$user_id.'.jpg');
			} else if($ext == 'png'){
				$signpic = Input::file('file')->move(public_path(), 'signature_'.$user_id.'.png');
			} else {

			}
			$signature = Signature::find($id);
			$signature->user_id = Input::get('user_id');
			$signature->signature_pic = '/signature_'.$user_id.'.'.$ext;
			$signature->save();
		}

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
