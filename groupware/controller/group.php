<?php require_once('../model/group.php');
if(isset($_SESSION['userinfo']['id'])){
    $id = htmlspecialchars($_SESSION['userinfo']['id'],ENT_QUOTES,'UTF-8');
  }
$topGroup = new Group;
$topGroupMember = $topGroup ->searchGroupMember($id)

?>