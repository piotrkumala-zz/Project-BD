<table>
    <?php
    echo('<tr><a href="
http://pascal/~7kumala/ProjektSzczury/index.php?sub=RodzajKlatki&action=insert">Dodaj nowy rodzaj klatki</a>');
    if($data)
    {
        echo('<tr><td>Nr Rodzaju Klatki:</td><td>Nazwa:</td><td>Wysokość:</td>
            <td>Szerokość:</td><td>Długość:</td><td>Maksymalna pojemnosc:</td></tr>');
        foreach($data as $row)
        {
            echo('<tr><td>'.$row['id_rk'].'</td><td>'.$row['nazwa'].'</td><td>'.$row['wysokosc'].'</td>
                <td>'.$row['szerokosc'].'</td><td>'.$row['dlugosc'].'</td>
                <td>'.$row['maksymalnapojemnosc'].'</td>');

            $deleteUrl = '
http://pascal/~7kumala/ProjektSzczury/index.php?sub=RodzajKlatki&action=delete&args='.$row['id_rk'];

            echo('<td><a href='.$deleteUrl.'>Usuń</a></td>');
        }
    }
    ?>
</table><?php
