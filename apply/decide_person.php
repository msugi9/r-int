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
  $rsql = "select * from relation";
  $rresult = $pdo->query($rsql);
  $rdata = $result->fetchAll();
  $isql = "select * from item";
  $iresult = $pdo->query($isql);
  $idata = $result->fetchAll();
  //  if($data){
  //    echo "<pre>";
  //    print_r($data);
  //    echo "</pre>";
  //  }
  
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

$parentUserId = $_POST["something"]; //親ユーザのidをとってくる？？
//$childrenUserId = $_POST["something"]; //子ユーザのidをとってくる？？
$companyId = $_POST["something"];//レンタル会社のidもとってくる？？

//$relationPsql = "select child_person_id from relation where parent_person_id = '$parentUserId'";
//$relationPresult = $pdo->query($relationPsql);
//$relationPdata = $relationPresult->fetchAll();

?>
<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>メンバー決定</title>
  </head>
  <body>
    <center>
    <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
      <tr>あなたの名前は<?php echo $userName?>。</tr>
    </table>
    参加者を選択してください。<TMPL_VAR NAME=HOME>
    <form action="./apply.php" method  ="post">
      <!--for文的な？-->
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <?php foreach ($data as $personData) : ?>
        <?php if($rdata['parent_personal_id']==$parentUserId) : ?>
        <tr style="background-color: #ffffff  ;">
          <td align="left"><?php echo $personData['name']; ?></td>
          <td align="left"><input type="checkbox" name="prsn<?php echo $personData['id'];?>" value="1"></td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
      </table>
      <!--for文的な？-->
      <input type="hidden" name="parentUserId" value="$parentUserId">
      <input type="hidden" name="companyId" value="$companyId">
      <input type="submit" value="メンバー確定">
    </form>
    </center>
  </body>
</html>