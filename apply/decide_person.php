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
  //DBから変数をつくる
  if($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }
  
  //$userName = ;
  //$relatedUser1Name = ;
  //$relatedUser2Name = ;
  //$userName = ;
  
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

//$userId = ;
//$relatedPerson = ;
$personId = 1;
$numOfPerson = 5;
?>
<html>
  <head><title>メンバー決定</title></head>
  <body>
    <center>
    <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
      <tr>あなたの名前は<?php echo $userName?>。</tr>
    </table>
    参加者を選択してください。<TMPL_VAR NAME=HOME>
    <form action="./apply.php" method  ="post">
      <!--for文的な？-->
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <?php
        for($numOfMember=1;$numOfMember<$numOfPerson;$numOfMember++){
          echo '<tr>';
          echo '<td>名前' .$numOfMember .'</td>';
          echo '<td><input type="checkbox" name="prsn'.$numOfMember.'"></td>';
          echo '</tr>';
        }?>
        <?php foreach ($data as $personData) : ?>
        <tr style="background-color: #ffffff  ;">
          <td align="left"><?php echo $personData['name']; ?></td>
          <td align="left"><input type="checkbox" name"prsn<?php echo $personData['id'];?>" value="1"></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <!--for文的な？-->
      <input type="submit" value="メンバー確定">
    </form>
    </center>
  </body>
</html>