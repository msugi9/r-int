<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));


$pdo = null;
$name= ($_POST["name"]);
$id = ($_POST["id"]);
$pass = ($_POST["password"]);
$charge = ($_POST["charge"]);
$mail = ($_POST["mail"]);
$address = ($_POST["address"]);
$tel = ($_POST["tel"]);
$ski = ($_POST["ski"]);
try{

  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "insert into company (name,login_id,login_password,mail_address,charge,address,tel,ski_resort_id) values ( '$name','$id','$pass','$mail','$charge','$address','$tel','$ski')";

  $result = $pdo->exec($sql);
  //$data = $result->fetchAll();
/* $pdo = null;
$pdo = new PDO($dsn, $url['user'], $url['pass']);
  $sql2 = "select name from company where id = 1";
  $result1 = $pdo->query($sql2);
  $name1 = $result1->fetchAll();

echo $name1;*/

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
echo"登録を受け付けました。";
?>
