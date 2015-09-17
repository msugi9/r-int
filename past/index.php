<?php
session_start();

$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "select * from apply,relation,ski_resort where apply.id = relation.apply_id and apply.ski_resort_id = ski_resort.id and apply.personal_id = " . $_SESSION["personal_id"];

  $result = $pdo->query($sql);
  $data = $result->fetchAll();

  echo "<pre>";
  var_dump($data);
  /*
  $pdo =null;
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "select name from personal where id =". $data[c][7];
  $result = $pdo->query($sql);
  $nam[c] = $result->fetchAll();
*/
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
?>


<html>
<head>
  <title>過去のデータ</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<table>
  <tr>
    <td>スキー場</td>
    <td>参加者</td>
  </tr></table></body></html><?php
  $x = $data[0]["play_date"];
  echo $x;
foreach($data as $tmp){
    if($x == $tmp["play_date"]){
      echo $tmp["name"];
    try{
      //データベースに接続
      $pdo = new PDO($dsn, $url['user'], $url['pass']);
      //sql文


      $pdo =null;
      $pdo = new PDO($dsn, $url['user'], $url['pass']);
      //sql文
      $sql = "select name from personal where id =". $tmp[7];
      $result = $pdo->query($sql);
      $nam = $result->fetchAll();
      echo $nam[0][0]."  ";

    }catch(PDOException $e){
      print('Error:'.$e->getMessage());
      die();
    }
  }

    echo $x;
    if($x != $tmp["play_date"]){
      $x = $tmp["play_date"];
      if($x == $tmp["play_date"]){
      echo $tmp["name"];
    try{
      //データベースに接続
      $pdo = new PDO($dsn, $url['user'], $url['pass']);
      //sql文


      $pdo =null;
      $pdo = new PDO($dsn, $url['user'], $url['pass']);
      //sql文
      $sql = "select name from personal where id =". $tmp[7];
      $result = $pdo->query($sql);
      $nam = $result->fetchAll();
      echo $nam[0][0]."  ";

    }catch(PDOException $e){
      print('Error:'.$e->getMessage());
      die();
    }
  }
}
}




  ?>
