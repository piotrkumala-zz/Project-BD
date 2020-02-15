<?php
if($data){
    echo('<form method="post" action="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Test&action=saveTest">');
    foreach ($data as $row){
        echo ('<label>'.$row['id_pytania'].'.  '.$row['tresc'].'</label><br/>
                <select name="'.$row['id_pytania'].'" required>
                <option value="1">'.$row['odpowiedza'].'</option>
                <option value="2">'.$row['odpowiedzb'].'</option>
                <option value="3">'.$row['odpowiedzc'].'</option>
                </select><br/>');
    }
    echo('<input type="submit"></form>');
}