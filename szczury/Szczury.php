<?php


namespace szczury {


    use appl\Controller;
    use appl\View;

    class Szczury extends Controller
    {
        protected $layout ;
        protected $model;
        function __construct() {
            parent::__construct();
            $this->layout = new View('Layout') ;
            $this->layout->title = 'Hodowla Szczurków Turka 19' ;
            $this->layout->content = '' ;
            $this->model = new \szczury\Model();
        }

        function index() {
            return $this->layout ;
        }

        function show(){
            $this->view= new View('RatsList');
            $this->layout->header = 'Lista Szczurków:';
            $this->view->data = $this->model->getAllRats();
            $this->layout->content = $this->view;
            return $this->layout;
        }

        function insert(){
            $this->view = new View('InsertRat');
            $this->view->races = $this->model->getAllRaces();
            $this->view->mothers = $this->model->getAllMothers();
            $this->view->fathers = $this->model->getAllFathers();
            $this->layout->header = '';
            $this->layout->content = $this->view;
            return $this->layout;
        }

        function details($id_sz){
            $this->view = new View('SzczurySzczegoly');
            $this->view->data=$this->model->getDetails($id_sz);
            $this->layout->content = $this->view;
            $this->layout->header = '';
            return $this->layout;
        }

        function delete($id_sz){
            $this->model->deleteRat($id_sz);
            return $this->show();
        }

        function saveInsert(){
            $this->model->saveRat($_POST);
            return $this->show();

        }

        function update($id_sz){
            $this->view = new View('UpdateRat');
            $this->view->races = $this->model->getAllRaces();
            $this->view->mothers = $this->model->getAllMothers();
            $this->view->fathers = $this->model->getAllFathers();
            $this->view->ratInfo = $this->model->getDetails($id_sz)[0];
            $this->view->id_sz = $id_sz[0];
            $this->layout->header = '';
            $this->layout->content = $this->view;

            return $this->layout;
        }

        function saveUpdate($id_sz){
            $this->model->updateRat($_POST, $id_sz);
            return $this->show();
        }


    }
}