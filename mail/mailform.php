<?php
session_start();

?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>招待ページ</title>

  <!-- Bootstrap -->
  <link href="/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body bgcolor="#fffacd  " TEXT="#333333  " LINK="#3333cc  ">

  <!-- タイトル -->
  <div class="page-header">
    <h1><span class="label label-danger">会員招待</span></h1>
  </div>

  <!-- タイトル -->

    <form action="./mailing.php" method="post">
      招待する人のURLを入力して下さい。
      <div class="input-group">
	<span class="input-group-addon">招待するメールアドレス</span>
	<input type="text" name="mail_1" class="form-control" placeholder="test@test.com">
      </div>
      確認のためもう一度入力して下さい。
      <div class="input-group">
	<span class="input-group-addon">招待するメールアドレス(確認用)</span>
	<input type="text" name="conf_mail_1" class="form-control" placeholder="test@test.com">
      </div>

      <p>
	<button type="submit" name="send" value="送信" class="btn btn-primary">送信</button>
	<button type="button" class="btn btn-default" onclick="location.href='/top/user_top.php'">TOPに戻る</button>
      </p>

      </form>
  </body>
  </html>
