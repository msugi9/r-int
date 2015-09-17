<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$pdo = null;
$id = ($_POST["id"]);
$pass = ($_POST["password"]);
$name = ($_POST["name"]);
$mail = ($_POST["email"]);

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
$_SESSION["personal_id"] = $personal_id["id"]["id"];
echo "<pre>";
var_dump($personal_id);
var_dump($personal_id[0]["id"]);

print_r("登録を受け付けました。");
print_r("２秒後にリダイレクトします。");
var_dump($_SESSION["personal_id"]);

// header( "refresh:2;url=/personalinform/personalinfo.html" );
?>
