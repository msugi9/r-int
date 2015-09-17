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
  $sql = "select login_password from company where login_id ='$id'";
  $result = $pdo->query($sql);
  $pass1 = $result->fetchAll();
  //$pass1 = (string)$data[0];


}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}


  if(trim($pass1[0]['login_password']==$pass)echo"ログインに成功しました。";
  else echo"失敗しました。"
?>
