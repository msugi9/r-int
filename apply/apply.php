<?php
//$userId = ;
//$relatedPerson = ;
$personId = 1;
$numOfPerson = 5;
?>
<html>
  <head><title>メンバー決定</title>
    <body>
      参加者を選択してください<TMPL_VAR NAME=HOME>
      <p>
        <!--for文的な？-->
        <center>
        <table>
          <?php
          for($personId;$personId<$numOfPerson;$personId++){
            echo "<tr>";
            echo "<td>名前" .$personId ."</td>";
            echo '<td><input type="checkbox" name="prsn'.$personId"'></td>';
            echo '</tr>';
          }?>
        </table>
        </center>
        <!--for文的な？-->
        
        
        <input type="submit" value="メンバー確定">
      </p>
    </form>
  </body>
</html>