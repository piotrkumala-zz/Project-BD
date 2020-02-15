<?php
/***************
 *
 *
 ****************/
function __autoload($class_name) {
    // print '{'.$class_name.'}' ;
    $path_to_class = __DIR__. '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
    require_once($path_to_class);
}
use szczury\Szczury;
use main\Main;
use rasy\Rasy;
use klatki\Klatki;

try {

    if (empty ($_GET['sub']))    { $contr = 'Main' ;   }
    else                         { $contr = $_GET['sub'] ; }

    if (empty ($_GET['action'])) { $action     = 'index' ;  }
    else                         { $action     = $_GET['action'] ; }
    if(empty($_GET['args'])) { $args = array();}
    else {$args = array($_GET['args']);}


    switch ($contr) {
        case 'Szczury' :
            $contr = 'szczury\\'.$contr ;
            break ;
        case 'Main' :
            $contr= 'main\\'.$contr;
            break;
        case 'Rasy' :
            $contr ='rasy\\'.$contr;
            break;
        case 'Klatki':
            $contr= 'klatki\\'.$contr;
            break;
        case 'RodzajKlatki':
            $contr='rodzajklatki\\'.$contr;
            break;
        case 'Uzytkownik':
            $contr='uzytkownik\\'.$contr;
            break;
        case 'Zamowienia':
            $contr='zamowienia\\'.$contr;
            break;
        case 'Test':
            $contr='test\\'.$contr;
            break;
    }
    $controller = new $contr ;
    echo $controller->$action($args) ;
}
catch (Exception $e) {
    echo 'Error: [' . $e->getCode() . '] ' . $e->getMessage() ;

}

?>