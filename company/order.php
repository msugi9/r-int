<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

session_start();
try{
    
    //データベースに接続
    
    $pdo = new PDO($dsn, $url['user'], $url['pass']);
    $sql = "select id,name from ski_resort";
    $result = $pdo->query($sql);
    $ski_resort = $result->fetchAll();
}catch(PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
//var_dump($_SESSION["personal_id"])
?>

<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>注文一覧</title>
  </head>

  <body bgcolor="#ffffff  " TEXT="#333333  " LINK="#3333cc  ">
    <!-- タイトル -->
    <h1 style = "font-size: 16px; font-weight: bold;">注文一覧</h1>
    <!-- タイトル -->

    以下の欄に受注された注文を表示します。
    
  </body>
</html>