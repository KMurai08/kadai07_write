<?php
include('functions.php');

$user_id = $_GET['user_id'];
$title_id = $_GET['title_id'];

$pdo = connect_to_db();

// COUNTで数を数える
$sql = "SELECT COUNT(*) FROM like_table WHERE title_id=:title_id AND user_id=:user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':title_id', $title_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$like_count = $stmt->fetchColumn();

// データ確認
// var_dump($like_count);
// exit();

// ライクの数で条件分岐

if ($like_count !== 0){
    // いいねされてる状態
    $sql = "DELETE FROM like_table WHERE user_id=:user_id AND title_id=:title_id";
}else{
    // いいねなしの状態
    $sql ="INSERT INTO like_table(id, user_id, title_id, created_at) VALUES (NULL, :user_id, :title_id, now())";
}


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':title_id', $title_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:input.php");
exit();