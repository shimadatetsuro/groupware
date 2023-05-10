<?php

class User {
    private $db;

    public function __construct(){
        try{
            $this->db = new PDO(
            'mysql:host=localhost;dbname=groupware',
            'livebusiness',
            'password'
        );
        }catch(PDOExeption $e){
        echo 'DB接続失敗' . $e->getMessage();
        exit;
        }
    }


    public function insertUser($array){
        $query = '  INSERT INTO `users` (`user_id`, `password`, `user_name`) 
                    VALUES (?,?,?)';
        $stme = $this->db->prepare($query);
        $stme->execute($array);
    }

    public function searchUser($postId,$postPw){
        $query= 'SELECT * FROM users WHERE user_id = ? AND password = ?';
        $stmt = $this-> db -> prepare($query);
        //$stmt->execute([$postId,$postPw]);
        $stmt ->bindParam(1,$postId,PDO::PARAM_STR);
        $stmt-> bindParam(2,$postPw,PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt-> fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}



