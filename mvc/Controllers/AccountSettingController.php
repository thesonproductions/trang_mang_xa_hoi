<?php
class AccountSetting
{
    public function __construct()
    {

    }
    public function index()
    {
        $view = "mvc/Views/temp/accountsettings/index.php";
        require_once "mvc/Views/Layout.php";
    }
}
?>