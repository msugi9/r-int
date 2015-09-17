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
    <h1><span class="label label-warning">会員招待</span></h1>
  </div>

  <!-- タイトル -->

    <form action="./mailing.php" method="post">
      招待する人のURLを入力して下さい。
      <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 2px 0pt 0pt 0px;">
	      <tr>
	          <td bgcolor="#afafaf  ">
	              <table width="100%" border=0 cellspacing=1 cellpadding=5 style="font-size: 12px;">
	                  <tr>
		              <td style="background-color: #eeeeee  ;">招待するメールアドレス</td>
		              <td style="background-color: #ffffff  ;">
		                  <input type="text" name="mail_1" size="30">
		              </td>
	                  </tr>
	              </table>
	          </td>
	      </tr>
          </table>
      確認のためもう一度入力して下さい。
    <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 5px 0pt 0pt 0px;">
            <tr>
	        <td bgcolor="#afafaf  ">
	            <table width="100%" border=0 cellspacing=1 cellpadding=5 style="font-size: 12px;">
	                <tr>
	                    <td style="background-color: #eeeeee  ;">確認用メールアドレス</td>
	                    <td style="background-color: #ffffff  ;">
		                <input type="text" name="conf_mail_1" size="30">
	                    </td>
	                </tr>
	            </table>
	        </td>
            </tr>
        </table>
        <br> <input type="submit" name="send" value="送信" style="WIDHT: 50px;HEIGHT: 30px">
      </form>
    <a href="https://blooming-dawn-8215.herokuapp.com/top/user_top.php">TOPに戻る</a>
  </body>
  </html>
