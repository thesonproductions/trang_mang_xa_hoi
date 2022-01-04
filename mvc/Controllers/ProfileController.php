<?php
class Profile
{
    public function __construct()
    {
    }
    public function index()
    {
        $view = "mvc/Views/temp/profiles/index.php";
        require_once "mvc/Views/Layout.php";
    }
}
