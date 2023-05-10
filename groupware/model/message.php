<?php

class Message{
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
    public function searchMessage($id){
        $query = 'SELECT users.user_name,message.text,users.thumbnail,message.create_date
        FROM message_address
        LEFT JOIN message
        ON message_address.message_id = message.id
        LEFT JOIN users
        ON message.create_user = users.id
        WHERE message_address.user_id = ?
        ORDER BY message.create_date DESC';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }


}