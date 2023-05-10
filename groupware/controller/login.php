<?php
require_once '../model/user.php';
session_start();
$postId = "";
$postPw = "";

if(isset($_POST['post_id']) && isset($_POST['post_pw'])){//もしポストされているなら
    $postId = htmlspecialchars($_POST['post_id'],ENT_QUOTES,'UTF-8');
    $postPw = htmlspecialchars($_POST['post_pw'],ENT_QUOTES,'UTF-8');

    $_SESSION['userinfo'] = [
        'user_id' => $postId,
        'pw' => $postPw
    ];
}

$loginUser = new User();
$result =  $loginUser -> searchUser($postId,$postPw);


?>