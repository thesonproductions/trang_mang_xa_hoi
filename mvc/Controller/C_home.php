<?php
class C_home
{
    public function __construct()
    {
    }
    public function callIndex()
    {
       $view = "mvc/View/temp/home/index.php";
       include_once "mvc/View/layout.php";
    }
}
