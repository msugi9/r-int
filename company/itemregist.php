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

<form action="./personalinfo.php" method="post">
      <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 2px 0pt 0pt 0px;">
	      <tr>
	          <td bgcolor="#ffffff  ">
	              <table width="100%" border=0 cellspacing=1 cellpadding=5 style="font-size: 20px;">
		      <tr>
			<td>ボードS
			</td>
			<td>
			   <input type="checkbox" name="board_s" value="1" size="50">
			  <input type="text" name="sboard_item" size="20">個
			 
			</td>
		      </tr>
		      <tr>
			<td>ボードM
			</td>
			<td style="background-color: #ffffff  ;">
			  <input type="checkbox" name="board_m" value="1" size="50">
			  <input type="text" name="mboard_item" size="20">個
			</td>
		      </tr>
	      	      <tr>
			<td>ボードL
			</td>
			<td style="background-color: #ffffff  ;">
			  <input type="checkbox" name="board_l" value="1" size="50">
			  <input type="text" name="lboard_item" size="20">個
			</td>
		      </tr>
		      <tr>
			<td>ウェアS
			</td>
			<td style="background-color: #ffffff  ;">
			  <input type="checkbox" name="wear_s" value="1" size="50">
			  <input type="text" name="swear_item" size="20">個
			</td>
		      </tr>
		      <tr>
			<td>ウェアM
			</td>
			<td style="background-color: #ffffff  ;">
			  <input type="checkbox" name="wear_m" value="1" size="50">
			  <input type="text" name="mwear_item" size="20">個
			</td>
		      </tr>
	      	      <tr>
			<td>ウェアL</td>
			<td style="background-color: #ffffff  ;">
			  <input type="checkbox" name="wear_l" value="1" size="50">
			  <input type="text" name="lwear_item" size="20">個
			</td>
		      </tr>
	      	      <tr>
			<td>小物類</td>
			<td style="background-color: #ffffff  ;">
			  <input type="checkbox" name="accessory_bool" value="1" size="50">
			  <input type="text" name="accessory_item" size="20">個
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
