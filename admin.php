<?php
$company= ($_POST["company"]);
$id = ($_POST["id"]);
$pass = ($_POST["password"]);
$name = ($_POST["name"]);
$address = ($_POST["address"]);
$tel = ($_POST["tel"]);
$ski = ($_POST["ski"]);
  echo "登録を受け付けました。\n　
  会社名：$company
  責任者名:$name
  住所:$address
  電話番号:$tel
  スキー場:$ski"
?>
