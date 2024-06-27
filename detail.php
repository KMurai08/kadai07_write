<?php



// DB接続
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

// SQL実行
$sql = 'SELECT * FROM writeLong';
$stmt = $pdo->prepare($sql);


try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


$no = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="main.css">
    <title>詳細ページ</title>
</head>
<body>
    
    <script>
const number = <?=json_encode($no) ?>;
console.log(number);
const resultArray = <?=json_encode($result) ?>;
console.log(resultArray[number-1].titleLong);

$(document).ready( function(){
// ページ読み込み時に実行したい処理
$(".detailTitle").html(resultArray[number-1].titleLong);
$(".detailBook").html(resultArray[number-1].bookLong);
$(".detailText").html(resultArray[number-1].textLong);
$(".detailTime").html(resultArray[number-1].createdLong);


});



</script>

<div class="detailMain">
    
<p class="detailTitle">タイトル</p>

<div class="detailText_box">
<p class="detailText">本文</p>
</div>

<div class="detailBookInfo">
<span>書籍名:</span>
<span class="detailBook">書籍名</span>
<br>
<span>ID:</span>
<span class="detailId"><?= $no ?> /</span>
<span>作成日:</span>
<span class="detailTime">時刻</span>
</div>

<div class="toTop">
<a  href="input.php">一覧へ戻る</a>
</div>

</div>


</body>
</html>