<?php
require_once "mvc/core/database.php";
class Comments extends database {
    // tất cả cái gì liên quan đến truy vấn database
    public function postComment($userId,$postId,$comment){
        $sql = "INSERT INTO comments VALUES (?,?,?,?,NOW())";
        $this->setQuery($sql);
        if ($this->execute(array(null,$userId,$postId,$comment))){
            return $this->pdo->lastInsertId();
        }
        return -1;
    }
    public function readComment($postId,$start,$end){
        $sql = 'SELECT *
                FROM comments
                WHERE comments.id_post = ?
                ORDER BY comments.id DESC 
                LIMIT '.$start.','.$end;
        $this->setQuery($sql);
        return $this->loadAllRows(array($postId));
    }
    public function readReply($parrentId,$postId){
        $sql = 'SELECT * FROM comments
                WHERE comments.id_parent_user = ? AND comments.id_post = ?';
        $this->setQuery($sql);
        return $this->loadAllRows(array($parrentId,$postId));
    }
    public function readMore($row,$postId){
        $sql = 'SELECT * 
                FROM comments
                WHERE comments.id_post = ?
                LIMIT '.$row.',5';
        $this->setQuery($sql);
        return $this->loadAllRows(array($postId));
    }
    public function deleteUser($idCmt){
        $sql = 'DELETE FROM comments WHERE comments.id = ?';
        $this->setQuery($sql);
        return $this->execute(array($idCmt));
    }
    public function deletePost($id){
        $sql = 'DELETE FROM post WHERE id_post = ?';
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}
?>
