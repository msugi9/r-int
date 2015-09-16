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

$close_flag = pg_close($link);
$sql = "select name from ski_resort";
if ($close_flag){
    print('切断に成功しました。<br>');
}
$result = pg_exec($sql);
if($result == false) {
print("Can't exec SQL: [$sql]");
exit;
}
print($result);

?>
</body>
</html>