<?php
session_start();
if($_SESSION["company_id"]){
  header("Location:/top/company_top.php");
  exit;
}
?>
<HTML>
<FORM action="confirmc.php" method="post">
  <title>楽天　スノーボードレンタルサイト　ログイン</title>
  <b>楽天　スノーボードレンタルサイト　ログイン（会社）</b>
  <br>
ID<input type = "text" name ="id";>
<br>
password<input type = "text" name ="password";>

<br>
<input type ="submit" name ="login" value="login";>
</FORM>
</HTML>
