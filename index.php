
<?php

//Postgresqlの接続に必要なデータの取得
$url = parse_url(getenv('DATABASE_URL'));
echo "<pre>";
var_dump(DATABASE_URL);
var_dump($url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));
  //sql文
  $sql = "select * from ski_resort";
  $data = $pdo->query($sql);
  // foreach($pdo->query($sql) as $row){
  //   print($row['id']);
  //   print($row['name']);
  // }
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

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
<html>
  <head><title>PHP TEST</title></head>
  <body>
    <h1>僕がいきたいスキー場は・・・</h1>
    <a href="https://www.google.co.jp/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=%E7%BE%A4%E9%A6%AC%E7%9C%8C">
      <?php
        foreach($data as $row){
          print($prefecture[$row['pref_code']]);
        }
      ?>
    </a>
    <p>にある</p>
    <a href="http://www.tambara.co.jp/skipark/">
      <?php
      var_dump($data);
        foreach($data as $row2){
          print($row2['name']);
        }
      ?>
    </a>
    <p>です。</p>
  </body>
</html>