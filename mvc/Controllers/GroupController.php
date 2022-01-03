<?php
class Group{
    public function __construct()
    {
    }
    public function index()
    {
        $view = "mvc/Views/temp/groups/index.php";
        require_once "mvc/Views/Layout.php";
    }
}
