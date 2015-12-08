<?php
	class AdminController extends BaseController {
		public function dashboard(){
			$data['active'] = 'dashboard';
			return View::make('admin.dashboard' , $data);
		}
	}
?>
