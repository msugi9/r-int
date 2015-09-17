<?php

$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
try{
    //データベース接続
    $pdo = new PDO($dsn, $url['user'], $url['pass']);
  
    $loginid=htmlspecialchars($_REQUEST['login_ID']);
    $pass=htmlspecialchars($_REQUEST['login_pass']);
    $height=htmlspecialchars($_REQUEST['height']);
    $weight=htmlspecialchars($_REQUEST['weight']);
    $shoe=htmlspecialchars($_REQUEST['shoe_size']);
    $accessory=htmlspecialchars($_REQUEST['accessory']);
    $wear=htmlspecialchars($_REQUESRT['wear']);
    $board=htmlspecialchars($_REQUEST['board']);
    $email=htmlspecialchars($_REQUEST['email']);

    $insert_sql = "insert into personal(login_id,login_password,name,sex,height,weight,shoe_size,accessory,wear,board,email) values($loginid,'$pass',$height,$weight,$shoe,$accessory,$wear,$board,'$email')";

    $sql = $pdo->exec($insert_sql); 


    
    echo "身長...'$height'\n";
    echo "体重...'$weight'\n";
    echo "靴のサイズ...'$shoe'\n";
    echo "アクセサリー(キャップ、グローブ、ゴーグル)...'$accessory'\n";
    echo "ウェア...'$wear'\n";
    echo "ボード...'$board'\n";

    echo "登録しました\n";

    print '<a href="TOPページ">TOPページに戻る</a>'
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
    }

?>
