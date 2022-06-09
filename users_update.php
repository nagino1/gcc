<?php
// 入力項目のチェック
// var_dump($_POST);
// exit();

if (
  !isset($_POST['username']) || $_POST['username'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == ''||
  !isset($_POST['is_admin']) || $_POST['is_admin'] == ''||
  !isset($_POST['is_deleted']) || $_POST['is_deleted'] == ''
) {
  exit('paramError');
}
$username = $_POST['username'];
$password = $_POST['password'];
$is_admin = $_POST['is_admin'];
$is_deleted = $_POST['is_deleted'];


// DB接続

include('functions.php');
$pdo = connect_to_db();

$sql = 'UPDATE users_table SET id=:id,username=:username, password=:password,is_admin=:is_admin,is_deleted=:is_deleted, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':is_deleted', $is_deleted, PDO::PARAM_STR);
$stmt->bindValue(':is_admin', $is_admin, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:users_read.php');
exit();


// SQL実行
