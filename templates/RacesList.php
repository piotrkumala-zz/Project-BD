<table>
    <?php
    echo('<tr><a href="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Rasy&action=insert">Dodaj nową rasę</a>');
    if($data)
    {
        foreach($data as $row)
        {
            echo('<tr>');
            foreach($row as $value){
                echo ('<td>'.$value.'</td>');
            }
            $detailsUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Rasy&action=details&args='.$row['id_r'];
            $deleteUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Rasy&action=delete&args='.$row['id_r'];
            $updateUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Rasy&action=update&args='.$row['id_r'];

            echo('<td><a href='.$detailsUrl.' >Szczegóły</a></td>
                        <td><a href='.$deleteUrl.'>Usuń</a></td>
                        <td><a href='.$updateUrl.'>Edytuj</a> </td></tr>');
        }
    }
    ?>
</table>