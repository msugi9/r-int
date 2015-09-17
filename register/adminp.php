<?php
session_start();
if($_SESSION["personal_id"]){
  header("Location:/top/user_top.php");
  exit;
}

$parent_id = ($_GET["parent"]);
?>

<HTML>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  </head>
  <FORM action="/register/admincomfirmp.php" method="post">
    <title>楽天　スノーボードレンタルサイト　登録用</title>
    <b>楽天　スノーボードレンタルサイト　登録用(個人)</b>
    <br>
    個人名<input type = "text" name ="name";>
    <br>
    ID<input type = "text" name ="id";>
    <br>
    password<input type = "text" name ="password";>
    <br>
    e-mail<input type = "text" name ="email";>
    <input type="hidden" name="parent_id" value=<?php echo $parent_id; ?> />
    <input type ="submit" name ="to-roku" value="登録";>
  </FORM>
</HTML>
