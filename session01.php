<?php

session_start();

// セッション変数に値を代入
$_SESSION['keyword'] = ["JS","PHP","SQL"];
$_SESSION["USER"]="dio";

echo $_SESSION['keyword'];
exit();

?>