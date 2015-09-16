<?php
//$userId = ;
//$relatedPerson = ;
$personId = 1;
$numOfMember = 3;
?>
<html>
  <head><title>レンタル品確認</title>
    <body>
      レンタル品とその数を確認してください<TMPL_VAR NAME=HOME>
      <p>
        <!--for文的な？-->
        <center>
        <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
          echo '<tr>';
            echo '<td>氏名</td><td>板ブーツ</td><td>ウェア</td><td>小物</td>';
          echo '</tr>';
          <?php
          for($personId;$personId<$numOfPerson;$personId++){
            echo '<tr>';
            echo '<td>名前' .$personId .'</td>';
            echo '<td><input type="checkbox" name="prsn'.$personId.'"></td>';
            echo '<td><input type="checkbox" name="boad'.$personId.'"></td>';
            echo '<td><input type="checkbox" name="wear'.$personId.'"></td>';
            echo '<td><input type="checkbox" name="acce'.$personId.'"></td>';
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