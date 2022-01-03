<?php
class Notification{
    public function __construct()
    {
    }
    public function index()
    {
        $view = "mvc/Views/temp/notifications/index.php";
        require_once "mvc/Views/Layout.php";
    }
}