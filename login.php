<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./css/main.css">
    <title>ログイン</title>
</head>
<body>
  <div class="wapper">
    <div class="common_header">
   <h1>ログイン</h1>
</div>
<div class="common_form_wrapper">
   <form action="login_act.php" method="POST">
    <div>
    アカウント名：<input type="text" name="username">
    </div>
    <div>
パスワード：<input type="text" name="password">
</div>
<div>
<button class="common_button form_button">ログイン</button>
</div>
   <div class="form_link"> <a href="register.php">新規登録はコチラ</a></div>
   <div class="form_link"> <a href="input.php">ログインせずに見出しだけ見る</a></div>

   </form> 
</div>
  <footer>
    <p>ー２０２４ー</p>
  </footer>
  </div>
</body>
</html>