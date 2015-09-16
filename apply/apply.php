<?php
//$userId = ;
//$relatedPerson = ;
$personId = 1;
$numOfPerson = 5;
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
          <table>
            <?php
            for($personId;$personId<$numOfPerson;$personId++){
              echo "<tr>";
              echo "<td>名前" .$personId ."</td>";
              echo '<td><input type="checkbox" name="prsn".$personId . value="1" ></td>';
              echo '</tr>';
             }?>
          </table>
          <!--for文的な？-->
          
          
          <input type="submit" value="メンバー確定">
        </p>
      </form>
    </body>
  </html>