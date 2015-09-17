<?php
session_start();
//var_dump($_SESSION["personal_id"])
?>

<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>アイテム登録ページ</title>
  </head>

  <body bgcolor="#fffacd  " TEXT="#333333  " LINK="#3333cc  ">
    <!-- タイトル -->
    <h1 style = "font-size: 16px; font-weight: bold;">アイテム登録ページ</h1>
    <!-- タイトル -->

    以下の欄に入力することで、貸し出し可能なレンタル用品を登録する事が出来ます。

<form action="./personalinfo.php" method="post">
      <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 2px 0pt 0pt 0px;">
	      <tr>
	          <td bgcolor="#008b8b  ">
	              <table width="100%" border=0 cellspacing=1 cellpadding=5 style="font-size: 20px;">
		      <tr>
			<td style="background-color: #87cefa  ;">ボードS
			</td>
			<td style="background-color: #ffffff  ;">
			   <input type="checkbox" name="board_s" value="1" size="30">
			  <input type="text" name="height" size="30">個
			 
			</td>
		      </tr>
		      <tr>
			<td style="background-color: #87cefa  ;">ボードM
			</td>
			<td style="background-color: #ffffff  ;">
			  <input type="text" name="weight" size="30">
			</td>
		      </tr>
	      	      <tr>
			<td style="background-color: #87cefa  ;">ボードL</td>
			<td style="background-color: #ffffff  ;">
			  <input type="text" name="shoe_size" size="30"></td>
		      </tr>
		      <tr>
			<td style="background-color: #87cefa  ;">ウェアS
			</td>
			<td style="background-color: #ffffff  ;">
			  <input type="text" name="height" size="30">
			</td>
		      </tr>
		      <tr>
			<td style="background-color: #87cefa  ;">ウェアM
			</td>
			<td style="background-color: #ffffff  ;">
			  <input type="text" name="weight" size="30">
			</td>
		      </tr>
	      	      <tr>
			<td style="background-color: #87cefa  ;">ウェアL</td>
			<td style="background-color: #ffffff  ;">
			  <input type="text" name="shoe_size" size="30"></td>
		      </tr>
	      	      <tr>
			<td style="background-color: #87cefa  ;">小物類</td>
			<td style="background-color: #ffffff  ;">
			  <input type="text" name="shoe_size" size="30"></td>
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
