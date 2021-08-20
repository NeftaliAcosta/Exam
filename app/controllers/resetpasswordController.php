<?php 

namespace App\Controllers;

use App\Controllers\userController;

class resetpasswordController{
	private $usuarioid;
	private $email;

	public function checkEmail($email){
		$data = models::container()->resetpassword->checkEmail($email);
		if(!empty($data)){
			$this->usuarioid = $data['id'];
			$this->email = $data['email'];

			return true;
		}

		return false;
	}

	/**
	 * ¨Ger user id of the user requesting the password 
	 * @return [type] [description]
	 */
	public function getUserId(){
		return (int) $this->usuarioid;
	}

	/**
	 * Perform validation to update the user's password 
	 * @param  string $password1
	 * @param  string $password2 
	 * @return boolean
	 */
	public function update($password1, $password2){
		if($password1 !== $password2){
			return false;
		}else{
			$user = new userController($this->usuarioid);
			$user->setPassword($password1);
			$user->update();
			return true;
		}
	}
}