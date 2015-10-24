<?php
$database_url = "postgres://kikflxevlqickd:2k4rCJxU0oMOH6OOWWSEiqH1mY@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d6h4ep9bna3r8i";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$pdo = null;
$id = ($_POST["id"]);
$pass = ($_POST["password"]);
$name = ($_POST["name"]);
$mail = ($_POST["email"]);
$parent_id = ($_POST["parent_id"]);

try{

  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "insert into personal (login_id,login_password,name,email) values ( '$id','$pass','$name','$mail')";

  $result = $pdo->exec($sql);

  //auto_incrimentのpersonal_idを取得
  $id_sql = "select id from personal where login_id = '$id'";
  $personal = $pdo->query($id_sql);
  $personal_id = $personal->fetch();

  $pdo = null;
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  $insert = "insert into invite values('$parent_id'," . $personal_id["id"] . ")";
  $personal = $pdo->exec($insert);

  //$data = $result->fetchAll();
  /*$pdo = null;
$pdo = new PDO($dsn, $url['user'], $url['pass']);
  $sql2 = "select name from personal where login_id = '$id'";
  $result1 = $pdo->query($sql2);
  $name1 = $result1->fetchAll();
  */


}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
session_start();
$_SESSION["personal_id"] = $personal_id["id"];

print_r("登録を受け付けました。");
print_r("２秒後にリダイレクトします。");

header( "refresh:2;url=/personalinform/personal_form.php" );
?>
