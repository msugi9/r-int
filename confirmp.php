<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$id= ($_POST["id"]);
$pass = ($_POST["password"]);
try{

  //データベースに接続
  //sql文

  //$data = $result->fetchAll();
$pdo = new PDO($dsn, $url['user'], $url['pass']);
  $sql = "select login_password from personal where login_id ='$id'";
  $result = $pdo->query($sql);
  $data = $result->fetchAll();
  $pass1 = string($data);


}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
var_dump($pass1);
var_dump($pass);

  if($pass1==$pass)echo"ログインに成功しました。";
  else echo"失敗しました。"
?>
