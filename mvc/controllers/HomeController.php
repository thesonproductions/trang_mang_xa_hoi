<?php
include "Controller.php";
class HomeController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $view = "homes/Index";
        $this->view($view,[

        ]);
    }
}