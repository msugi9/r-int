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

//$userId = ;
//$relatedPerson = ;
$personId = 1;
$numOfMember = 3;
?>
<html>
  <head><title>レンタル品選択</title></head>
  <body>
    <center>
    レンタル品とその数を確認してください<TMPL_VAR NAME=HOME>
    <form action="./confirm.php" method  ="post">
      <!--for文的な？-->
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        echo '<tr>';
          echo '<td>氏名</td><td>板ブーツ</td><td>ウェア</td><td>小物</td>';
        echo '</tr>';
        <?php
        for($personId;$personId<$numOfPerson;$personId++){
          echo '<tr>';
          echo '<td>名前' .$personId .'</td>';
          echo '<td><input type="checkbox" name="prsn'.$personId.'"></td>';
          echo '<td><input type="checkbox" name="boad'.$personId.'"></td>';
          echo '<td><input type="checkbox" name="wear'.$personId.'"></td>';
          echo '<td><input type="checkbox" name="acce'.$personId.'"></td>';
          echo '</tr>';
        }?>
        <?php foreach ($data as $personData) : ?>
        $prsnId = prsn<?php echo $personData['id'];?>
        <?php if($_REQUEST['$prsnId']){  ?>
          <tr style="background-color: #ffffff  ;">
            <td align="left"><?php echo $personData['name']; ?></td>
            <td><input type="checkbox" name="board<?php echo $personData['id'];?>" checked="<?php if($personData['board'])echo 'checked';?>"></td>
            <td><input type="checkbox" name="wear<?php echo $personData['id'];?>" checked="<?php if($personData['wear'])echo 'checked';?>"></td>
            <td><input type="checkbox" name="acce<?php echo $personData['id'];?>" checked="<?php if($personData['accessory'])echo 'checked';?>"></td>
          </tr>
        <?php }?>
        <?php endforeach; ?>
      </table>
      <!--for文的な？-->
      
      
      <input type="submit" value="レンタル品確定">
    </form>
    </center>
  </body>
</html>