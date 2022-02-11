<?php
include "BaseController.php";
class ProfileController extends BaseController{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->view("profiles/Index");
    }
    public function photos(){
        $this->view("profiles/Photos");
    }
}
