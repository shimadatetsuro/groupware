<?php
require_once '../model/user.php';
session_start();

if(isset($_POST['post_id']) && isset($_POST['post_pw']) && isset($_POST['post_name'])){//もしポストされているなら
    $postId = htmlspecialchars($_POST['post_id'],ENT_QUOTES,'UTF-8');
    $postPw = htmlspecialchars($_POST['post_pw'],ENT_QUOTES,'UTF-8');
    $postName = htmlspecialchars($_POST['post_name'],ENT_QUOTES,'UTF-8');

$array = [$postId,$postPw,$postName];
$signupUser = new User();
$result = $signupUser -> insertUser($array);

}
?>