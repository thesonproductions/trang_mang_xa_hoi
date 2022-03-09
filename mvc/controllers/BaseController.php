<?php
class BaseController {
    public function __construct()
    {
       
    }

    public function model($model){
        require_once "mvc/models/".$model.".php";
        return new $model;
    }
    public function view($view, $data = []){
//        $ob = $this->model('Register');
//        $arr = $ob->readUser($_SESSION['email'],$_SESSION['password']);
//        $primeId = $arr->id_user;
        $view = "mvc/views/temp/".$view.".php";
        return require_once "mvc/views/layout.php";
    }
}
?>