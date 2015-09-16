<?php
$pdo = null;
$name= ($_POST["company"]);
$id = ($_POST["id"]);
$pass = ($_POST["password"]);
$charge = ($_POST["name"]);
$address = ($_POST["address"]);
$tel = ($_POST["tel"]);
$ski = ($_POST["ski"]);
try{

  //データベースに接続
  $pdo = new PDO($dsn, $url['user'], $url['pass']);
  //sql文
  $sql = "insert into company (login_id,login_password,name,charge,address,tel,ski_resort_id) values ( '$id','$pass','$name','$charge','$address','$tel','$ski')";

  $result = $pdo->exec($sql);
  //$data = $result->fetchAll();
 $pdo = null;
$pdo = new PDO($dsn, $url['user'], $url['pass']);
  $sql2 = "select name from company where login_id = '$id'";
  $result1 = $pdo->query($sql2);
  $name1 = $result1->fetchAll();

echo $name1;

}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
echo"登録を受け付けました。";
?>

?>
