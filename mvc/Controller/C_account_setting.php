<?php
class C_account_setting
{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $view = "mvc/View/temp/account-setting/account-setting.php";
        require_once "mvc/View/layout.php";
    }
}
