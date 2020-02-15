<?php


namespace rodzajklatki;


use appl\Controller;
use appl\View;

class RodzajKlatki extends Controller
{
    protected $layout ;
    protected $model;
    function __construct() {
        parent::__construct();
        $this->layout = new View('Layout') ;
        $this->layout->title = 'Hodowla Szczurków Turka 19' ;
        $this->layout->header = 'Lista Rodzajów Klatek:';
        $this->layout->content = '' ;
        $this->model = new \rodzajklatki\Model();
    }

    function show(){
        $this->view= new View('CagesTypesList');
        $this->view->data = $this->model->getAllCageTypes();
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function insert(){
        $this->layout->header = 'Nowy Rodzaj Klatki:';
        $this->view= new View('InsertCagesType');
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function saveInsert(){
        $this->model->saveRace($_POST);
        return $this->show();
    }

    function delete($id_rk){
        $this->model->deleteCageType($id_rk);
        return $this->show();
    }
}