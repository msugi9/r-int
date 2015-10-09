<?php
$database_url = "postgres://dfsqpthtomggqb:vVnSt-eQ-LsScxxOqFFbvfDu1d@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d7onvm4i8i6ang";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "select  from ski_resort";
  $result = $pdo->query($sql);
  $data = $result->fetchAll();

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
