<?php
	
	class MastertpController extends \BaseController {

		function storefromajax(){
			$mastertp = new Mastertp;
			$mastertp->sitelocation = Input::get('namasite');
			$mastertp->btsname = Input::get('namabts');
			$mastertp->save();
			return Response::json($mastertp);
		}

	}

?>