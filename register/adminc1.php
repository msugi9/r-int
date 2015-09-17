<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
try{

  //データベースに接続

  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  $sql = "select id,name from ski_resort";
  $result = $pdo->query($sql);
  $ski_resort = $result->fetchAll();



}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
 ?>
<HTML>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>楽々スノボ登録ページ</title>
      
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

<FORM action="adminc.php" method="post" style="margin: 0px 25%">
	<div class="page-header">
	  <h1><span class="label label-warning label-inline">楽々スノボ</span></h1>
	  <h1 class="text-primary" style="text-align: center">
	    <span class="text-info text-inline" style="text-align: center">
	      楽々スノボ　新規登録(企業用)
	    </span>
	  </h1>
	</div>
	<br>
	<div class="input-group">
	  <span class="input-group-addon"> company name</span>
	  <input type="text" name="name" class="form-control" placeholder="who">
	</div>
	<br>
	<div class="input-group">
	  <span class="input-group-addon"> login id</span>
	  <input type="text" name="id" class="form-control" placeholder="***">
	</div>
	<br>
	<div class="input-group">
	  <span class="input-group-addon"> login password</span>
	  <input type="text" name="password" class="form-control" placeholder="***">
	</div>
	<br>
	<div class="input-group">
	  <span class="input-group-addon"> responsible person's name</span>
	  <input type="text" name="charge" class="form-control" placeholder="who">
	</div>
	<br>
	<div class="input-group">
	  <span class="input-group-addon"> email</span>
	  <input type="text" name="email" class="form-control" placeholder="test@test.com">
	</div>
	<br>
	<div class="input-group">
	  <span class="input-group-addon"> address</span>
	  <input type="text" name="address" class="form-control" placeholder="東京都足立区2-**-1">
	</div>
	<br>
	<div class="input-group">
	  <span class="input-group-addon"> telphone number</span>
	  <input type="text" name="tel" class="form-control" placeholder="00001113333">
	</div>
	<br>
	place od ski<select name="ski">
	  <?php
	  foreach ($ski_resort as $value) {
	      $option = '<option value="' . $value['id'] . '">' . trim($value['name']) . '</option>';
	      echo $option;
	  }
	  ?>
	</select>
	<br>
	<p>
	  <button type="submit" name="to-roku" value="登録" class="btn btn-primary">regist</button>
	</p>

</FORM>
</HTML>
