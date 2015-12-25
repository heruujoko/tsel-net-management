<?php
	
	class FPLPembelianController extends \BaseController {

		public function storefromajax(){

			$fplp = new FPLPembelian;
			$fplp->details = Input::get('details');
			$fplp->save();

			return Response::json($fplp);

		}

	}

?>