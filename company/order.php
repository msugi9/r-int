<?php
$database_url = "postgres://kikflxevlqickd:2k4rCJxU0oMOH6OOWWSEiqH1mY@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d6h4ep9bna3r8i";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

try{
    
    //データベースに接続
    
    $pdo = new PDO($dsn, $url['user'], $url['pass']);
    $sql = "select * from item";
    $result = $pdo->query($sql);
    
    $apply_data = $result->fetchAll();

    
}catch(PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

    session_start();


//var_dump($apply_data);
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

    <?php foreach ($apply_data as $personalData) : ?>
      <?php echo $personData["item_fee"]; ?>
    <?php endforeach; ?>
    
  </body>
</html>
