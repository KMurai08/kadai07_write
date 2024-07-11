<?php
session_start();
include("functions.php");

  if(
  !isset($_SESSION["session_id"])||
  $_SESSION["session_id"] !== session_id()
){
  $_SESSION["username"] = "GUEST";

}else{
  // セッションidの再生成
  session_regenerate_id(true);
  $_SESSION["session_id"] = session_id();
}


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
<link rel="stylesheet" href="./css/main.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <title>Document</title>
</head>
<body>
<div class="menu">
  <div>  <span class="menu_user">USER:<?php echo $_SESSION['username'] ?></span></div>

<div>
  <button class="common_button" id="showLong">書く</button></div>
  <div>
      <button class="common_button logout_button" onclick="location.href='logout.php'">ログアウト</button>
</div>

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
  // ゲストユーザー時は書くことができない処理
const userName = <?=json_encode($_SESSION["username"])?>;
if(userName==="GUEST"){
      $('#showLong').on('click', function () {
        $(this).prop('disabled', true);
      });
}else{
// ボタンを押した時に記入ボタンを表示
    $('#showLong').click(function() {
        $(".modal-wrapper").show();
    });
    $('#close').click(function() {
        $(".modal-wrapper").hide();
    })
};




</script>
</body>
</html>