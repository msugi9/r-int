<!--?php
session_start();

$database_url = "postgres://kikflxevlqickd:2k4rCJxU0oMOH6OOWWSEiqH1mY@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d6h4ep9bna3r8i";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "select * from personal where id = " . $_SESSION["personal_id"];

  $result = $pdo->query($sql);
  $data = $result->fetchAll();

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
?>
-->
<html
  <html lang="en">
    <head>
		<!-->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-->
		<title>Bootstrap 101 Template</title>
    
    <!-- Bootstrap -->
		<!-->
    <link href="../bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    
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
    <h1><span class="label label-success">個人情報入力ページ</span></h1>
  </div>

  <!-- タイトル -->

  以下の欄に入力することで、お客様それぞれに合わせたサイズの用具を借りることが出来ます。

  <!-- HTMLフォーム表示 -->
  <form action="./personalinfo.php" method="post">
    <div class="container">
      <table class="table">
	<tbody>
	  <tr>
            <td>性別
	    </td>
            <td>
		<label class="radio-inline"><input type="radio" name="sex" value="true"> 男性</label>
		<label class="radio-inline"><input type="radio" name="sex" value="false" checked=""> 女性</label>
            </td>
	  </tr>
	  <tr>
            <td>住所
	    </td>
	    <td>
		<input type="text" name="address" class="form-control" placeholder="東京都2-54-3" value=<?php if($data){echo $data[0]["address"];} ?>>
            </td>
	  </tr>

	  <tr>
            <td>電話番号
	    </td>
            <td>
		<input type="text" name="tel" class="form-control" placeholder="01200000000" value=<?php if($data){echo $data[0]["tel"];} ?>>
            </td>
	  </tr>
	  <tr>
            <td>身長
	    </td>
            <td>
		<input type="text" name="height" class="form-control" placeholder="160" value=<?php if($data){echo $data[0]["height"];} ?>>
            </td>
	  </tr>
	  <tr>
            <td>体重
	    </td>
            <td>
		<input type="text" name="weight" class="form-control" placeholder="50" value=<?php if($data){echo $data[0]["weight"];} ?>>
            </td>
	  </tr>
	  <tr>
            <td>靴のサイズ
	    </td>
            <td>
		<input type="text" name="shoe_size" class="form-control" placeholder="24" value=<?php if($data){echo $data[0]["shoe_size"];} ?>>
            </td>
	  </tr>
	  
	  <tr>
            <td>小物
	    </td>
            <td>
		<label class="radio-inline"><input type="radio" name="accessory" value="true" <?php if($data[0]["accessory"]==true) {echo "checked='checked'";}?> > あり</label>
		<label class="radio-inline"><input type="radio" name="accessory" value="false" <?php if($data[0]["accessory"]==false) {echo "checked='checked'";}elseif(!$data){echo "checked='checked'";} ?>> なし</label>
            </td>
	  </tr>
	  <tr>
             <td>ウェア
	    </td>
            <td>
		<label class="radio-inline"><input type="radio" name="wear" value="true" <?php if($data[0]["wear"]==true) {echo "checked='checked'";}?> > あり</label>
		<label class="radio-inline"><input type="radio" name="wear" value="false" <?php if($data[0]["wear"]==false) {echo "checked='checked'";}elseif(!$data){echo "checked='checked'";} ?>> なし</label>
            </td>
	  </tr>
	  <tr>
             <td>ボード
	    </td>
            <td>
		<label class="radio-inline"><input type="radio" name="board" value="true" <?php if($data[0]["wear"]==true) {echo "checked='checked'";}?> > あり</label>
		<label class="radio-inline"><input type="radio" name="board" value="false" <?php if($data[0]["wear"]==false) {echo "checked='checked'";}elseif(!$data){echo "checked='checked'";} ?>> なし</label>
            </td>
	  </tr>
	</tbody>
      </table>
      <p>
	<button type="submit" name="submit" value="更新" class="btn btn-primary">更新</button>
	<button type="button" class="btn btn-default" onclick="location.href='/top/user_top.php'">戻る</button>
      </p>
    </div>
    
    <br>
    </form>

  <!-- HTMLフォーム表示 -->
</body>
</html>

