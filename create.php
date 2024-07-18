<?php

session_start();
include("functions.php");
check_session_id();

// var_dump($_FILES["file"]);
// exit();

if (
  !isset($_POST['titleLong']) || $_POST['titleLong'] === '' ||
  !isset($_POST['bookLong']) || $_POST['bookLong'] === '' ||
  !isset($_POST['textLong']) || $_POST['textLong'] === '' 
 
) {
  exit('ParamError');
}

$titleLong = $_POST['titleLong'];
$bookLong = $_POST['bookLong'];
$textLong = $_POST['textLong'];
$targetDirectory = 'Images/';
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDirectory.$fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// 各種項目設定
$dbn ='mysql:dbname=writes_proto;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($fileName)){
    $arrImageTypes = array('jpg','png','jpeg','gif','pdf');
    if (in_array($fileType,$arrImageTypes)){
        $postImageForServer = move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath);

        if($postImageForServer){
$sql = "INSERT INTO writeLong (id, file_name, titleLong, bookLong, textLong, createdLong, updatedLong) VALUES (NULL, '" . $fileName. "', :titleLong, :bookLong, :textLong, now(), now())";




          }
    }
}

// $sql = 'INSERT INTO writeLong (id, file_name, titleLong, bookLong, textLong, createdLong, updatedLong) VALUES (NULL, :titleLong, '" . $fileName. "', :bookLong, :textLong, now(), now())';

// $stmt = $pdo->prepare($insert);

// $stmt->bindValue(':titleLong', $titleLong, PDO::PARAM_STR);
// $stmt->bindValue(':bookLong', $bookLong, PDO::PARAM_STR);
// $stmt->bindValue(':textLong', $textLong, PDO::PARAM_STR);


$stmt = $pdo->prepare($sql);

$stmt->bindValue(':titleLong', $titleLong, PDO::PARAM_STR);
$stmt->bindValue(':bookLong', $bookLong, PDO::PARAM_STR);
$stmt->bindValue(':textLong', $textLong, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}




header('Location:input.php');
exit();
?>