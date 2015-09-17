<?php
// セッションの開始
    session_start();
    // セッション変数の初期化
    $_SESSION = array();
    // セッションファイルの削除
    session_destroy();

    header( "refresh:2;url=/register/loginp.php" );
?>

<<html>
<head>
  <title>ログアウト</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
  ログアウトしました。<br>
  ２秒後にリダイレクトします。

</body>
</html>