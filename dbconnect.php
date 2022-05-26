<?php

require_once "./env.php";
ini_set("desplay_errors",true);
function connect()
{
    $host = DB_HOST;
    $db   = DB_NAME;
    $user = DB_GCC;
    $pass = DB_PASS;

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try{
        $pdo = new PDO($dsn,$user,$pass,[
            PDO::ATTR_ERRMODE => PDO ::ERRMODE_EXCEPTION, //エラーのモードを決める
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO ::FETCH_ASSOC //FETCHMODE配列をキーとバリューで必ず返す
    ]);
        echo "成功";
    }catch(PDOException $e){
        echo "接続失敗".$e->getMessage();
        exit();
    }
    //エラーをキャッチするためにトライキャッチで囲む！！

}

echo connect();
