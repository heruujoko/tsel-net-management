<?php
	
	class PJLainController extends \BaseController {

		public function storefromajax(){
			$pjl = new PJLain;
			$pjl->detail = Input::get('details');
			$pjl->jumlah = Input::get('biaya');
			$pjl->save();

			return Response::json($pjl);
		}

	}

?>