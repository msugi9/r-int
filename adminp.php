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

  $sql2 = "select * from personal where login_id = '$id'";
  $data = $pdo->query($sql2);



}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

echo"登録を受け付けました。\n名前：$data['name']\nメールアドレス:$data['email'] ID:$data['id']";
?>
