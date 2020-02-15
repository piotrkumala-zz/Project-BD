<table>
    <?php
    echo('<tr><a href="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Klatki&action=insert">Dodaj nową klatkę</a>');
    if($data)
    {
        echo('<tr><td>Numer Klatki:</td><td>Rodzaj Klatki:</td><td>Maksymalna pojemnosc:</td><td>Pracownik odpowiedzialny:</td><td>Ostatnie sprzątanie:</td><td>Ostatni wybieg:</td><td>Ostatnia wizyta u weterynarza:</td></tr>');
        foreach($data as $row)
        {
            echo('<tr><td>'.$row['numerklatki'].'</td><td>'.$row['rodzajklatki'].'</td><td>'.$row['maksymalnapojemnosc'].'</td><td>'.$row['pracownik'].'</td><td>'.$row['ostatniesprzatanie'].'</td>
                <td>'.$row['ostatniwybieg'].'</td><td>'.$row['wizytauweterynarza'].'</td>');

            $detailsUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Klatki&action=rats&args='.$row['numerklatki'];
            $deleteUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=Klatki&action=delete&args='.$row['numerklatki'];

            echo('<td><a href='.$detailsUrl.' >Szczury w klatce</a></td>
                        <td><a href='.$deleteUrl.'>Usuń</a></td></tr>');
        }
    }
    ?>
</table><?php
