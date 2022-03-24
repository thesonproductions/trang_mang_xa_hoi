<?php
require_once "mvc/core/database.php";
class Notification extends database{
    public function insertNoti($id_notifier,$id_user,$id_post,$type){
        $sql = 'INSERT INTO notifications VALUES (null,?,?,?,?,1,NOW())';
        $this->setQuery($sql);
        $this->execute(array($id_notifier,$id_user,$id_post,$type));
        return $this->pdo->lastInsertId();
    }

    public function checkExistNoti($id_notifier,$id_post){
        $sql = 'SELECT *
                FROM notifications
                WHERE notifications.id_notifier = ? AND notifications.id_post = ? AND notifications.type in (0,1)';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_notifier,$id_post));
    }

    public function deleteNoti($idNoti){
        $sql = 'DELETE FROM notifications WHERE notifications.id = ?';
        $this->setQuery($sql);
        $this->execute(array($idNoti));
    }

    public function updateNoti($idNoti,$type){
        $sql = 'UPDATE notifications
                SET notifications.type = ?
                WHERE notifications.id = ?';
        $this->setQuery($sql);
        $this->execute(array($type,$idNoti));
    }

    public function readNotification($id_user){
        $sql = 'SELECT *
                FROM notifications
                WHERE notifications.id_user = ? AND notifications.status = 1 AND notifications.id_notifier <> ?
                ORDER BY notifications.create_at DESC';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_user,$id_user));
    }

    public function readNotiById($id){
        $sql = 'SELECT *
                FROM notifications
                WHERE notifications.id = ? AND notifications.id_notifier <> notifications.id_user';
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    public function readNoti($id_user){
        $sql = 'SELECT *
                FROM notifications
                WHERE notifications.id_user = ? AND notifications.id_notifier <> ?
                ORDER BY notifications.create_at DESC';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_user,$id_user));
    }

    public function updateStatus($id_user){
        $sql = 'UPDATE notifications
                SET notifications.status = 0
                WHERE notifications.status = 1 AND notifications.id_user = ?';
        $this->setQuery($sql);
        return $this->execute(array($id_user));
    }
}
?>
