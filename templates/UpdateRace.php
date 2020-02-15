<?php
echo('<form method="post" action="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Rasy&action=saveUpdate&args='.$data['id_r'].'">
<label>Nazwa: </label><br/>
<input name="rasaNazwa" type="text" value="'.$data['nazwa'].'" required><br/>
<input type="submit"> </form>');
