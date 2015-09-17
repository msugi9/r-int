<?php
session_start();
try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "select * from personal where id = " . $_SESSION["personal_id"];
  $result = $pdo->query($sql);
  $data = $result->fetchAll();

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
    <?php $data["name"] ?>さんのトップページ
  </h1>
  <table border="1" align="center">
    <tr>
      <th><a href="">レンタル申し込み</a></th>
      <th><a href="">招待</a></th>
    </tr>
    <tr>
      <th><a href="">過去データ</a></th>
      <th><a href="">個人データ変更</a></th>
    </tr>
  </table>
  <div style="margin-top: 30px;text-align: center">
    <a href="">ログアウト</a>
  </div>
</body>
</html>