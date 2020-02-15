<?php
echo('<form method="post" action="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Szczury&action=saveInsert">
<label>Imie: </label><br/>
<input name="szczurImie" type="text" value="" required><br/>
<label>Data Urodzenia: </label><br/>
<input name="szczurDataUrodzenia" type="date" value="" required><br/>
<label>Płeć: </label><br/>
<select name="szczurPlec" required>
<option value="samica">Samica</option>
<option value="samiec">Samiec</option>
</select><br/>
<label>Rasa: </label><br/>');
if($races){
    echo('<select name="szczurRasa" required>');
    foreach ($races as $row){
        echo('<option value="'.$row['id_r'].'">'.$row['nazwa'].'</option>');
    }
    echo('</select><br/>');
}
if($mothers){
    echo('<label>Imię matki:</label><br/><select name="szczurMatka">');
    foreach ($mothers as $row){
        echo('<option value="'.$row['id_sz'].'">'.$row['imie'].'</option>');
    }
    echo('</select><br/><label>Imię ojca:</label><br/><select name="szczurOjciec">');
}
if($fathers){

    foreach ($fathers as $row){
        echo('<option value="'.$row['id_sz'].'">'.$row['imie'].'</option>');
    }
    
}
echo('</select><br/>');
echo('<label>Opis: </label><br/> <input name="szczurOpis" type="text" value="" required><br/>
<label>Stan zdrowia: </label><br/> <input name="szczurStanZdrowia" type="text" value="" required><br/>
<label>Numer klatki: </label><br/> <input name="szczurNumerKlatki" type="number" value=0 required><br/>
<input type="submit"> </form>');