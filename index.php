<html>
<head><title>PHP TEST</title></head>
<body>

<?php

$conn = "host=ec2-54-204-30-115.compute-1.amazonaws.com dbname=d8seqgbs15lak9 user=jqczyyfqfondlh password=AVywYkXKpxTnzKtlbyr8wxIFQN";
$link = pg_connect($conn);
if (!$link) {
    die('接続失敗です。'.pg_last_error());
}

print('接続に成功しました。<br>');

// PostgreSQLに対する処理
$url = parse_url(getenv('DATABASE_URL'));

$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

$pdo = new PDO($dsn, $url['user'], $url['pass']);
var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));
$sql = "select * from ski_resort";
echo "<pre>";
var_dump($pdo->query($sql));
exit;
foreach($pdo->query($sql) as $row){
  print(convert_enc($row['id']));
  print(convert_enc($row['name']));
}

// $result = pg_query($link, $sql);
// var_dump($result);


$close_flag = pg_close($link);
if ($close_flag){
    print('切断に成功しました。<br>');
}


?>
</body>
</html>