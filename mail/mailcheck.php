<html lang = "ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title> 招待ページ</title>
  </head>
  
  <body bgcolor="#fffacd  " TEXT="#333333  " LINK="#3333cc  ">
    <!-- タイトル -->
    <h1 style = "font-size: 16px; font-weight: bold;">招待ページ</h1>
    <!-- タイトル -->

    <form action="./mailing.php" method="post">
      招待する人のURLを入力して下さい。
      <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 2px 0pt 0pt 0px;">
	      <tr>
	          <td bgcolor="#afafaf  ">
	              <table width="100%" border=0 cellspacing=1 cellpadding=5 style="font-size: 12px;">
	                  <tr>
		              <td style="background-color: #eeeeee  ;">招待するメールアドレス</td>
		              <td style="background-color: #ffffff  ;">
		                  <input type="text" name="mail_1" size="30">
		              </td>
	                  </tr>
	      <!--<tr>
		              <td style="background-color: #eeeeee  ;"></td>
		              <td style="background-color: #ffffff  ;">
		                  <input type="text" name="mail_2" size="30">
		              </td>
	                  </tr>
	      <tr>
		              <td style="background-color: #eeeeee  ;"></td>
		              <td style="background-color: #ffffff  ;">
		                  <input type="text" name="mail_3" size="30">
		              </td>
	                  </tr>-->
	              </table>
	          </td>
	      </tr>
          </table>
      確認のためもう一度入力して下さい。
    <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 5px 0pt 0pt 0px;">
            <tr>
	        <td bgcolor="#afafaf  ">
	            <table width="100%" border=0 cellspacing=1 cellpadding=5 style="font-size: 12px;">
	                <tr>
	                    <td style="background-color: #eeeeee  ;">確認用メールアドレス</td>
	                    <td style="background-color: #ffffff  ;">
		                <input type="text" name="conf_mail_1" size="30">
	                    </td>
	                </tr>
<!--	    <tr>
	                    <td style="background-color: #eeeeee  ;"></td>
	                    <td style="background-color: #ffffff  ;">
		                <input type="text" name="conf_mail_2"  size="30">
	                    </td>
	                </tr>
	    <tr>
	                    <td style="background-color: #eeeeee  ;"></td>
	                    <td style="background-color: #ffffff  ;">
		                <input type="text" name="conf_mail_3"  size="30">
	                    </td>
	                </tr>-->
	            </table>
	        </td>
            </tr>
        </table>
        <br> <input type="submit" name="send" value="送信">
      </form>
  </body>
  </html>
