<?php


namespace test;


use appl\Controller;
use appl\View;

class Test extends Controller
{
    protected $layout ;
    protected $model;
    function __construct() {
        parent::__construct();
        $this->layout = new View('Layout') ;
        $this->layout->title = 'Hodowla Szczurków Turka 19' ;
        $this->layout->content = '' ;
        $this->model = new \test\Model();
    }

    function takeTest(){
        $this->view = new View('Test');
        $this->view->data = $this->model->getQuestions();
        $this->layout->header = 'Test wiedzy o szczurach:';
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function saveTest(){
        $this->layout->header = 'Wynik testu:';
        $this->layout->content = $this->model->saveTest($_POST).'%';
        return $this->layout;
    }
}