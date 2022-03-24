<?php
require_once "mvc/core/database.php";
class TopBar extends database {
   public function recentActiviti($keyId){
       $sql = 'SELECT *
                FROM notifications
                WHERE notifications.id_notifier = 1
                ORDER BY notifications.create_at DESC
                LIMIT 3';
       $this->setQuery($sql);
       return $this->loadAllRows(array($keyId));
   }
    public function suggestFollow($keyId){
       $sql = 'SELECT follows.id_follower,COUNT(follows.id_user)
                FROM follows
                WHERE follows.id_follower not in (SELECT *
                FROM (SELECT follows.id_follower as id_user
		            FROM follows
	                WHERE follows.id_user = ?) as a) AND follows.id_follower <> ?
                GROUP BY follows.id_follower
                ORDER BY COUNT(follows.id_user) DESC';
       $this->setQuery($sql);
       return $this->loadAllRows(array($keyId,$keyId));
    }

    public function addFollower($id_user,$id_follower){
       $sql = 'INSERT INTO follows VALUES (null,?,?,NOW())';
       $this->setQuery($sql);
       return $this->execute(array($id_user,$id_follower));
    }

    public function unFollower($id_user,$id_follower){
       $sql = 'DELETE FROM follows WHERE follows.id_user = ? AND follows.id_follower = ?';
        $this->setQuery($sql);
        return $this->execute(array($id_user,$id_follower));
    }

    public function readFollowerOfUser($idUser){
        $sql = "SELECT *
                FROM follows
                WHERE follows.id_follower = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idUser));
    }
    public function readUserFollow($id_notifier){
        $sql = "SELECT *
                FROM follows
                WHERE follows.id_user = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_notifier));
    }
    public function readAllFollow($id_user){
        $sql = "SELECT *
                FROM follows
                EXCEPT
                SELECT *
                FROM follows
                WHERE follows.id_user = ? OR follows.id_follower = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_user,$id_user));
    }
    public function checkExistUser($keyId,$id_follower){
       $sql = "SELECT *
                FROM follows
                WHERE follows.id_user = ? AND follows.id_follower = ?";
       $this->setQuery($sql);
       return $this->loadAllRows(array($keyId,$id_follower));
    }
    public function readWork($id_user){
        $sql = "SELECT * FROM education WHERE id_user = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id_user));
    }
}
?>
