<?php
include  "mvc/Models/FriendList.php";
class FriendList{
    public function __construct()
    {
    }
    public function index()
    {
        $view = "mvc/Views/temp/friendlists/index.php";
        $friendList = new FriendList();
        $arrayDetail = $friendList->readFriendList();
        require_once "mvc/Views/Layout.php";
    }
}
