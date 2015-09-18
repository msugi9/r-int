
<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $ssql = "select * from ski_resort";
  $sresult = $pdo->query($ssql);
  $sdata = $sresult->fetchAll();
  
  /*/////確認用/////////
  echo "<pre>";
  print_r($sdata);
  echo"</pre><br>";
  //////確認用////////*/
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
session_start();
$parentUserId = $_SESSION["personal_id"]; //親ユーザのidをとってくる

$prefecture = array(
'1'=>'北海道', '2'=>'青森県', '3'=>'岩手県', '4'=>'宮城県', '5'=>'秋田県',
'6'=>'山形県', '7'=>'福島県', '8'=>'茨城県', '9'=>'栃木県', '10'=>'群馬県',
'11'=>'埼玉県', '12'=>'千葉県', '13'=>'東京都', '14'=>'神奈川県', '15'=>'新潟県',
'16'=>'富山県', '17'=>'石川県', '18'=>'福井県', '19'=>'山梨県', '20'=>'長野県',
'21'=>'岐阜県', '22'=>'静岡県', '23'=>'愛知県', '24'=>'三重県', '25'=>'滋賀県',
'26'=>'京都府', '27'=>'大阪府', '28'=>'兵庫県', '29'=>'奈良県', '30'=>'和歌山県',
'31'=>'鳥取県', '32'=>'島根県', '33'=>'岡山県', '34'=>'広島県', '35'=>'山口県',
'36'=>'徳島県', '37'=>'香川県', '38'=>'愛媛県', '39'=>'高知県', '40'=>'福岡県',
'41'=>'佐賀県', '42'=>'長崎県', '43'=>'熊本県', '44'=>'大分県', '45'=>'宮崎県',
'46'=>'鹿児島県', '47'=>'沖縄県'
);

$pdo = null;



?>
<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>スキー場選択</title>
  </head>
  <body>
    <form action="./fix_resort.php" method="post">
      <center>
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <tr>
          <p>
            行く日を選んでください
          </p>
          <select name="year">
            <?php optionLoop('2000', date('Y'), '2100');?>
          </select>
          年
          <select name="month">
            <?php optionLoop('1', '12', '6');?>
          </select>
          月
          <select name="day">
            <?php optionLoop('1', '31', '15');?>
          </select>
          日
          <?php
          //セレクトオプションのループ設定
          function optionLoop($start, $end, $value = null){
            
            for($i = $start; $i <= $end; $i++){
              if(isset($value) &&  $value == $i){
                echo "<option value=\"{$i}\" selected=\"selected\">{$i}</option>";
              }else{
                echo "<option value=\"{$i}\">{$i}</option>";
              }
            }
          }
          ?>
        </tr>
        <?php foreach($sdata as $row) : ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $prefecture[$row['pref_code']]; ?></td>
          <td><input type="radio" name="skiResortId" value="<?php echo $row['id']; ?>"></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <input type="submit" name="submit" value="スキー場確定">
      </center>
    </form>
  </body>
</html>