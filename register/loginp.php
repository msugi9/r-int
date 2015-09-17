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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
<FORM action="confirmp.php" method="post">
  <title>楽天　スノーボードレンタルサイト　ログイン</title>
  <b>楽天　スノーボードレンタルサイト　ログイン（個人）</b>
  <br>
ID<input type = "text" name ="id";>
<br>
password<input type = "text" name ="password";>

<br>
<input type="hidden" name="parent_id" value=$parent_id>
<input type ="submit" name ="login" value="login">
</FORM>
</HTML>
