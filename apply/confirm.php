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

$personId = 1;
$numOfMember = 3;

//とりあえず全部借りる扱い
$someFlg = 1;

function check_rent($someFlg){
  if($someFlg)     $outputStr='○';
  else if($someFlg)$outputStr='×';
  else     $outputStr='△';
  
  echo $outputStr;
}
?>

<html>
  <head><title>レンタル品確認</title></head>
  <body>
    <center>
    これでいい？？？？？？？<TMPL_VAR NAME=HOME>
    <form>
      <!--for文的な？-->
      <center>
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <tr>
          <td>氏名</td> <td>板ブーツ</td> <td>ウェア</td> <td>小物</td>
        </tr>
        <?php foreach ($data as $personData) : ?>
        <?php 
        $prsnId = "prsn" .$personData['id'];
        $boardId = "board" .$personData['id'];
        $wearId = "wear" .$personData['id'];
        $acceId = "acce" .$personData['id'];
        ?>
        <tr style="background-color: #ffffff  ;">
          <td align="left"><?php echo $personData['name']; ?></td>
          <td align="center"><?php check_rent($_REQUEST['$boardId']);?></td>
          <td align="center"><?php check_rent($_REQUEST['$wearId']);?></td>
          <td align="center"><?php check_rent($_REQUEST['$acceId']);?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      </center>
      <!--for文的な？-->
      
      
      <input type="submit" value="申し込む">
    </form>
    </center>
  </body>
</html>