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
   <h1>新規登録</h1>
</div>
<div class="common_form_wrapper">
   <form action="register_act.php" method="POST">
    <div>
    アカウント名：<input type="text" name="username">
    </div>
    <div>
パスワード：<input type="text" name="password">
</div>
<div>
<button class="common_button form_button">登録</button>
</div>
   <div class="form_link"> <a href="login.php">登録済みの方はコチラ</a></div>

   </form> 

</div>
  <footer>
    <p>ー２０２４ー</p>
  </footer>
  </div>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>todoリストユーザ登録画面</title>
</head>

<body>
  <form action="register_act.php" method="POST">

      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        <button>Register</button>
      </div>

  </form>

</body>

</html> -->