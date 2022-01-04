<?php
class FriendRequest{
    public function __construct()
    {
    }
    public function index()
    {
        $view = "mvc/Views/temp/friendrequests/index.php";
        require_once "mvc/Views/Layout.php";
    }
}