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
  //$data = $result->fetchAll();

  $sql2 = "select name from personal where login_id = '$id'";
  $name1 = $dbh->query($sql2);
  $sql2 = "select email from personal where login_id = '$id'";
  $mail1 = $pdo->query($sql2);
  $sql2 = "select id from personal where login_id = '$id'";
  $id1 = $pdo->query($sql2);


}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
var_dump($name1);
var_dump($mail1);
var_dump($id1);
echo"登録を受け付けました。\n名前：".$name1."メールアドレス:".$mail1. "ID:".$id1;
?>
