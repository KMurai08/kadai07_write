<?php
session_start();
// check_session_id();

include("functions.php");
check_session_id();

// id受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM writeLong WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="./css/main.css">
 <title>詳細ページ</title>
</head>
<body>
    
<div class="detailMain">
    
<p class="detailTitle"> <?php echo $record['titleLong'] ?> </p>

<div class="detailText_box">
<p class="detailText"> <?php echo $record['textLong'] ?> </p>
</div>

<div class="detailBookInfo">
<span>書籍名:</span>
<span class="detailBook"> <?php echo $record['bookLong'] ?> </span>
<br>
<span>ID:</span>
<span class="detailId"><?php echo $id ?> /</span>
<span>作成日:</span>
<span class="detailTime"> <?php echo $record['updatedLong'] ?> </span>

</div>
<div>
  <a class="edit_button">編集</a>
  <span>/</span>
<a class="delete_button" href="delete.php?id=<?=$id?>">削除</a>
</div>

<div class="toTop">
<a  href="input.php">一覧へ戻る</a>
</div>

</div>
<div class="modal-wrapper">
    <div class="modal">      
      <div id="">
        <h2>内容編集</h2>
        <form action="update.php" method="POST">
          <div>
            <input type="text" name="titleLong" value="<?= $record['titleLong'] ?>">
          </div>
          <div>
            <input type="text" name="bookLong" value="<?= $record['bookLong'] ?>">
          </div>
          <div>
              <textarea id="textareaLong" type="text" name="textLong" ></textarea>
          </div>
                    <div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
    </div>
          <div>
            <button onclick="location.href='update.php?id=<?=$id?>'">更新</button>
          </div>
        </form>
        <button id="close">閉じる</button>
      </div>
    </div>
  </div>
<script>
  // 編集ボタンを押した時の処理
      $('.edit_button').click(function() {
        $(".modal-wrapper").show();
    });
    $('#close').click(function() {
        $(".modal-wrapper").hide();
    })
// テキストエリアにvalueを渡す
const textLong = <?=json_encode($record['textLong'])?>;
  document.getElementById('textareaLong').value = textLong;


</script>

</body>
</html>