<?php
$database_url = "postgres://dfsqpthtomggqb:vVnSt-eQ-LsScxxOqFFbvfDu1d@ec2-54-204-25-54.compute-1.amazonaws.com:5432/d7onvm4i8i6ang";
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
  ///////////////////////////
  $itemsql = "select * from item";
  $itemresult = $pdo->query($itemsql);
  $itemdata = $itemresult->fetchAll();
  
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

session_start();
$itemCode = array(
'id'=>'1','name'=>'acce',
'id'=>'2','name'=>'board',
'id'=>'3','name'=>'wear',
);

foreach($itemdata as $tmp){
  if($tmp["company_id"]==$_SESSION["company_id"]){
    if($tmp["item_code"]==2)$bPrice=$tmp["item_fee"];
    else if($tmp["item_code"]==3)$wPrice=$tmp["item_fee"];
    else if($tmp["item_code"]==1)$aPrice=$tmp["item_fee"];
  }
}
?>

<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>レンタル品確認</title>
  </head>
  <body>
    <center>
    これでいい？？？？？？？
    <form action="./applyDb_escape.php" method="post">
      <!--for文的な？-->
      <center>
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <tr>
          <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
            <tr>
              <td>氏名</td> <td>板ブーツ</td> <td>ウェア</td> <td>小物</td> <td>小計</td>
            </tr>
            <?php $_SESSION["priceAll"]=0; ?>
            <?php foreach ($data as $personData) : ?>
            <?php $prsnId = "prsn" .$personData['id'];?>
            <?php if($_POST["$prsnId"]) :?>
            <?php 
            $prsnId = "prsn" .$personData['id'];
            $boardId = "board".$personData['id'];
            $wearId = "wear".$personData['id'];
            $acceId = "acce".$personData['id'];
            $priceId = "price" .$personData['id'];//一人分の金額
            $_SESSION["$priceId"]=0;
            ?>
            <tr style="background-color: #ffffff  ;">
              <td align="left"><?php echo $personData['name']; ?></td>
              <td align="center"><?php if($_POST["$boardId"]){echo "○";$_SESSION["$priceId"]+=$bPrice;}else{echo "×";}?></td>
              <td align="center"><?php if($_POST["$wearId"]){echo "○";$_SESSION["$priceId"]+=$wPrice;}else{echo "×";}?></td>
              <td align="center"><?php if($_POST["$acceId"]){echo "○";$_SESSION["$priceId"]+=$aPrice;}else{echo "×";}?></td>
              <td align="right">￥<?php echo $_SESSION["$priceId"]; ?></td>
            </tr>
            <?php
            ////sessionに1か0が入るはず///
            $_SESSION["$boardId"]=$_POST["$boardId"];
            $_SESSION["$wearId"]=$_POST["$wearId"];
            $_SESSION["$acceId"]=$_POST["$acceId"];
            ?>
            <?php 
            $_SESSION["priceAll"] += $_SESSION["$priceId"]; 
            ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </table></tr>
        <tr><td align="right">合計  ￥<?php echo $_SESSION["priceAll"]; ?></tr>
        </table>
        </center>
        <!--for文的な？-->
        
        <input type="hidden" name="id" value="1">
        <input type="submit" value="申し込む">
      </form>
      </center>
    </body>
  </html>
