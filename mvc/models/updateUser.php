<?php
require_once "mvc/core/database.php";
class updateUser extends database{
    public function readUser($idUser){
        $sql = 'SELECT *
                FROM user
                WHERE user.id_user = ?';
        $this->setQuery($sql);
        return $this->loadRow(array($idUser));
    }
    public function updateAvatar($keyId,$avatar){
        $sql = 'UPDATE user
                SET user.avatar = ?, user.update_at = NOW()
                WHERE user.id_user = ? ';
        $this->setQuery($sql);
        return $this->execute(array($avatar,$keyId));
    }
    public function updateCover($keyId,$avatar){
        $sql = 'UPDATE user
                SET user.cover_avatar = ?, user.update_at = NOW()
                WHERE user.id_user = ? ';
        $this->setQuery($sql);
        return $this->execute(array($avatar,$keyId));
    }
    public function updateDetailUser($f_name,$l_name,$birth,$phone_number,$gender,$address,$description,$keyId){
        $sql = "UPDATE user
                SET user.f_name = ?, user.l_name = ?, user.birthday = ?, user.phone_number = ?, user.gender = ?, user.address = ?, user.description = ?
                WHERE user.id_user = ?";
        $this->setQuery($sql);
        return $this->execute(array($f_name,$l_name,$birth,$phone_number,$gender,$address,$description,$keyId));
    }

    //----------------------------------------------------
    public function readWork($id_user){
        $sql = "SELECT * FROM education WHERE id_user = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id_user));
    }
    public function updateWork($keyId,$desc){
        $sql = "INSERT INTO education
                VALUES (?,?,NOW())";
        $this->setQuery($sql);
        return $this->execute(array($keyId,$desc));
    }
    public function deleteWork($keyId){
        $sql = "DELETE FROM education WHERE id_user = ?";
        $this->setQuery($sql);
        return $this->execute(array($keyId));
    }

    public function updatePass($keyId,$newPass){
        $sql = "UPDATE user
                SET user.password = ?
                WHERE user.id_user = ?";
        $this->setQuery($sql);
        return $this->execute(array(md5($newPass),$keyId));
    }
}
?>
