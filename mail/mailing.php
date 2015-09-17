<?php
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
try{
    $pdo = new PDO($dsn, $url['user'], $url['pass']);
    
    $mail=htmlspecialchars($_REQUEST['mail_1']);
    $cmail=htmlspecialchars($_REQUEST['conf_mail_1']);
    
    $subject="subjecttest";
    
    $judge=0;

    //$insert_sql="insert into() values($mail)";
    
    if(strcmp($mail,$cmail) != 0){
	$judge=1;
    }
    
    if($judge == 1){
	echo "もう一度入力して下さい<br>";
	print '<a href="https://blooming-dawn-8215.herokuapp.com/mail/mailform.html">招待ページに戻る</a>';
    }else{
	echo "$mail <br />";
	echo "招待メールを送信しました<br />";
	print '<a href="https://blooming-dawn-8215.herokuapp.com/mail/advertising.html">招待メールを見る</a><br />';
	print '<a href="TOPページ">TOPページに戻る</a><br />';
    }
}catch(PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

?>
