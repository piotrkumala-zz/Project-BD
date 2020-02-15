<?php


namespace klatki;


use appl\Controller;
use appl\View;

class Klatki extends Controller
{
    protected $layout ;
    protected $model;
    function __construct() {
        parent::__construct();
        $this->layout = new View('Layout') ;
        $this->layout->title = 'Hodowla Szczurków Turka 19' ;
        $this->layout->header = 'Lista Klatek:';
        $this->layout->content = '' ;
        $this->model = new \klatki\Model();
    }

    function show(){
        $this->view= new View('CagesList');
        $this->view->data = $this->model->getAllCages();
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function rats($id_kl){
        $this->view = new View('RatsInCage');
        $this->view->data = $this->model->getRatsInCage($id_kl);
        $this->layout->content = $this->view;
        $this->layout->header = 'Szczury w klatce nr '.$id_kl[0].':';
        return $this->layout;
    }

    function delete($id_kl){
        $this->model->deleteCage($id_kl);
        return $this->show();
    }

    function insert(){
        $this->view = new View('InsertCage');
        $this->view->cages = $this->model->getCagesTypes();
        $this->view->workers = $this->model->getWorkers();
        $this->layout->content = $this->view;
        $this->layout->header = 'Dodaj nową klatkę';

        return $this->layout;
    }

    function saveInsert(){
        $this->model->saveCage($_POST);
        return $this->show();
    }
}