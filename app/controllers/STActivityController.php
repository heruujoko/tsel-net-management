<?php
	
	class STActivityController extends \BaseController {

		public function storefromajax(){
			$sta = new STActivity;
			$sta->site_id = Input::get('site');
			$sta->mulai = Carbon::parse(Input::get('mulai'));
			$sta->selesai = Carbon::parse(Input::get('selesai'));
			$sta->activity = Input::get('activity');
			$sta->save();
			return Response::json($sta);
		}

	}

?>