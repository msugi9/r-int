<?php
session_start();
$database_url = "postgres://kikflxevlqickd:2k4rCJxU0oMOH6OOWWSEiqH1mY@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d6h4ep9bna3r8i";
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
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>User Top</title>

  <!-- Bootstrap -->
  <link href="../bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

      <div class="page-header page-header">
        <h1><span class="label label-warning label-inline">楽々スノボ</span></h1>
        <h1 style="text-align: center">
         <span class="text-info text-inline" style="text-align: center">
           <?php echo $name[0]["name"]; ?>様のトップページ
         </span>
       </h1>
     </div>

     <div class="container">
      <table class="table" border="1" align="center">

       <tr>
         <th class="warning"><a href="/company/itemregist.php">アイテム登録</a><br>
           <div class="well well-lg">レンタルする品物の登録をこちらで行う事ができます</div>
         </th>
         <!--<th><a href="">企業データ変更</a></th>-->
         <th class="warning"><a href="/company/order.php">注文一覧</a><br>
           <div class="well well-lg">顧客からの申し込みをこちらで確認する事ができます</div>
         </th>
       </tr>
       <tr>
         <th class="warning">
          <a href="/company/company_form">企業データ変更</a><br>
          <div class="well well-lg">企業情報の登録・更新ができます</div>
        </th>
        <th class="warning">
        </th>
      </tr>
    </table>
  </div>
  <div style="margin-top: 30px;text-align: center">
    <p>
     <button type="button" class="btn btn-primary" onclick="location.href='/top/logoutc.php'">ログアウト</button>
   </p>
 </div>
</body>
</html>

