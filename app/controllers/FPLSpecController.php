<?php
	
	class FPLSpecController extends \BaseController {

		public function storefromajax(){

			$fpls = new FPLSpec;
			$fpls->details = Input::get('details');
			$fpls->save();

			return Response::json($fpls);

		}

	}

?>