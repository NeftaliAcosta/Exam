<?php 

namespace App\Controllers;

class routeController{
	private $page;

	public function __construct(){
		
		if(isset($_GET['page'])){
			$this->page = $_GET['page'];
		}else{
			$this->page = "home";
		}
	}

	public function init(){
		self::page();	
	}

	private function page(){
		switch ($this->page) {
			case 'home':
			require __DIR__.'..../../../app/views/home.php';
			break;

			case 'signin':
			require __DIR__.'..../../../app/views/signin.php';
			break;

			case 'signup':
			require __DIR__.'..../../../app/views/signup.php';
			break;

			case 'signout':
			require __DIR__.'..../../../app/views/signout.php';
			break;

			case 'lost-password':
			require __DIR__.'..../../../app/views/lost-password.php';
			break;

			case 'user':
			require __DIR__.'..../../../app/views/user.php';
			break;

			default:
			require __DIR__.'..../../../app/views/error404.php';
			break;
		}
	}
}
