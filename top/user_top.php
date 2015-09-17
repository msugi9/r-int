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
  $sql = "select name from personal where id = " . $_SESSION["personal_id"];

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
    <?php echo $name[0]["name"]; ?>さんのトップページ
  </h1>
  <table border="1" align="center">
    <tr>
      <th><a href="/apply/decide_person.php">レンタル申し込み</a></th>
      <th><a href="/mail/mailform.php">招待</a></th>
    </tr>
    <tr>
      <th><a href="">過去データ</a></th>
      <th><a href="/personalinform/personal_form.php">個人データ変更</a></th>
    </tr>
  </table>
  <div style="margin-top: 30px;text-align: center">
    <a href="/top/logout.php">ログアウト</a>
  </div>
</body>
</html>