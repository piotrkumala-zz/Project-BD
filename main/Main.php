<?php


namespace main;


use appl\Controller;
use appl\View;

class Main extends Controller
{
    protected $layout ;
    function __construct() {
        parent::__construct();
        $this->layout = new View('Layout') ;
        $this->layout->title = ' Hodowla Szczurków Turka 19' ;
        $this->layout->header = 'Witamy na stronie naszej hodowli';
        $this->layout->content = '' ;
    }

    function index() {
        return $this->layout;
    }
}