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
  <style>
table {
border-collapse: collapse;
}
td {
border: solid 1px;
padding: 0.5em;
}
</style>

  <?php
  $x = $data[0]["play_date"];?>
  <caption><?php echo $x; ?></caption>
    <tr>
    <th>名前</th>
    <th>スキー場</th>
  </tr>
    <?php
foreach($data as $tmp){?>
  <tr>
    <td><?php echo $tmp["name"];?></td><?php
    if($x == $tmp["play_date"]){
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
      ?> <td><?php echo $nam[0][0];?></td></tr><?php

    }catch(PDOException $e){
      print('Error:'.$e->getMessage());
      die();
    }
  }?></table><?php


    if($x != $tmp["play_date"]) {
      $x = $tmp["play_date"];?>
      <table><caption><?php echo $x ;?></caption><tr>
      <th>名前</th>
      <th>スキー場</th>
    </tr><?php
      if($x == $tmp["play_date"]){
      ?><td> <?php echo $tmp["name"]; ?></td><?php
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
      ?> <td><?php echo $nam[0][0]; ?></td><?php

    }catch(PDOException $e){
      print('Error:'.$e->getMessage());
      die();
    }
  }
}
}
?></table>

</body>
</html>
