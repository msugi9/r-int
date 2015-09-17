<?php

$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$id= ($_POST["id"]);
$pass = ($_POST["password"]);
$parent_id = ($_POST["parent_id"]);

session_start();

try{

  //データベースに接続
  //sql文

  //$data = $result->fetchAll();
$pdo = new PDO($dsn, $url['user'], $url['pass']);
  $sql = "select login_password from personal where login_id ='$id'";
  $result = $pdo->query($sql);
  $pass1 = $result->fetchAll();
  //$pass1 = (string)$data[0];
  $pdo = null;
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  $sql = "select id from personal where login_id ='$id'";
  $result = $pdo->query($sql);
  $idd = $result->fetchAll();

  $pdo = null;
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  $id_sql = "select id from personal where login_id = '$id'";
  $personal = $pdo->query($id_sql);
  $personal_id = $personal->fetch();

  $pdo = null;
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  $insert = "insert into invite values('$parent_id','$personal_id')";
  $personal = $pdo->exec($insert);

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

$_SESSION["personal_id"] = $personal_id["id"];
/*var_dump($pass1);
var_dump($pass1[0][0]);
var_dump(trim($pass1[0]['login_password']));
var_dump($pass);*/
//var_dump($idd);

/*$id1=($_SESSION($idd[0]['id']));
var_dump($id1);*/
  if(trim($pass1[0]['login_password'])==$pass){
    echo"ログインに成功しました。\n";
    print_r("２秒後にリダイレクトします。");
    header( "refresh:2;url=/top/user_top.php" );
  }else{
    echo"失敗しました。";
  }
?>
