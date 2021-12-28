<?php
require_once "database.php";

class M_nav extends database
{
    // tất cả cái gì liên quan đến truy vấn database
    public function read_user()
    {
        $sql = "SELECT * FROM user 
                WHERE user.id_user = 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function read_friend_list()
    {
        $sql = "SELECT user.nick_name
                FROM friends,user
                WHERE friends.id_user = 1 AND friends.id_friends = user.id_user
                ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}

?>
