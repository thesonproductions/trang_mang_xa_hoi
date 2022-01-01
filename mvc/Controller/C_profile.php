<?php
class C_profile
{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $view = "mvc/View/temp/profiles/profiles.php";
        require_once "mvc/View/layout.php";
    }
}
