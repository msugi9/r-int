<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));


$pdo = null;


$personalId = ($_POST["id"]);
$companyId = ($_POST["password"]);
$skiResortId = ($_POST["charge"]);
$playDate = ($_POST["mail"]);
$userId = ($_POST["address"]);
$itemId = ($_POST["tel"]);
$ski = ($_POST["ski"]);
try{
  
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $apsql = "insert into apply (name,login_id,login_password,mail_address,charge,address,tel,ski_resort_id) values ( '$name','$id','$pass','$mail','$charge','$address',$tel,$ski)";
  $result = $pdo->exec($sql);
  
  foreach($data as $tmp)
  if(1){
    $apisql = "insert into apply_item values ( '$_POST[""],'$_POST[""]','$_POST[""]')";
    $result = $pdo->exec($sql);
  }
  
  
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
echo"登録を受け付けました。";
?>
