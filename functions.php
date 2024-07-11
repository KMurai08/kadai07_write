<?php

function connect_to_db()
{
  $dbn='mysql:dbname=writes_proto;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
  }
}

// ログイン状態のチェック関数
function check_session_id()
{
  if(
  !isset($_SESSION["session_id"])||
  $_SESSION["session_id"] !== session_id()
){
header("Location:login.php");
exit();
}else{
  // セッションidの再生成
  session_regenerate_id(true);
  $_SESSION["session_id"] = session_id();
}
}
?>