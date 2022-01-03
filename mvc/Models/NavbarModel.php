<?php
require_once "database.php";

class Navbar extends database
{
    // tất cả cái gì liên quan đến truy vấn database
    public function readUser()
    {
        $sql = "SELECT * FROM user 
                WHERE user.id_user = 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function readFriendList()
    {
        $sql = "SELECT user.nick_name,user.avatar
                FROM friends,user
                WHERE friends.id_user = 1 AND friends.id_friends = user.id_user
                ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}

?>
