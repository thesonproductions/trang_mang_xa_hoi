<?php
class C_notification{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $view = "mvc/View/temp/notification/content_noti.php";
        require_once "mvc/View/layout.php";
    }
}