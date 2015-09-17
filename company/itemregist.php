<?php
session_start();
//var_dump($_SESSION["personal_id"])
?>

<html lang = "ja">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>アイテム登録ページ</title>
</head>

<body bgcolor="#ffffff  " TEXT="#333333  " LINK="#3333cc  ">
	<!-- タイトル -->
	<h1 style = "font-size: 16px; font-weight: bold;">アイテム登録ページ</h1>
	<!-- タイトル -->

	以下の欄に入力することで、貸し出し可能なレンタル用品を登録する事が出来ます。

	<form action="/company/itemConfirm.php" method="post">
		<table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 2px 0pt 0pt 0px;">
			      <tr>
				        <td bgcolor="#ffffff  ">
					          <table width="100%" border=1 cellspacing=1 cellpadding=5 style="font-size: 20px;">
						<tr>
							<td>ボード
							</td>
							<td style="background-color: #ffffff  ;">
								<input type="checkbox" name="board" value="1" size="50">
								<input type="text" name="board_price" size="20">円
							</td>
						</tr>
						<tr>
							<td>ウェア
							</td>
							<td style="background-color: #ffffff  ;">
								<input type="checkbox" name="wear" value="1" size="50">
								<input type="text" name="wear_price" size="20">円
							</td>
						</tr>

						<tr>
							<td>小物</td>
							<td style="background-color: #ffffff  ;">
								<input type="checkbox" name="accessory" value="1" size="50">
								<input type="text" name="accessory_price" size="20">円
							</td>
						</tr>

					</table>
				</td>
			</tr>
		</table>
		<br>
		<input type="submit" name="submit" value="更新">
	</form>
</body>
</html>
