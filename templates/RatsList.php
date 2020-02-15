<table>
    <?php
        echo('<tr><a href="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Szczury&action=insert">Dodaj nowego szczurka</a>');
        if($data)
            {
                foreach($data as $row)
                {
                    echo('<tr>');
                    foreach($row as $value){
                        echo ('<td>'.$value.'</td>');
                    }
                    $detailsUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Szczury&action=details&args='.$row['id_sz'];
                    $deleteUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Szczury&action=delete&args='.$row['id_sz'];
                    $updateUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Szczury&action=update&args='.$row['id_sz'];
                    $orderUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Zamowienia&action=order&args='.$row['id_sz'];

                    echo('<td><a href='.$detailsUrl.' >Szczegóły</a></td>');
    if(isset($_SESSION['Id'])){
        if($_SESSION['Type'] == 'Klient') {
            echo('td ><a href = '.$deleteUrl.' > Usuń</a ></td > <td ><a href = '.$updateUrl.' > Edytuj</a > </td >');
            }
                    echo('<td><a href='.$orderUrl.'>Zamów</a> </td></tr>');
                }
            }
    ?>
</table>