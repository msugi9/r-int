<?php
$database_url = "postgres://kikflxevlqickd:2k4rCJxU0oMOH6OOWWSEiqH1mY@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d6h4ep9bna3r8i";
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
<FORM action="adminc.php" method="post">
  <title>楽天　スノーボードレンタルサイト　登録用</title>
  <b>楽天　スノーボードレンタルサイト　登録用(会社)</b>
  <br>
会社名<input type = "text" name ="name";>
<br>
ID<input type = "text" name ="id";>
<br>
password<input type = "text" name ="password";>
<br>
責任者名<input type = "text" name ="charge";>
<br>
メール<input type = "text" name ="mail";>
<br>
住所<input type = "text" name ="address";>
<br>
TEL<input type = "text" name ="tel";>
<br>
スキー場<select name="ski">
  <?php
  foreach ($ski_resort as $value) {
    $option = '<option value="' . $value['id'] . '">' . trim($value['name']) . '</option>';
    echo $option;
  }
 ?>
</select>
<br>
<input type ="submit" name ="to-roku" value="登録";>
</FORM>
</HTML>
