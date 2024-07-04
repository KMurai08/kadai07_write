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

// SQL作成&実行
$sql = "SELECT * FROM writeLong ORDER BY createdLong ASC";
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$output = "";
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $record) {
  

  $output .="
       <div>
       <a href='detail.php?id={$record["id"]}'>{$record["titleLong"]}</a>
       </div>

  ";
  
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <title>Document</title>
</head>
<body>
<div class="menu">
  <h1 class="logo">MENU</h1>
  <button id="showLong">書く</button>
</div>
  <div class="modal-wrapper">
    <div class="modal">      
      <div id="">
        <h2>感想記入</h2>
        <form action="create.php" method="POST">
          <div>
            <input type="text" name="titleLong" placeholder="タイトル">
          </div>
          <div>
            <input type="text" name="bookLong" placeholder="書籍名">
          </div>
          <div>
              <textarea id="textareaLong" type="text" name="textLong" placeholder="本文"></textarea>
          </div>
          <div>
            <button>送信</button>
          </div>
        </form>
        <button id="close">閉じる</button>
      </div>
    </div>
  </div>
  <div class="linkList">
     
        <ul>
          <li id="list"><?=   $output   ?></li>
        </ul>

  </div>
  <footer>
    <p>ー２０２４ー</p>
  </footer>
<script>
    $('#showLong').click(function() {
        $(".modal-wrapper").show();
    });
    $('#close').click(function() {
        $(".modal-wrapper").hide();
    })


</script>
</body>
</html>