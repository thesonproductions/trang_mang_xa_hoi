<?php
include ("mvc/Model/M_nav.php");
class C_nav_menu
{
    public function __construct()
    {
    }
    public function getDetailUser()
    {
        $getUser = new M_nav();
        return $userDetail = $getUser->read_user();
        
    }
    public function getFriendList(){
        $getUser = new M_nav();
        return $friendList = $getUser -> read_friend_list();
    }
}
?>
