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
        $sql = 'INSERT INTO post(id_post ,id_user, content, media_content, create_at) VALUES (?,?,?,?,?)';
        $this->setQuery($sql);
        return $this->execute(array(null,$primeId,$content,$filename,$dat));
    }
}
