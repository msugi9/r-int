<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>勧誘ページ</title>

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
    <h1><span class="label label-warning">楽々スノボ</span></h1>
  </div>

  <!-- タイトル -->
  <div class="jumbotoron">
    <div class="container">
      <h2 class="text-primary">楽天レンタルとは、あらかじめレンタルしたい用具をレンタル店に注文することで<br>
        現地に着いてすぐに用具を借りることのできるサービスです。</h2>
      </div>
    </div>


    <h2 class="text-primary">こんなことありませんか？</h2>
    <div class="well well-lg">
      ・日帰りでスキー旅行にきたのに、レンタルで時間がかかる</br>
      <br>
      ・正確なサイズを言いたくなくて、記入欄に嘘を書く・もはや書かない</br>
    </div>

    <h2 class="text-primary">楽天レンタルならその問題を解決出来ます!!</h2>

    <div class="panel panel-warning">
      <div class="panel-heading">
       個人情報登録機能
     </div>
     <div class="panel-body">
       身長や体重など、知られたくない情報を入力することで、旅先で何度もプライバシーとなる情報を入力する必要がなくなります。</br>
       入力されたデータをもとにサイズ化してレンタル店に送信するので、レンタル店側に情報が渡る事もありません。</br>
     </div>
   </div>
   <div class="panel panel-warning">
    <div class="panel-heading">
     集団申請機能
   </div>
   <div class="panel-body">
     出かける前までにレンタル申請が出来る様になったことで、レンタル店が事前に用意をして当日すぐに受け渡しする事が可能になります。</br>
     持っていない物のみを選択して選べるので、一部のスキー用品を持っている人にも便利です。
   </div>
 </div>

 <h2 class="text-primary">レンタルを利用するには</h2>

 <div class="panel panel-success">

  <div class="panel-heading">
   このサービスを利用するには、以下のリンクから必要な情報を入力して下さい
 </div>
 <div class="list-group">
   <a class="list-group-item" href="/register/adminp.html?parent=<?php echo $_SESSION["personal_id"] ?>">新規登録の方はこちら</a>
   <a class="list-group-item" href="/register/loginp.php?parent=<?php echo $_SESSION["personal_id"] ?>">既に会員の方はログインして下さい</a>
 </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
