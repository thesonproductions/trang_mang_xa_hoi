<?php
class Chat{
    public function __construct()
    {
    }
    public function index()
    {
        $view = "mvc/Views/temp/chats/index.php";
        require_once "mvc/Views/Layout.php";
    }
}