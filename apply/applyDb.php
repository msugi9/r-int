<?php
$database_url = "postgres://dfsqpthtomggqb:vVnSt-eQ-LsScxxOqFFbvfDu1d@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d7onvm4i8i6ang";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$pdo = null;

session_start();
$personalId = $_SESSION["personal_id"];
$companyId = $_SESSION["company_id"];
$skiResortId = $_SESSION["ski_resort_id"];
$playDate = $_SESSION["play_date"];

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
    var_dump('$apresultのデータを登録できませんでした。<br>');
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
            var_dump($_SESSION["$prsnId"].'の$apitemresultのデータを登録できませんでした。<br>');
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
