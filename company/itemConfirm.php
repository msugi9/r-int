<?php
session_start();

$database_url = "postgres://kikflxevlqickd:2k4rCJxU0oMOH6OOWWSEiqH1mY@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d6h4ep9bna3r8i";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$wear = $_REQUEST['wear'];
$wearPrice = $_REQUEST['wear_price'];
$board = $_REQUEST['board'];
$boardPrice = $_REQUEST['board_price'];
$accessory = $_REQUEST['accessory'];
$accessoryPrice = $_REQUEST['accessory_price'];


try{
    //データベース接続
    $pdo = new PDO($dsn, $url['user'], $url['pass']);

  if($accessory=="1"){
    $accessorySql = "insert into item (company_id,item_fee,available_flg,item_code)values(" . $_SESSION["company_id"] . ", '$accessoryPrice', true, 1)";
    $sql = $pdo->exec($accessorySql);
    var_dump($accessorySql);
    var_dump($sql);
    $sql = null;
  }

  if($board=="1"){
    $boardSql = "insert into item (company_id,item_fee,available_flg,item_code)values(" . $_SESSION["company_id"] . ", '$boardPrice', true, 2)";
    $sql = $pdo->exec($boardSql);
    var_dump($boardSql);
    $sql = null;
  }

  if($wear=="1"){
    $wearSql = "insert into item (company_id,item_fee,available_flg,item_code)values(" . $_SESSION["company_id"] . ", '$wearPrice', true, 3)";
    $sql = $pdo->exec($wearSql);
    var_dump($wearSql);
  }

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
    }

?>

<html>
<head>
    <title></title>
</head>
<body>
登録しました
<br>
<a href="/top/company_top.php">TOPページに戻る</a>
</body>
</html>

