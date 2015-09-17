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

  <?php
  $x = $data[0][4];

  foreach($data as $tmp){
    if($x == $tmp[4]){
    $child = $tmp[7];
    echo $child;
  }



  ?>
  <table>
    <tr>
      <td>県</td>
      <td>スキー場</td>
      <td>参加者</td>
    </tr>

  </table>

</body>
</html>
