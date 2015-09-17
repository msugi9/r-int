<?php
$mail1=$_REQUEST['mail_1'];
$mail2=$_REQUEST['mail_2'];
$mail3=$_REQUEST['mail_3'];
$cmail1=$_REQUEST['conf_mail_1'];
$cmail2=$_REQUEST['conf_mail_2'];
$cmail3=$_REQUEST['conf_mail_3'];

$subject="subjecttest";

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
echo "もう一度入力して下さい\n";
}

//mb_language("Japanese");
//mb_internal_encoding("UTF-8");

$invitetest_url="realthingshakes25@gmail.com";

$main="test\n";

$from_url="test@test.com";

$header="From: ".$from_url."\n";

//if(empty($mail1) != true){
echo "test\n";

$confirm_send=send_mail($invitetest_url,$subject,$main,$header);
$confirm_send1=mb_send_mail($invitetest_url,$subject,$main,$header);

if($confirm_send){
    echo "招待メールを送信しました\n";
}else{
    echo "おくれませんでした\n";
}
//}

print '<a href="TOPページ">リンク</a>'
?>
