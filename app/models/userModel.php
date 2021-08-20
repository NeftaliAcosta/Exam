<?php 

namespace App\Models;

use App\Controllers\models,
\PDO;

class userModel{

    public $model;



    public function __construct(){
        $this->model = new models;
    }


    public function getUser($id){
        try{
            $sql='SELECT * FROM users WHERE id = :id';
            $stmt = $this->model->connect()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $resp = $stmt -> fetch();
        } catch (\Exception $e) {
            $this->model->catchError($sql, $e);
        }      
        $stmt->closeCursor(); 
        $stmt = null; 
        return $resp;
    }

    public function updateUser(int $id, String $user, String $email, String $password){
        try{
            $sql='update users set user=:user, email=:email, password=:password where id=:id';
            $stmt = $this->model->connect()->prepare($sql);
            $stmt->bindParam(":user", $user, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\Exception $e) {
            $this->model->catchError($sql, $e);
        }      
        $stmt->closeCursor(); 
        $stmt = null; 
        return true;
    }

    public function createUser(String $user, String $email, String $password){
        try{
            $sql='insert into users (user, email, password)  values(:user,:email,:password)';
            $stmt = $this->model->connect()->prepare($sql);
            $stmt->bindParam(":user", $user, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            $this->model->catchError($sql, $e);
        }      
        $stmt->closeCursor(); 
        $stmt = null; 
        return true;
    }

}
