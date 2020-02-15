<?php
echo('<form method="post" action="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Szczury&action=saveUpdate&args='.$id_sz.'">
<label>Imie: </label><br/>
<input name="szczurImie" type="text" value="'.$ratInfo['imie'].'" required><br/>
<label>Data Urodzenia: </label><br/>
<input name="szczurDataUrodzenia" type="date" value="'.$ratInfo['dataurodzenia'].'" required><br/>
<label>Płeć: </label><br/>
<select name="szczurPlec" required>
<option value="samica"');
if($ratInfo['plec'] == "samica"){
    echo (' selected="selected"');
}
    echo('>Samica</option>
<option value="samiec"');
if($ratInfo['plec'] == "samiec"){
    echo (' selected="selected"');
}
echo('>Samiec</option>
</select><br/>
<label>Rasa: </label><br/>');
if($races){
    echo('<select name="szczurRasa" required>');
    foreach ($races as $row){
        echo('<option value="'.$row['id_r'].'"');
        if($row['id_r']==$ratInfo['numerrasy']){
            echo (' selected="selected"');
        }
        echo('>'.$row['nazwa'].'</option>');
    }
    echo('</select><br/>');
}
if($mothers){
    echo('<label>Imię matki:</label><br/><select name="szczurMatka" value="'.$ratInfo['matka'].'">');
    foreach ($mothers as $row){
        echo('<option value="'.$row['id_sz'].'"');
        if($row['id_sz']==$ratInfo['matka']){
            echo (' selected="selected"');
        }
        echo ('>'.$row['imie'].'</option>');
    }
    echo('</select><br/><label>Imię ojca:</label><br/><select name="szczurOjciec" value="'.$ratInfo['ojciec'].'>');
}
if($fathers){

    foreach ($fathers as $row){
        echo('<option value="'.$row['id_sz'].'">'.$row['imie'].'</option>');
    }

}
echo('</select><br/>');
echo('<label>Opis: </label><br/> <input name="szczurOpis" type="text" value="'.$ratInfo['opis'].'" required><br/>
<label>Stan zdrowia: </label><br/> <input name="szczurStanZdrowia" type="text" value="'.$ratInfo['stanzdrowia'].'" required><br/>
<label>Numer klatki: </label><br/> <input name="szczurNumerKlatki" type="number" value='.$ratInfo['numerklatki'].' required><br/>
<input type="submit"> </form>');