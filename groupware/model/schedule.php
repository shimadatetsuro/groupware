<?php

class Schedule{
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

    public function searchSuchedule($id,$date){
        $query = 'SELECT schedule.*,schedule_participant.user_id 
        FROM schedule 
        LEFT JOIN schedule_participant 
        ON schedule.id = schedule_participant.schedule_id
        WHERE schedule_participant.user_id = ?
        AND DATE(schedule.event_start) = ?';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id,$date]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }


}



?>