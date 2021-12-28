<?php
require_once "database.php";
class M_friend_list extends database {
    // tất cả cái gì liên quan đến truy vấn database
    public function read_friend_list(){
        $sql = "SELECT user.nick_name,user.introduce,studys.study,user.avatar,user.cover_avatar
                FROM user,friends,studys
                WHERE user.id_user = friends.id_friends AND studys.id_user = user.id_user AND friends.id_user = 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
?>
