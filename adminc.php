<?php
$company= ($_POST["company"]);
$id = ($_POST["id"]);
$pass = ($_POST["password"]);
$name = ($_POST["name"]);
$address = ($_POST["address"]);
$tel = ($_POST["tel"]);
$ski = ($_POST["ski"]);
  echo "登録を受け付けました。\n会社名：$company\n責任者名:$name\n住所:$address\n電話番号:$tel\nスキー場:$ski";
?>
