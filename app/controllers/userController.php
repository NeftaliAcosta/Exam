<?php 

	namespace App\Controllers;


	class userController{

		private $id;
		private $user;
		private $email;
		private $password;


		public function __construct(int $idusuario = NULL){ 
			$data = models::container()->user->getUser($idusuario);
			if(!empty($data)){
				$this->id = $data['id'];
				$this->user = $data['user'];
				$this->email = $data['email'];
				$this->password = $data['password'];
			}
		}

		/**
		 * Get user name
		 * @return string user
		 */
		public function getUser():string{
			return $this->user;
		}
		/**
		 * Get user email
		 * @return string email
		 */
		public function getEmail():string{
			return $this->email;
		}
		/**
		 * Get user password
		 * @return string password
		 */
		public function getPassword():string{
			return $this->password;
		}

		/**
		 * Set a new user name
		 * @param String $valor User name
		 */
		public function setUser(String $valor){
			$this->user = $valor;
			return $this;
		}
		/**
		 * Set a new user email
		 * @param String $valor User email
		 */
		public function setEmail(String $valor){
			$this->email = $valor;
			return $this;
		}
		/**
		 * Set a new password
		 * @param String $valor User password
		 */
		public function setPassword(String $valor){
			$this->password = $valor;
			return $this;
		}


		/////Functional methods 
		
		 /**
		  * Updates the data of the instantiated user in the database 
		  * @return boolean
		  */
		public function update(){
			models::container()->user->updateUser(
				$this->id,
				$this->user,
				$this->email,
				$this->password
			);
			return true;
		}

		public function create(string $user, string $email, string $password){
			models::container()->user->createUser(
				$user,
				$email,
				$password
			);
			return true;
		}
	}
