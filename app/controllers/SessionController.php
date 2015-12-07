<?php
	
	class SessionController extends BaseController {

		public function auth(){
			$email = Input::get('email');
			$pass = Input::get('password');
			if(Auth::attempt(array('email' => $email , 'password' => $pass))){
				return Redirect::intended('/home');
			} else {
				Session::flash('error','Invalid username or password');
				return Redirect::to('/');
			}
		}

		public function authrole(){
			$current = Auth::user();
			$role = $current->role;
			if($role == 'admin'){
				return Redirect::to('/admin');
			} else if($role == 'manager'){
				return Redirect::to('/admin');
			} else {
				Session::flash('error','Corupted user without role.');
				return Redirect::to('/');	
			}
		}

		public function logout(){
			Auth::logout();
			Session::flash('info' , 'You have successfully logged out.');
			return Redirect::to('/');
		}

	}

?>