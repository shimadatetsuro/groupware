<?php
session_start();

// echo password_hash('password',PASSWORD_DEFAULT);

$postId = "";
$postPw = "";
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
}
//エラーがないとき
if($isError ===false){
//DBに接続
try{
    $db = new PDO(
        'mysql:host=localhost;dbname=sample',
        'livebusiness',
        'password'
    );
}catch(PDOExeption $e){
    print "Couldn't connect to database:".$e->getMessage();
    exit();
}
//userテーブルのデータとPOST値が一致するかチェック
$query= 'SELECT * FROM users WHERE user_id = ? AND password = ?';
$stmt = $db -> prepare($query);
//$stmt->execute([$postId,$postPw]);
$stmt ->bindParam(1,$postId,PDO::PARAM_STR);
$stmt-> bindParam(2,$postPw,PDO::PARAM_STR);
$stmt->execute();

$result = $stmt-> fetch(PDO::FETCH_ASSOC);
// print_r($result);
//一致した場合、ログイン成功
if($result !== false){
    $_SESSION['user_name'] = $result['user_name'];
    // echo 'ようこそ'.$result['user_name'].'さん';
    header('Location: login.php');
}else{
    echo '入力項目が間違っています。';
}

}



?>

<form action="sample.php" method="POST">
    <p>ID:<input type="text" name ="post_id"></p>
    <p>PW:<input type="text" name ="post_pw"></p>
    <p><button type = "submit">ログイン</button></p>
</form>