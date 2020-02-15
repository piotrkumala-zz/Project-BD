<table>
<?php
    if($data) {
        foreach ($data as $row) {
            echo('<tr>');
            foreach ($row as $value) {
                echo('<td>' . $value . '</td>');
            }
        }
        echo('</tr>');
    }
    else{
        echo('Klatka jest pusta!');
    }
?>
</table>
