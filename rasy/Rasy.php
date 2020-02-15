<?php


namespace rasy {


    use appl\Controller;
    use appl\View;

    class Rasy extends Controller
    {
        protected $layout ;
        protected $model;
        function __construct() {
            parent::__construct();
            $this->layout = new View('Layout') ;
            $this->layout->title = 'Hodowla Szczurków Turka 19' ;
            $this->layout->header = 'Lista Ras:';
            $this->layout->content = '' ;
            $this->model = new \rasy\Model();
        }

        function show(){
            $this->view= new View('RacesList');
            $this->view->data = $this->model->getAllRaces();
            $this->layout->content = $this->view;
            return $this->layout;
        }

        function insert(){
            $this->view = new View('InsertRace');
            $this->view->races = $this->model->getAllRaces();
            $this->layout->content = $this->view;
            $this->layout->header = 'Nowa Rasa:';
            return $this->layout;
        }

        function details($id_r){
            $this->view = new View('SzczurySzczegoly');
            $this->view->data=$this->model->getDetails($id_r);
            $this->layout->content = $this->view;
            $this->layout->header = '';
            return $this->layout;
        }

        function delete($id_r){
            $this->model->deleteRace($id_r);
            return $this->show();
        }

        function saveInsert(){
            $this->model->saveRace($_POST);
            return $this->show();
        }

        function update($id_r){
            $this->view = new View('UpdateRace');
            $this->view->data=$this->model->getDetails($id_r)[0];
            $this->layout->content = $this->view;

            return $this->layout;
        }

        function saveUpdate($id_r){
            $this->model->updateRace($_POST, $id_r);
            return $this->show();
        }


    }
}