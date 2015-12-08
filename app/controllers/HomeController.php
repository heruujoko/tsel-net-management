<?php
class HomeController extends BaseController {
	public function showLogin()
	{
		return View::make('home.login');
	}
}
