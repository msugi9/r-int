<?php
//$userId = ;
//$relatedPerson = ;
$personId = 1;
$numOfPerson = 5;
?>
<html>
  <head><title>メンバー決定</title></head>
  <body>
    参加者を選択してください<TMPL_VAR NAME=HOME>
    <form action="./apply.php" method  ="post">
      <!--for文的な？-->
      <center>
      <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <?php
        for($personId;$personId<$numOfPerson;$personId++){
          echo '<tr>';
          echo '<td>名前' .$personId .'</td>';
          echo '<td><input type="checkbox" name="prsn'.$personId.'"></td>';
          echo '</tr>';
        }?>
      </table>
      </center>
      <!--for文的な？-->
      
      
      <input type="submit" value="メンバー確定">
    </form>
  </body>
</html>