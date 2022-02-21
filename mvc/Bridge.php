<?php
// bridge là cầu nối giữa các file core
// xử lí mấy cái login logout nữa
// xử lí các điều kiện
require_once "core/App.php";
//if (isset($_POST['btnLogin'])){
//    echo '<pre>';
//    echo print_r($_POST);
//    die();
//}
//if (!isset($_SESSION['email']) || !isset($_SESSION['password'])){
//    header('location: Login');
//}
class Bridge extends App{
    public function __construct()
    {
        parent::__construct();

    }
}