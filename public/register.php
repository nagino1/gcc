<?php

//errorメッセージ
$err = [];

//バリデーション
if(!$username = filter_input(INPUT_POST, "username")){
  $err[] = "ユーザー名を記入してください";
};
if(!$email = filter_input(INPUT_POST, "email")){
  $err[] = "メールアドレスを記入してください";
};

$password = filter_input(INPUT_POST, "username");
if(preg_match("/",)){

}
$password_conf = filter_input(INPUT_POST, "password_conf ");

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録完了画面</title>
</head>
<body>
    <p>ユーザー登録完了</p>
    <a href="./signup_form.php">戻る</a>
    
</body>
</html>