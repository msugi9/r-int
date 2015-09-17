<?php
session_start();
if($_SESSION["personal_id"]){
  header("Location:/top/user_top.php");
  exit;
}

$parent_id = ($_GET["parent"]);
?>
<HTML>
  <html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>楽々スノボログインページ</title>

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
  <FORM action="confirmp.php" method="post" style="margin: 0px 25%">
  <!-- タイトル -->
  <div class="page-header">
    <h1><span class="label label-warning label-inline">楽々スノボ</span></h1>
    <h1 class="text-primary" style="text-align: center">
	<span class="text-info text-inline" style="text-align: center">
	  楽々スノボ　ログイン(個人)
	</span>
      </h1>
  </div>

  <br>
  <div class="input-group">
	<span class="input-group-addon">login ID</span>
	<input type="text" name="id" class="form-control" placeholder="hogehoge">
  </div>
  <br>
  <div class="input-group">
	<span class="input-group-addon">login password</span>
	<input type="text" name="password" class="form-control" placeholder="hogehoge">
  </div>

<br>
<input type="hidden" name="parent_id" value=<?php echo $parent_id; ?> />
      <p>
	<button type="submit" name="login" value="login" class="btn btn-primary">login</button>
      </p>

</FORM>
</HTML>
