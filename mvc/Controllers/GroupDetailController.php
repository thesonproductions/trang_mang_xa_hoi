<?php
class GroupDetail{
    public function __construct()
    {
    }
    public function index()
    {
        $view = "mvc/Views/temp/groupdetails/index.php";
        require_once "mvc/Views/Layout.php";
    }
}
