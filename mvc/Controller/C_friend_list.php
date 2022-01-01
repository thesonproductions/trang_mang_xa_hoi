<?php
include  "mvc/Model/M_friend_list.php";
class C_friend_list{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $view = "mvc/View/temp/friend-list/content_friend-list.php";
        $friendList = new M_friend_list();
        $arrayDetail = $friendList->read_friend_list();
        require_once "mvc/View/layout.php";
    }
}
