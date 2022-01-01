<?php
class C_friend_request{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $view = "mvc/View/temp/friend-request/content_friend-request.php";
        require_once "mvc/View/layout.php";
    }
}