<?php
$mail1=$_REQUEST['mail_1'];
$mail2=$_REQUEST['mail_2'];
$mail3=$_REQUEST['mail_3'];
$cmail1=$_REQUEST['conf_mail_1'];
$cmail2=$_REQUEST['conf_mail_2'];
$cmail3=$_REQUEST['conf_mail_3'];

$subject="件名:楽天レンタルサービスについて";

$judge=0;

if(strcmp($mail1,$cmail1) != 0){
    $judge=1;
}

if(strcmp($mail2,$cmail2) != 0){
    $judge=1;
}

if(strcmp($mail3,$cmail3) != 0){
    $judge=1;
}

if($judge == 1){
echo "もう一度入力して下さい";
}

$invitetest_url="realthingshakes25@gmail.com";

$main="あなたはレンタル会員";

$from_url="hogehoge";

if(empty($mail1) != true){
    echo "test";

    mb_send_mail(
	$invitetest_url,
	    $subject,
	    $main);
    echo "招待メールを送信しました";
}
?>
