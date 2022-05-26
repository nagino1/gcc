<?php
//var_dump($_POST);
//exit();

// POSTデータ確認

if (
  !isset($_POST['todo']) || $_POST['todo']=='' ||
  !isset($_POST['deadline']) || $_POST['deadline']==''
) {
  exit('データたりないよ');
}

$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

//論理積	&&	x && y	左辺も右辺もtrueの場合にtrue（左辺 かつ 右辺）
//論理和	||	x || y	左辺か右辺のどちらかがtrueの場合にtrue（左辺 または 右辺）
//論理否定	!	!x	xがtrueの場合にfalse、xがfalseの場合にtrue

// 各種項目設定
// DB接続

$dbn ='mysql:dbname=gsacf_d11_02;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'INSERT INTO todo_table (id, todo, deadline, created_at, updated_at) VALUES (NULL, :todo, :deadline, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// SQL実行の処理

header('Location:todo_input.php');
exit();