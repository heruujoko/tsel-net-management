<?php
	
	class NOController extends \BaseController {

		public function dash(){
			$data['active'] = 'dashboard';
			return View::make('no/dashboard',$data);
		}

	}

?>