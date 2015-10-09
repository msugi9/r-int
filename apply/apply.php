<?php
$database_url = "postgres://dfsqpthtomggqb:vVnSt-eQ-LsScxxOqFFbvfDu1d@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d7onvm4i8i6ang";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

session_start();

try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "select * from personal";
  $result = $pdo->query($sql);
  $data = $result->fetchAll();
  
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

$itemCode = array(
'id'=>'1','name'=>'acce',
'id'=>'2','name'=>'board',
'id'=>'3','name'=>'wear',
);
?>
<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>レンタル品選択</title>
  </head>
  <body>
    <center>
    レンタル品とその数を確認してください<TMPL_VAR NAME=HOME>
    <form action="./confirm.php" method  ="post">
      <!--for文的な？-->
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <tr bgcolor"#101010  ">
          <td>氏名</td><td>板ブーツ</td><td>ウェア</td><td>小物</td>
        </tr>
        <?php foreach ($data as $personData) : ?>
        <?php 
        $prsnId = "prsn" .$personData['id'];
        $_SESSION["$prsnId"]=1;
        ?>
        <?php if($_POST["$prsnId"]) :?>
        <tr style="background-color: #ffffff  ;">
          <td align="left"><?php echo $personData['name']; ?></td>
          <td><input type="checkbox" name="<?php echo "board".$personData['id'];?>" value="1" <?php if($personData['board']==FALSE)echo 'checked="checked"';?>></td>
          <td><input type="checkbox" name="<?php echo "wear".$personData['id'];?>" value="1" <?php if($personData['wear']==FALSE)echo 'checked="checked"';?>></td>
          <td><input type="checkbox" name="<?php echo "acce".$personData['id'];?>" value="1" <?php if($personData['accessory']==FALSE)echo 'checked="checked"';?>></td>
        </tr>
        <input type="hidden" name="prsn<?php echo $personData['id'];?>" value="1">
        <?php endif; ?>
        <?php endforeach; ?>
      </table>
      <!--/for文的な？-->
      <input type="hidden" name="parentUserId" value="<?php echo $_POST["parentUserId"]; ?>">
      <input type="hidden" name="companyId" value="<?php echo $_POST["companyId"]; ?>">
      <input type="submit" value="レンタル品確定">
    </form>
    </center>
  </body>
</html>