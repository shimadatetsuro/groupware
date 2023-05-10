<?php
require_once '../controller/login.php';
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
if($result !== false){
    $_SESSION['userinfo']['user_name'] = $result['user_name'];
    $_SESSION['userinfo']['id'] = $result['id'];
    // echo 'ようこそ'.$result['user_name'].'さん';
    header('Location: top.php');
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
<link rel="stylesheet" href="../css/style.css">
<!-- CSSここまで -->
</head>
<body class="wrap align-center">
        <div class="blue-square title">
            <p>portfolio</p>
        </div>
        <div class="blue-square sub-title ">
            <p class ="sub-title-message"><?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
            }
            ?></p>
            <form action="login.php" method="POST">
                <div class="id">
                    <p>ID</p>
                    <input type="text" name="post_id">
                </div>
                <div class="pw">
                    <p>Password</p>
                    <input type="text" name="post_pw">
                </div>
                <div class="button-shadow">
            <button value="submit" class="button">ログイン</button>
        </div>
            </form>
            <div class="button-shadow">
                    <a href="signup.php" >
                    <button class="button" type="submit">
                        新規登録
                    </button>
                    </a>
            </div>
        </div>
</body>
</html>