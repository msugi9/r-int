<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$pdo = null;

session_start();
$personalId = $_SESSION["personal_id"];
$companyId = $_SESSION["company_id"];
$skiResortId = $_SESSION["ski_resort_id"];
$playDate = $_SESSION["play_date"];

$userId = ($_POST["address"]);
$itemId = ($_POST["tel"]);
$ski = ($_POST["ski"]);

try{
  
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $ssql = "select * from ski_resort";
  $sresult = $pdo->query($ssql);
  $persdata = $sresult->fetchAll();
  
  $apsql = "insert into apply (personal_id, company_id, ski_resort_id, play_date) values ('$personalId','$companyId','$skiResortId','$playDate')";
  $apresult = $pdo->exec($apsql);
  if (!$apresult) {
    exit('データを登録できませんでした。');
  }
  /*
  foreach($data as $tmp)//applu_itemのDBへの入力。無理だすまん。
  if(1){
    $apisql = "insert into apply_item values ( '$_POST[""],'$_POST[""]','$_POST[""]')";
    $result = $pdo->exec($sql);
  }
  */
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
echo"登録を受け付けました。";
?>
