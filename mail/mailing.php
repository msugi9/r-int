<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
try{
    $pdo = new PDO($dsn, $url['user'], $url['pass']);
    
    $mail=htmlspecialchars($_REQUEST['mail_1']);
    $cmail=htmlspecialchars($_REQUEST['conf_mail_1']);
    
    $subject="subjecttest";
    
    $judge=0;

    //$insert_sql="insert into() values($mail)";
    if(strcmp($mail,$cmail) != 0){
	$judge=1;
    }
    
}catch(PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

?>

<html
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    
    <!-- Bootstrap -->
    <link href="../bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  <body bgcolor="#fffacd  " TEXT="#333333  " LINK="#3333cc  ">
    <?php if($judge==1) : ?>
    <div class="panel panel-danger">
      <div class="panel-heading">
	メールの入力に間違いがあります。もう一度入力して下さい<br>
      </div>
      <div class="list-group">
	<a class="list-group-item" href="mail/mailform.php">招待ページに戻る</a>
      </div>
    </div>
    <?php endif; ?>
    <!--<h2 class="text-primary">
      <?php if($judge!=1){echo "$mail <br />";echo "招待メールを送信しました<br />";}?>
    </h2>
    <h2 class="text-normal">
      <?php if($judge!=1){print '<a href="/mail/advertising.php">招待メールを見る</a><br />';}?>
    </h2>
    <h2 class="text-normal">
      <?php if($judge!=1){print '<a href="../top/user_top.php">TOPページに戻る</a><br />';}?>
    </h2>-->
</html>
