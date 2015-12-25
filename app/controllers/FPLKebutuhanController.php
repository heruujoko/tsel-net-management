<?php
	
	class FPLKebutuhanController extends \BaseController {

		public function storefromajax(){

			$fplk = new FPLKebutuhan;
			$fplk->details = Input::get('details');
			$fplk->save();

			return Response::json($fplk);

		}

	}

?>