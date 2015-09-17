<?php
session_start();

$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
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
echo "<pre>";
  var_dump($data);

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
?>

<html lang = "ja">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>個人情報入力ページ</title>
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
	      <div class="radio">
		<label><input type="radio" name="sex" value="true"> 男性</label>
		<label><input type="radio" name="sex" value="false" checked=""> 女性</label>
	      </div>
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
	      <div class="radio">
		<label><input type="radio" name="accessory" value="true" <?php if($data[0]["accessory"]==true) {echo "checked='checked'";}?> > あり</label>
		<label><input type="radio" name="accessory" value="false" <?php if($data[0]["accessory"]==false) {echo "checked='checked'";}elseif(!$data){echo "checked='checked'";} ?>> なし</label>
	      </div>
            </td>
	  </tr>
	  <tr>
             <td>ウェア
	    </td>
            <td>
	      <div class="radio">
		<label><input type="radio" name="wear" value="true" <?php if($data[0]["wear"]==true) {echo "checked='checked'";}?> > あり</label>
		<label><input type="radio" name="wear" value="false" <?php if($data[0]["wear"]==false) {echo "checked='checked'";}elseif(!$data){echo "checked='checked'";} ?>> なし</label>
	      </div>
            </td>
	  </tr>
	  <tr>
             <td>ボード
	    </td>
            <td>
	      <div class="radio">
		<label><input type="radio" name="board" value="true" <?php if($data[0]["wear"]==true) {echo "checked='checked'";}?> > あり</label>
		<label><input type="radio" name="board" value="false" <?php if($data[0]["wear"]==false) {echo "checked='checked'";}elseif(!$data){echo "checked='checked'";} ?>> なし</label>
	      </div>
            </td>
	  </tr>
	</tbody>
      </table>
      <p>
	<button type="submit" class="btn btn-primary">更新</button>
	<button type="button" class="btn btn-default" onclick="location.href='/top/user_top.php'">戻る</button>
      </p>
    </div>
    
    <br>
    </form>

  <!-- HTMLフォーム表示 -->

</body>
</html>
