<?php

class Group{
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


    public function searchGroupMember($id){
        $query = 'SELECT users.user_name,users.thumbnail FROM groupmember
        LEFT JOIN grouplist
        ON groupmember.group_id = grouplist.id
        LEFT JOIN users
        ON groupmember.user_id = users.id
        WHERE grouplist.create_user = ?';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }


}