<?php
// var_dump($_GET);
// exit();
include("functions.php");

$id = $_GET["id"];

$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// id受け取り
$record = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($record);
// exit("");



// DB接続


// SQL実行


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理（編集画面）</title>
</head>

<body>
  <form action="users_update.php" method="POST">
    <fieldset>
      <legend>ユーザー管理（編集画面）</legend>
      <a href="users_read.php">一覧画面</a>
      <div>
        ユーザー名: <input type="text" name="id" value="<?= $record['id'] ?>">
      </div>
      <div>
        パスワード: <input type="number" name="password" value="<?= $record['password'] ?>">
      </div>
      <div>
        管理者: <input type="text" name="is_admin" value="<?= $record['is_admin'] ?>">
      </div>
      <div>
        削除キー: <input type="text" name="is_deleted" value="<?= $record['is_deleted'] ?>">
      </div>
      <div>
          <input type="hidden" name="id" value="<?= $record['id'] ?>">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>