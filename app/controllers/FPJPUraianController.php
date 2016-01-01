<?php
	
	class FPJPUraianController extends \BaseController {

		public function storefromajax(){
			$ur = new FPJPUraian;
			$ur->uraian = Input::get('uraian');
			$ur->jumlah = Input::get('jumlah');
			$ur->save();

			return Response::json($ur);
		}

	}

?>