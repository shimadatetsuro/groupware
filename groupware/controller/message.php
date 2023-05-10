<?php require_once('../model/message.php');
if(isset($_SESSION['userinfo']['id'])){
    $id = htmlspecialchars($_SESSION['userinfo']['id'],ENT_QUOTES,'UTF-8');
  }
$messageList = new Message;
$topMessageList = $messageList -> searchMessage($id);



?>