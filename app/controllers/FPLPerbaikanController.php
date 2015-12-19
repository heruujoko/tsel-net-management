<?php
	
	class FPLPerbaikanController extends \BaseController {

		public function storefromajax(){

			$fplp = new FPLPerbaikan;
			// $fplp->fpl_id = Input::get('fpl_id');
			$fplp->details = Input::get('details');
			$fplp->save();

			return Response::json($fplp);

		}

	}

?>