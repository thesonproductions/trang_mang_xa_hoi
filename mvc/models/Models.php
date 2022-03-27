<?php
require_once "mvc/core/database.php";
// ddaay la lop dung chung cho cac class
class Models extends database {
    public function getDetailUser($email,$password){
        $sql = 'SELECT * 
                FROM user
                WHERE user.email = ? AND user.password = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($email,md5($password)));
    }

    public function postFile($primeId,$content,$filename){
        $timestamp = time();
        $dat = date("F d, Y h:i:s", $timestamp);
        $sql = 'INSERT INTO post(id_post ,id_user, content, media_content, create_at, updated_at) VALUES (?,?,?,?,?,NOW())';
        $this->setQuery($sql);
        return $this->execute(array(null,$primeId,$content,$filename,$dat));
    }

    public function getPost($keyId){
        $sql = 'SELECT *
                FROM (SELECT post.id_user as id,user.username,post.id_post,post.content,post.media_content,post.create_at,post.updated_at
                      FROM post,user
                      WHERE post.id_user = user.id_user AND user.id_user = ?
                      UNION
                      SELECT follows.id_follower as id,user.username,post.id_post,post.content,post.media_content,post.create_at,post.updated_at
                      FROM user,follows,post
                      WHERE follows.id_follower = post.id_user AND follows.id_follower = user.id_user AND follows.id_user = ?) as a
                ORDER BY a.updated_at DESC';
        $this->setQuery($sql);
        return $this->loadAllRows(array($keyId,$keyId));
    }

    public function getPostOfuser($iduser){
        $sql = 'SELECT post.id_user as id,user.username,post.id_post,post.content,post.media_content,post.create_at,post.updated_at
                FROM post,user
                WHERE post.id_user = user.id_user AND user.id_user = ?
                ORDER BY updated_at DESC';
        $this->setQuery($sql);
        return $this->loadAllRows(array($iduser));
    }

    // day la phan su li cac doan like
    public function countUnLike($postId){
        $sql = 'SELECT COUNT(likes.id_user) as cou
                FROM likes
                WHERE likes.id_post = ? AND likes.type = 0';
        $this->setQuery($sql);
        return $this->loadRow(array($postId));
    }
    public function countLike($postId){
        $sql = 'SELECT COUNT(likes.id_user) as cou
                FROM likes
                WHERE likes.id_post = ? AND likes.type = 1';
        $this->setQuery($sql);
        return $this->loadRow(array($postId));
    }
    public function countComment($postId){
        $sql = 'SELECT COUNT(comments.id_user) as cou
                FROM comments
                WHERE comments.id_post = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($postId));
    }
    public function checkExistUserLike($postId,$idUser){
        $sql = 'SELECT likes.type,COUNT(likes.id_user) as cou
                FROM likes
                WHERE likes.id_post = ? AND likes.id_user = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($postId,$idUser));
    }

    // them sua xoa trong like
    public function insertIntoLikes($idUser,$postId,$type){
        $sql = 'INSERT INTO likes VALUES (?,?,?,?,NOW())';
        $this->setQuery($sql);
        return $this->execute(array(null,$idUser,$postId,$type));
    }
    public function updateIntoLikes($idUser,$postId,$type){
        $sql = "UPDATE likes
                SET likes.type = ?
                WHERE likes.id_user = ? AND likes.id_post = ?";
        $this->setQuery($sql);
        return $this->execute(array($type,$idUser,$postId));
    }
    public function deleteIntoLikes($idUser,$postId){
        $sql = "DELETE FROM likes WHERE likes.id_user = ? AND likes.id_post = ?";
        $this->setQuery($sql);
        return $this->execute(array($idUser,$postId));
    }
    // ket thua phan like liec cac thu

    public function readUser($idUser){
        $sql = 'SELECT *
                FROM user
                WHERE user.id_user = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($idUser));
    }

    public function readPostById($idPost){
        $sql = 'SELECT * FROM post WHERE  post.id_post = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($idPost));
    }
    public function editPost($idPost,$content,$mediaContent){
        $sql = 'UPDATE post
                SET post.content = ?, post.media_content = ?, post.updated_at = NOW()
                WHERE post.id_post = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($content,$mediaContent,$idPost));
    }
    public function editPostWithoutFile($idPost,$content){
        $sql = 'UPDATE post
                SET post.content = ?, post.updated_at = NOW()
                WHERE post.id_post = ?';
        $this->setQuery($sql);
        return $this->execute(array($content,$idPost));
    }

    public function search($search){
        $sql = "SELECT *
                FROM user
                WHERE user.username LIKE '%".$search."%' LIMIT 8";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function searchNone($keyId){
        $sql = 'SELECT *
                FROM user
                WHERE user.id_user = ?
                ORDER BY user.id_user';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
