<?php

$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

session_start();

try{
    //データベース接続
    $pdo = new PDO($dsn, $url['user'], $url['pass']);

    $loginid=htmlspecialchars($_REQUEST['login_ID']);
    $sex=$_REQUEST['sex'];
    $pass=htmlspecialchars($_REQUEST['login_pass']);
    $height=htmlspecialchars($_REQUEST['height']);
    $weight=htmlspecialchars($_REQUEST['weight']);
    $shoe=htmlspecialchars($_REQUEST['shoe_size']);
    $accessory=$_REQUEST['accessory'];
    $wear=$_REQUEST['wear'];
    $board=$_REQUEST['board'];
    //$email=htmlspecialchars($_REQUEST['email']);

    $insert_sql = "update personal set sex = '$sex', height = '$height', weight = '$weight', shoe_size = '$shoe', accessory = '$accessory', wear = '$wear', board = '$board' where id = " . $_SESSION["personal_id"];

    $sql = $pdo->exec($insert_sql);


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
<a href="/top/user_top.php">TOPページに戻る</a>
</body>
</html>
