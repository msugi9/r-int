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
    $comsql = "select * from company";
    $comresult = $pdo->query($comsql);
    $comdata = $comresult->fetchAll();
    /*/////確認用/////////
    echo "<pre>";
    print_r($comdata);
    echo"</pre><br>";
    //////確認用/////////*/
}catch(PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
session_start();
$parentUserId = $_SESSION["personal_id"]; //親ユーザのidをとってくる
$_SESSION["ski_resort_id"]=$_POST['skiResortId'];
$_SESSION["play_date"]=$_POST['year']."/".$_POST['month']."/".$_POST['day'];
foreach($comdata as $tmp){
    if($tmp['ski_resort_id']==$_POST['skiResortId']){$_SESSION["company_id"]=$comdata['id'];}
}
foreach($sdata as $tmp2){
    if($tmp2['id']==$_POST['skiResortId']){$_SESSION['ski_resort_name']=$sdata['name'];}
}
echo $_SESSION["company_id"]."a";
echo $_POST['skiResortId']."b";
echo $comdata['id']."c";
echo $_SESSION['ski_resort_name's]."d";
$_SESSION["company_id"]=$comdata['id'];
$_SESSION['ski_resort_name']=$sdata['name'];
echo $_SESSION["company_id"]."a";
echo $_POST['skiResortId']."b";
echo $comdata['id']."c";
echo $_SESSION["ski_resort_name"]."d";
?>

<html lang = "ja">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>スキー場確認</title>
    </head>
    <body>
        <center>
        以下の日程，スキー場のご利用でよろしいですか？<TMPL_VAR NAME=HOME>
        <form action="./resortDb.php" method  ="post">
            <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
                <tr><td><?php echo "行き先->" . $_SESSION['ski_resort_name']; ?></td></tr>
                <tr><td>hokkaido</td></tr>
                <tr><td><?php echo "日程->" . $_SESSION["play_date"]; ?></td></tr>
                <tr><input type="submit" name="submitResort" value="確定"></tr>
            </table>
        </form>
        </center>
    </body>
</html>