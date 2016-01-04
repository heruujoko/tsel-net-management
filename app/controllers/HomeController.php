<?php
class HomeController extends BaseController {
	public function showLogin()
	{
		return View::make('home.login');
	}

	public function showScreen() {

		return View::make('home.screen');

	}

}
