<?php
class Home
{
    public function __construct()
    {
    }
    public function index()
    {
       $view = "mvc/Views/temp/homes/index.php";
       include_once "mvc/Views/Layout.php";
    }
}
