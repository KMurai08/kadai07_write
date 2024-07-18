<?php
session_start();
include("functions.php");
check_session_id();

// var_dump($_GET);
// exit();

// id受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'DELETE FROM writeLong WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$targetDirectory = 'images/';
$imageId = $_GET['id'];

if(!empty($imageId)){

    $sql = "SELECT file_name FROM images WHERE id = ".$imageId;

    $sth = $db -> prepare($sql);
    $sth->execute();
    $getImageName = $sth->fetch();

    $deleteImage = unlink($targetDirectory.$getImageName['file_name']);

    if($deleteImage){
        $deleteRecord = $db->query("DELETE FROM images WHERE id =".$imageId);
        if($deleteRecord){
            header('Location: ' . './html/index.php', true , 303);
            exit();
        }
    }

}

header("Location:input.php");
exit();
