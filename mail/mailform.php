<?php

$mail1=$_REQUEST['mail_1'];
$mail2=$_REQUEST['mail_2'];
$mail3=$_REQUEST['mail_3'];
$cmail1=$_REQUEST['conf_mail_1'];
$cmail2=$_REQUEST['conf_mail_2'];
$cmail3=$_REQUEST['conf_mail_3'];

$subject="件名:楽天レンタルサービスについて";

$invite_url="realthingshakes25@gmail.com";

$main="あなたはレンタル会員";

$from_url="hogehoge";

if(@$mail1 != ""){
    mb_send_mail(
	$invite_url,
	    $subject,
	    $main);
    echo "<p>招待メールを送信しました</p>";
}
?>
