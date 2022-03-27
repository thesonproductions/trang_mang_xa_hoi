<?php
require_once 'mvc/core/processTime.php';
class BaseController {
    public function __construct()
    {
       
    }

    public function model($model){
        require_once "mvc/models/".$model.".php";
        return new $model;
    }
    public function view($view, $data = []){
        $mess = $this->model('Messenger');
        $ob = $this->model('Models');
        $notifications = $this->model('Notification');
        $top = $this->model('TopBar');

        $processTime = new processTime();

        $arr = $ob->getDetailUser($_SESSION['email'], $_SESSION['password']);
        $keyId = $arr->id_user;

        $view = "mvc/views/temp/".$view.".php";
        return require_once "mvc/views/layout.php";
    }

}
?>