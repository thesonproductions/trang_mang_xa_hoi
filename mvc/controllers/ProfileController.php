<?php
include "BaseController.php";
class ProfileController extends BaseController{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $view = "profiles/Index";
        $this->view($view);
    }
    public function photos(){
        $view = "profiles/Photos";
        $this->view($view);
    }
    public function videos(){
        $view = "profiles/videos";
        $this->view($view);
    }

}
