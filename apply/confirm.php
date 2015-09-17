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
  
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
session_start();
$itemCode = array(
'id'=>'1','name'=>'acce',
'id'=>'2','name'=>'board',
'id'=>'3','name'=>'wear',
);?>

<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>レンタル品確認</title>
  </head>
  <body>
    <center>
    これでいい？？？？？？？
    <form action="./applyDb.php" method="post">
      <!--for文的な？-->
      <center>
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <tr>
          <td>氏名</td> <td>板ブーツ</td> <td>ウェア</td> <td>小物</td>
        </tr>
        <?php foreach ($data as $personData) : ?>
        <?php $prsnId = "prsn" .$personData['id'];?>
        <?php if($_POST["$prsnId"]) :?>
        <?php 
        $prsnId = "prsn" .$personData['id'];
        $boardId = "2a".$personData['id'];
        $wearId = "3a".$personData['id'];
        $acceId = "1a".$personData['id'];
        ?>
        <tr style="background-color: #ffffff  ;">
          <td align="left"><?php echo $personData['name']; ?></td>
          <td align="center"><?php if($_POST["$boardId"]){echo "○";}else{echo "×";}?></td>
          <td align="center"><?php if($_POST["$wearId"]){echo "○";}else{echo "×";}?></td>
          <td align="center"><?php if($_POST["$acceId"]){echo "○";}else{echo "×";}?></td>
        </tr>
        <input type="hidden" name="prsn<?php echo $personData['id'];?>" value="1">
        <?php 
        foreach($itemCode as $item){
          $itemandId=$item['name']."Id";
          $idaid=$item['id']."a".$personData['id'];
          if($_POST["$itemandId"])$_SESSION["$idaid"]=1;
          echo $idaid."a".$_SESSION['$idaid']."b".$itemandId."<br>";
        }
        ?>
        <input type="hidden" name="boardId" value="<?php echo $boardId; ?>">
        <input type="hidden" name="wearId" value="<?php echo $wearId; ?>">
        <input type="hidden" name="acceId" value="<?php echo $acceId; ?>">
        <?php endif; ?>
        <?php endforeach; ?>
      </table>
      </center>
      <!--for文的な？-->
      
      <input type="hidden" name="id" value="1">
      <input type="submit" value="申し込む">
    </form>
    </center>
  </body>
</html>