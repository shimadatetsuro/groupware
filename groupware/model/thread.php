<?php
class Thread {
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
    //スレッドテーブルからすべてのカラムを取得
    public function threadToplist(){
        $query = 'SELECT * FROM thread';
        $stmt = $this -> db ->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //::FETCH_ASSOCはカラム名=>値のみで配列を返してくれる(デフォルトは0,1,2...=>値でもできるため重い)
        return $result;
    }


}



?>