<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "select * from personal";
  $result = $pdo->query($sql);
  $data = $result->fetchAll();
  /////////////////////////////////
  $rsql = "select * from relation";
  $rresult = $pdo->query($rsql);
  $rdata = $rresult->fetchAll();
  /////////////////////////////////
  $isql = "select * from item";
  $iresult = $pdo->query($isql);
  $idata = $iresult->fetchAll();
  /////////////////////////////////
  
  
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
session_start();
$parentUserId = $_SESSION["personal_id"]; //親ユーザのidをとってくる？？
$companyId = $_SESSION["company_id"];//レンタル会社のidもとってくる？？
foreach($data as $tmp){
  if($tmp['id']==$parentUserId)$userName = $tmp['name'];
}
?>
<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>メンバー決定</title>
  </head>
  <body>
    <center>
    <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
      <tr><td><?php echo $userName; ?>さんの知り合い</td></tr>
    </table>
    参加者を選択しましょう！<TMPL_VAR NAME=HOME>
    <form action="./apply.php" method  ="post">
      <!--for文的な？-->
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <?php foreach ($rdata as $relationData) : ?>
        <?php if($relationData["parent_personal_id"]==$parentUserId) : ?>
        <?php foreach ($data as $personData) : ?>
        <?php if($personData["id"]==$relationData["child_personal_id"]) :?>
        <tr style="background-color: #ffffff  ;">
          <td align="left"><?php echo $personData['name']; ?></td>
          <td align="left"><input type="checkbox" name="prsn<?php echo $personData['id'];?>" value="1"></td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php endforeach; ?>
      </table>
      <input type="submit" value="メンバー確定">
    </form>
    </center>
  </body>
</html>