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
    echo "もう一度入力して下さい<br>";
    print '<a href="https://blooming-dawn-8215.herokuapp.com/mail/mailform.html">招待ページに戻る</a>';
}else{
    
    echo "招待メールを送信しました<br />";

    print '<a href="TOPページ">TOPページに戻る</a>';
}
?>
