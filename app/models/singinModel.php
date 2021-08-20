<?php 

namespace App\Models;

use App\Controllers\models,
\PDO;

class sessionModel{

    public $model;



    public function __construct(){
        $this->model = new models;
    }


    public function login($user, $password){
        try{
            $sql='SELECT * FROM users WHERE user=:user and password=:password';
            $stmt = $this->model->connect()->prepare($sql);
            $stmt->bindParam(":user", $user, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->execute();
            $resp = $stmt -> fetch();
        } catch (\Exception $e) {
            $this->model->catchError($sql, $e);
        }      
        $stmt->closeCursor(); 
        $stmt = null; 
        return $resp;
    }

}
