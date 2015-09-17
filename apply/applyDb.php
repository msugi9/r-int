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
  $sdata = $sresult->fetchAll();
  $psql = "select * from personal";
  $presult = $pdo->query($psql);
  $pdata = $presult->fetchAll();
  
  $apsql = "insert into apply (personal_id, company_id, ski_resort_id, play_date) values ('$personalId','$companyId','$skiResortId','$playDate')";
  $apresult = $pdo->exec($apsql);
  if (!$apresult) {
    print('データを登録できませんでした。');
  }
  //sql文
  $apidsql = "select id from apply where person_id =".$personalId." and play_date = ".$playDate;
  $apidresult = $pdo->query($apidsql);
  $apiddata = $apidresult->fetchAll();
  echo "<pre>";
  print_r($apiddata);
  echo "-----</pre>";
  
  foreach ($pdata as $personData){
    $prsnId = "prsn" .$personData['id'];
    if($_SESSION["$prsnId"]){
      foreach($itemCode as $item){
        $itemId = $item['name'].$personData['id'];
        $whichItem=$item['id'];
        if($_SESSION["$itemId"]){
          $apitemsql = "insert into apply_item (apply_id, personal_id, item_code) values ('$apidata','$personalId','$whichItem')";
          $apitemresult = $pdo->exec($apitemsql);
          if (!$apitemresult) {
            print('データを登録できませんでした。');
          }
        }
      }
    }
  }
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
echo"登録を受け付けました。";
?>
