<?php


namespace uzytkownik;


use appl\Controller;
use appl\View;
use main\Main;

class Uzytkownik extends Controller
{
    protected $layout ;
    protected $model;
    function __construct() {
        parent::__construct();
        $this->layout = new View('Layout') ;
        $this->layout->title = 'Hodowla Szczurków Turka 19' ;
        $this->layout->content = '' ;
        $this->model = new \uzytkownik\Model();
    }

    function register(){
        $this->view = new View('RegisterUser');
        $this->layout->header = "Zarejestruj się:";
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function saveRegister(){
        $status  = $this->model->saveUser($_POST);
        if($status){
            header('Location: http://pascal/~7kumala/ProjektSzczury/index.php?sub=Uzytkownik&action=login');
            die();
        }
        else{
            $this->layout->content = 'Uzytkownik o podanym adresie email juz istnieje';
            return $this->layout;
        }

    }

    function login(){
        $this->view = new View('LoginUser');
        $this->layout->header = 'Zaloguj się:';
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function loginInternal(){
        $answer = $this->model->login($_POST);
        if(!$answer){
            $this->view = new View('LoginUser');
            $this->layout->header = 'Podano błedny login lub hasło';
            $this->layout->content = $this->view;
            return $this->layout;
        }
        else{
            header('Location: http://pascal/~7kumala/ProjektSzczury/index.php');
            die();
        }
    }

    function logout(){
        session_start();
        session_destroy();
        header('Location: http://pascal/~7kumala/ProjektSzczury/index.php');
        die();
    }

}