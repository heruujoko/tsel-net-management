<?php

  class ActivityController extends \BaseController {

    public function index(){
      $data['active'] = 'activity';
      $data['activities'] = Activity::all();
      $data['sites'] = Mastertp::all();
      return View::make(Auth::user()->role.'.activity.list' , $data);
    }

    public function show($id){
      $data['active'] = 'activity';
      $data['activity'] = Activity::find($id);
      return View::make(Auth::user()->role.'.activity.details' , $data);
    }

    public function store(){
      $ac = new Activity;
      $ac->user_id = Auth::user()->id;
      $ac->site_id = Input::get('site');
      $ac->problem = Input::get('problem');
      $ac->activity = Input::get('activity');
      $ac->detail_activity = Input::get('dactivity');
      $ac->mulai = Carbon::parse(Input::get('mulai'));
      $ac->selesai = Carbon::parse(Input::get('selesai'));
      $ac->save();
      Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/'.Auth::user()->role.'/activity');
    }

    public function edit($id){
      $data['active'] = 'activity';
      $data['activity'] = Activity::find($id);
      $data['sites'] = Mastertp::all();
      return View::make(Auth::user()->role.'.activity.edit' , $data);
    }

    public function update($id){
      $ac = Activity::find($id);
      $ac->user_id = Auth::user()->id;
      $ac->site_id = Input::get('site');
      $ac->problem = Input::get('problem');
      $ac->activity = Input::get('activity');
      $ac->detail_activity = Input::get('dactivity');
      $ac->mulai = Carbon::parse(Input::get('mulai'));
      $ac->selesai = Carbon::parse(Input::get('selesai'));
      $ac->save();
      Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/'.Auth::user()->role.'/activity');
    }

    public function destroy($id){
      $ac = Activity::find($id);
      $ac->delete();
      Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/'.Auth::user()->role.'/activity');
    }

  }

?>
