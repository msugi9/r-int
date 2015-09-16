<?php
//$userId = ;
//$relatedPerson = ;

echo "test";
?>
<html>
  <head><title>Test Template</title>
    <body>
      My Home Directory is <TMPL_VAR NAME=HOME>
      <p>
        My Path is set to <TMPL_VAR NAME=PATH>
        <form action="cgi-bin/abc.cgi" method="post">
          <p>
            名前：<input type="text" name="namae">
          </p>
          
          <!--for文的な？-->
          <p>名前1<input type="checkbox" name="prsn1" value="1" ></p>
          <p>名前1<input type="checkbox" name="prsn1" value="1" ></p>
          <p>名前1<input type="checkbox" name="prsn1" value="1" ></p>
          <p>名前1<input type="checkbox" name="prsn1" value="1" ></p>
          <!--for文的な？-->
          
          
          <input type="submit" value="メンバー確定">
        </p>
      </form>
    </body>
  </html>