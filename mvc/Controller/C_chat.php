<?php
class C_chat{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $view = "mvc/View/temp/chat/content_chat.php";
        require_once "mvc/View/layout.php";
    }
}