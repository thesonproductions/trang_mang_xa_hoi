<?php
require_once "mvc/core/database.php";
class Messenger extends database {
    public function readUser($idUser){
        $sql = 'SELECT *
                FROM user
                WHERE user.id_user = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($idUser));
    }
    public function appearChat($id_send,$id_receive){
        $sql = "SELECT *
                FROM chats 
                LEFT JOIN user
                ON chats.id_user_send = user.id_user
                WHERE chats.id_user_send = ? AND chats.id_user_receive = ? OR chats.id_user_send = ? AND chats.id_user_receive = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_send,$id_receive,$id_receive,$id_send));
    }
    public function readChat($keyId){
        $sql = 'SELECT DISTINCT user.id_user,user.username,user.avatar,user.gender,chats.msg_seen
                FROM user
                LEFT JOIN chats
                ON user.id_user = chats.id_user_receive
                WHERE user.id_user <> ?
                GROUP BY user.id_user
                ORDER BY chats.msg_seen DESC';
        $this->setQuery($sql);
        return $this->loadAllRows(array($keyId));
    }
    public function chat($id_send,$id_receive,$content){
        $sql = "INSERT INTO chats VALUES (null,?,?,?,NOW(),0)";
        $this->setQuery($sql);
        return $this->execute(array($id_send,$id_receive,$content));
    }

    public function readChatTop($id_receive){
        $sql = 'SELECT *
                FROM chats
                WHERE chats.id_user_receive = ? 
                ORDER BY chats.msg_seen DESC';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_receive));
    }

    public function seenChat($id_receive){
        $sql = "UPDATE chats
                SET chats.msg_seen = 1
                WHERE chats.id_user_receive = ?";
        $this->setQuery($sql);
        return $this->execute(array($id_receive));
    }
}
?>
