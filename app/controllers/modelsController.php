<?php 
namespace App\Controllers;

class models extends connection{

	public function __construct(){
		parent::__construct();
	}

	public static function container(){
		return (object)[
			'user' => new \App\Models\userModel,
			'session' => new \App\Models\sessionModel,
			'resetpassword' => new \App\Models\resetpasswordModel
		];
	}
}
