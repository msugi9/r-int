<?php
session_start();

$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$wear = $_REQUEST['wear'];
$wearPrice = $_REQUEST['wear_price'];
$board = $_REQUEST['board'];
$boardPrice = $_REQUEST['board_price'];
$accessory = $_REQUEST['accessory'];
$accessoryPrice = $_REQUEST['accessory_price'];

var_dump($wear);
var_dump($board);
var_dump($accessory);

try{
    //データベース接続
    $pdo = new PDO($dsn, $url['user'], $url['pass']);

  //if($accessory==true){
    $accessorySql = "insert into item (conpany_id,item_fee,available_flg,item_code)values(" . $_SESSION["company_id"] . ", '$accessoryPrice', '$accessory', 1)";
    $sql = $pdo->exec($accessorySql);
    $sql = null;
  //}

  //if($board==true){
    $boardSql = "insert into item (conpany_id,item_fee,available_flg,item_code)values(" . $_SESSION["company_id"] . ", '$boardPrice', '$board', 2)";
    $sql = $pdo->exec($boardSql);
    $sql = null;
  //}

  //if($wear==true){
    $wearSql = "insert into item (conpany_id,item_fee,available_flg,item_code)values(" . $_SESSION["company_id"] . ", '$wearPrice', '$wear', 3)";
    $sql = $pdo->exec($wearSql);
  //}

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

