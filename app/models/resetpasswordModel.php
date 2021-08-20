<?php 

namespace App\Models;

use App\Controllers\models,
\PDO;

class resetpasswordModel{

    public $model;



    public function __construct(){
        $this->model = new models;
    }


    public function checkEmail($email){
        try{
            $sql='SELECT * FROM users WHERE email=:email';
            $stmt = $this->model->connect()->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
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
