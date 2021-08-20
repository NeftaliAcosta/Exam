<?php 

namespace App\Controllers;

class sessionnController{

	/**
	 * User id
	 * @var integer
	 */
	private $userid;
	/**
	 * Session id
	 * @var string
	 */
	private $sessionid;

	public function __construct(){
		if(isset($_SESSION['userid']) && isset($_SESSION['sessionid'])){
			$this->userid = (int) $_SESSION['userid'];
			$this->sessionid = (string) $_SESSION['sessionid'];
		}

	}

	/**
	 * Create the session variables 
	 * @param  string $user     User login
	 * @param  string $password Password login
	 */
	public function login(string $user, string $password){
		$data = models::container()->session->login($user, $password);
		if(!empty($data)){
			$_SESSION['userid'] = $data['id'];
			$_SESSION['sessionid'] =  session_id();
		}
	}

	/**
	 * Destroy session variables 
	 */
	public function logout(){
		session_destroy();
	}

	/**
	 * Check if the current session is valid 
	 * @return boolean
	 */
	public function check(){
		if($this->userid !== NULL and $this->sessionid !== NULL){
			return true;
		}else{
			return false;
		}
	}
	/**
	 * Get session code
	 * @return string session code
	 */
	public function getSession(){
		return $this->sessionid;
	}
}
