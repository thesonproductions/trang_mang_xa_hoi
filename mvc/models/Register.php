<?php
require_once "mvc/core/database.php";
class Register extends database {
    // tất cả cái gì liên quan đến truy vấn database
    public function checkExist($email){
        $sql = "SELECT * 
                FROM user
                WHERE user.email = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($email));
    }

    public function insertUser($email, $password, $username, $fname, $lname, $gender){
        $sql = "INSERT INTO user(id_user ,email, password, username, f_name, l_name, gender, create_at, status) VALUES (?,?,?,?,?,?,?,NOW(),1)";
        $this->setQuery($sql);
        return $this->execute(array(null,$email,md5($password),$username,$fname,$lname,$gender));
    }
    public function readUser($email,$password){
        $sql = 'SELECT user.id_user,user.email,user.password,user.status
                FROM user
                WHERE user.email = ? AND user.password = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($email,md5($password)));
    }
}
?>
