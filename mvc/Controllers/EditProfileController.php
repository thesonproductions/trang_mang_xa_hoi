<?php
class EditProfile
{
    public function __construct()
    {
    }
    public function index()
    {
        $view = "mvc/Views/temp/editprofiles/index.php";
        require_once "mvc/Views/Layout.php";
    }
}
