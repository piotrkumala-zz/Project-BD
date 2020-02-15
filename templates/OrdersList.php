<table>
    <?php
    if($data)
    {
        foreach($data as $row)
        {
            echo('<tr><td>Numer zamówienia:</td><td>Cena:</td><td>Numer klienta:</td><td>Numer szczurka</td></tr><tr>');
            foreach($row as $value){
                echo ('<td>'.$value.'</td>');
            }
        }
    }
    ?>
</table>