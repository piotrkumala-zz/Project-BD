<?php
echo('<form method="post" action="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Klatki&action=saveInsert">
<label>Rodzaj klatki: </label><br/>
<select name="rodzajKlatka"required>');
foreach ($cages as $row){
    echo('<option value="'.$row['id_rk'].'">'.$row['nazwa'].'</option>');
}
echo('</select><br/>
<label>Pracownik odpowiedzialny:</label><br/>
<select name="pracownikKlatka" required>');
foreach ($workers as $row){
    echo('<option value="'.$row['id_p'].'">'.$row['imie'].'</option>');
}
echo('</select><br/><input type="submit"> </form>');
