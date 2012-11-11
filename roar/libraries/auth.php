<?php

class Auth {

	public static $session = 'auth';

	public static function guest() {
		return Session::has(static::$session) === false;
	}

	public static function user() {
		if($id = Session::get(static::$session)) {
			return User::find($id);
		}
	}

	public static function attempt($username, $password) {
		if($user = User::search(array('username' => $username))) {
			if(Hash::check($password, $user->password)) {
				Session::put(static::$session, $user->id);

				return true;
			}
		}

		return false;
	}

	public static function logout() {
		Session::forget(static::$session);
	}

}