<?php
session_start();

$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
//Postgresqlの接続に必要なデータの取得
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

try{
  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "select * from personal where id = " . $_SESSION["personal_id"];

  $result = $pdo->query($sql);
  $data = $result->fetchAll();

  var_dump($data);

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
?>

<html lang = "ja">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>個人情報入力ページ</title>
</head>

<body bgcolor="#fffacd  " TEXT="#333333  " LINK="#3333cc  ">
  <!-- タイトル -->
  <h1 style = "font-size: 16px; font-weight: bold;">個人情報入力ページ</h1>
  <!-- タイトル -->

  以下の欄に入力することで、お客様それぞれに合わせたサイズの用具を借りることが出来ます。

  <!-- HTMLフォーム表示 -->
  <form action="./personalinfo.php" method="post">
    <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 2px 0pt 0pt 0px;">
      <tr>
        <td bgcolor="#008b8b  ">
          <table width="100%" border=0 cellspacing=1 cellpadding=5 style="font-size: 20px;">
            <tr>
              <td style="background-color: #87cefa  ;">性別</td>
              <td style="background-color: #ffffff  ;">
                <input type="radio" name="sex" value="true" size="30" checked="checked"/>男性
                <input type="radio" name="sex" value="false" size="30"/>女性
              </td>
            </tr>
            <tr>
              <td style="background-color: #87cefa  ;">身長</td>
              <td style="background-color: #ffffff  ;">
                <input type="text" name="height" size="30">
              </td>
            </tr>
            <tr>
              <td style="background-color: #87cefa  ;">体重</td>
              <td style="background-color: #ffffff  ;">
                <input type="text" name="weight" size="30">
              </td>
                        </tr>
            <tr>
                            <td style="background-color: #87cefa  ;">靴のサイズ</td>
                            <td style="background-color: #ffffff  ;">
                <input type="text" name="shoe_size" size="30">
              </td>
                        </tr>

            <tr>
                            <td style="background-color: #87cefa  ;">小物</td>
                            <td style="background-color: #ffffff  ;">
                <input type="radio" name="accessory" value="true" size="30" checked="checked"/>あり
                <input type="radio" name="accessory" value="false" size="30"/>なし
              </td>
            </tr>
            <tr>
                            <td style="background-color: #87cefa  ;">ウェア</td>
                            <td style="background-color: #ffffff  ;">
                <input type="radio" name="wear" value="true" size="30" checked="checked"/>あり
                <input type="radio" name="wear" value="false" size="30" />なし
              </td>
            </tr>
            <tr>
                            <td style="background-color: #87cefa  ;">ボード</td>
                            <td style="background-color: #ffffff  ;">
                <input type="radio" name="board" value="true" size="30" checked="checked"/>あり
                <input type="radio" name="board" value="false" size="30" />なし
              </td>
            </tr>



	              </table>
	          </td>
	      </tr>
          </table>
      <br>
	<input type="submit" name="submit" value="更新">
      </form>
    <!-- HTMLフォーム表示 -->

</body>
</html>
