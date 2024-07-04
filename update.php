<?php

include('functions.php');


// var_dump($_POST);
// exit();
// 入力項目のチェック


if (
  !isset($_POST['titleLong']) || $_POST['titleLong'] === '' ||
    !isset($_POST['bookLong']) || $_POST['bookLong'] === ''||
!isset($_POST['textLong']) || $_POST['textLong'] === ''||
   !isset($_POST['id']) || $_POST['id'] === ''
 
) {
  exit('paramError');
}

$titleLong = $_POST['titleLong'];
$bookLong = $_POST['bookLong'];
$textLong = $_POST['textLong'];
$id = $_POST['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'UPDATE writeLong SET titleLong=:titleLong, bookLong=:bookLong, textLong=:textLong, updatedLong=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':titleLong', $titleLong, PDO::PARAM_STR);
$stmt->bindValue(':bookLong', $bookLong, PDO::PARAM_STR);
$stmt->bindValue(':textLong', $textLong, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);


try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:input.php");




?>