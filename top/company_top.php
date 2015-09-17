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
  $sql = "select name from company where id = " . $_SESSION["company_id"];

  $result = $pdo->query($sql);
  $name = $result->fetchAll();

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
?>

<html>
<head>
  <title>User Top</title>
</head>
<body>
  <h1 style="text-align: center">
     <?php echo $name[0]["name"]; ?>様のトップページ
  </h1>

  <table border="1" align="center">
    <tr>
      <th><a href="/company/itemregist.php">アイテム登録</a></th>
      <!--<th><a href="">企業データ変更</a></th>-->
      <th><a href="/company/order.php">注文一覧</a></th>
    </tr>
    <tr>
      <th>
        <a href="/company/company_form">企業データ変更</a>
      </th>
    </tr>
  </table>
  <div style="margin-top: 30px;text-align: center">
    <button type="button" class="btn btn-primary" onclick="location.href='/top/logoutc.php'">ログアウト</button>
  </div>
</body>
</html>
