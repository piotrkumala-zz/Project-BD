<table>
    <?php
    if($data)
    {
        foreach($data as $row)
        {
            foreach($row as $key=> $value){
                echo ('<tr><td>'.$key.':</td><td>'.$value.'</td></tr>');
            }
        }
    }
    ?>
</table>