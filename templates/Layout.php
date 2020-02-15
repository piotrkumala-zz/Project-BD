<!DOCTYPE html>

<html>
<head>
    <title>BD - Projekt</title>
</head>
<body>
<header style="text-align: center; font-weight: bold; font-size: larger;"><?php echo $title; ?></header>
<div>
    <?php
    session_start();
    if(isset($_SESSION['Id'])){
        if($_SESSION['Type'] == 'Klient'){
            echo('<a href="http://pascal/~7kumala/ProjektSzczury/index.php">Strona Główna</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Szczury&action=show">Lista Szczurów</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Zamowienia&action=show">Zamówienia</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Test&action=takeTest">Test</a>');
        }
        if($_SESSION['Type'] == 'Pracownik'){
            echo('<a href="http://pascal/~7kumala/ProjektSzczury/index.php">Strona Główna</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Szczury&action=show">Lista Szczurów</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Rasy&action=show">Lista Ras</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Klatki&action=show">Lista Klatek</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=RodzajKlatki&action=show">Rodzaje Klatek</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Zamowienia&action=show">Zamówienia</a>
                  <a href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Test&action=takeTest">Test</a>');
        }
    }
    ?>

    <?php

    if(!isset($_SESSION['Id'])){
        echo('<a style="float: right" href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Uzytkownik&action=register">Rejestracja</a>
        <a style="float: right;margin-right: 5px;" href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Uzytkownik&action=login">Logowanie</a>');
    }
    else{
        echo('<a style="float: right" href="http://pascal/~7kumala/ProjektSzczury/index.php?sub=Uzytkownik&action=logout">Wyloguj</a>');
    }
    ?>

</div>
<div style="">
    <section>
        <header><?php echo $header; ?></header>
        <?php echo $content; ?>
    </section>
</div>

<footer style="text-align: center">Piotr Kumala &copy; 2019 </footer>
</body>
</html>