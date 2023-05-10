<?php

$isError = "";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$isError = false;
if(isset($_POST['post_id'])&&($_POST['post_id'] !== "")){
    $postId = $_POST['post_id'];
}else{
    echo "<p>IDを入力してください</p>";
    $isError = true;
}
if(isset($_POST['post_pw'])&&($_POST['post_pw'] !== "")){
    $postPw = $_POST['post_pw'];
}else{
    echo "<p>PWを入力してください</p>";
    $isError = true;
}
if(isset($_POST['post_name'])&&($_POST['post_name'] !== "")){
    $postName = $_POST['post_name'];
}else{
    echo "<p>UserNameを入力してください</p>";
    $isError = true;
}

if($isError === false){
    require_once '../controller/signup.php';
    $_SESSION['user_name'] = $result['user_name'];
    $_SESSION['message'] = "登録完了しました！";
    header('Location: login.php');
}else{
    echo '入力項目が間違っています。';
}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- GoogleFontsここから -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap" rel="stylesheet">
<!-- GoogleFontsここまで -->
<!-- CSSここから -->
<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="..//css/style.css">
<!-- CSSここまで -->
</head>
<body class="wrap align-center">
        <div class="blue-square title">
            <p>portfolio</p>
        </div>
        <div class="blue-square sub-title ">
            <form action="signup.php" method="post">
                <div class="id">
                    <p>ID</p>
                    <input type="text" name="post_id">
                </div>
                <div class="pw">
                    <p>Password</p>
                    <input type="text" name="post_pw">
                </div>
                <div class="user-name">
                    <p>UserName</p>
                    <input type="text" name="post_name">
                </div>
                <div class="button-shadow">
                    <button class="button" type="submit">
                        登録
                    </button>
                </div>
            </form>
        </div>
</body>
</html>