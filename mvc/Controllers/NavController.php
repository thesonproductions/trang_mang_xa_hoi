<?php
include("mvc/Models/NavbarModel.php");
class Nav
{
    public function __construct()
    {
    }
    public function getDetailUser()
    {
        $getUser = new Navbar();
        return $userDetail = $getUser->readUser();
        
    }
    public function getFriendList(){
        $getUser = new Navbar();
        return $friendList = $getUser -> readFriendList();
    }
}
?>
