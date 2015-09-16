<?php echo "hello"?>
<?php
    echo "登録完了しました。\n"    
$database_url = "postgres://jqczyyfqfondlh:AVywYkXKpxTnzKtlbyr8wxIFQN@ec2-54-204-30-115.compute-1.amazonaws.com:5432/d8seqgbs15lak9";
$url = parse_url($database_url);
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
try{
    //データベース接続
    $pdo = new PDO($dsn, $url['user'], $url['pass']);
    echo "test"
    $loginid=$_REQUEST[login_ID];
    $pass=$_REQUEST[login_pass];
    $height=$_REQUEST[height];
    $weight=$_REQUEST[weight];
    $shoe=$_REQUEST[shoe_size];
    $accessory=$_REQUEST[accessory];
    $wear=$_REQUESRT[wear];
    $board=$_REQUEST[board];
    $email=$_REQUEST[email];

    $insert_sql = "insert into personal ($loginid,'$pass',$height,$weight,$shoe,$accessory,$wear,$board,'$email')";

    $sql = $pdo->exec($insert_sql); 


    
    echo "身長...'$height'\n"
    echo "体重...'$weight'\n"
    echo "靴のサイズ...'$shoe'\n"
    //echo "アクセサリー(キャップ、グローブ、ゴーグル)...'$accessory'\n"
    //echo "ウェア...'$wear'\n"
    //echo "ボード...'$board'\n"
    
}catch(PDOException $e){
  print('Error:'.$e->getMessage());
  die();
    }

?>
