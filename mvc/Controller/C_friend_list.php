<?php
include  "mvc/Model/M_friend_list.php";
class C_friend_list{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $friendList = new M_friend_list();
        $arrayDetail = $friendList->read_friend_list();
        require_once "mvc/View/temp/friend-list/layout_friend-list.php";
    }
}
