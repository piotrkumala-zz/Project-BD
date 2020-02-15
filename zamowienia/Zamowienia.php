<?php


namespace zamowienia;


use appl\Controller;
use appl\View;

class Zamowienia extends Controller
{
    protected $layout ;
    protected $model;
    function __construct() {
        parent::__construct();
        $this->layout = new View('Layout') ;
        $this->layout->title = 'Hodowla Szczurków Turka 19' ;
        $this->layout->content = '' ;
        $this->model = new \zamowienia\Model();
    }

    function show(){
        $this->view = new View('OrdersList');
        if($_SESSION['Type'] = 'Pracownik'){
            $this->view->data = $this->model->getOrders();
        }
        else{
            $this->view->data = $this->model->getUserOrders($_SESSION['Id']);
        }
        $this->layout->header = 'Lista zamówień:';
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function order($id_sz){
        $result = $this->model->placeOrder($id_sz);
        if($result){
            return $this->show();
        }
        else{
            $this->layout->content = 'Musisz najpierw zdać test';
            return $this->layout;
        }
    }
}