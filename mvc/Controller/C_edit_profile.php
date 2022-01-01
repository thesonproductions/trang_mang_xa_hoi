<?php
class C_edit_profile
{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $view = "mvc/View/temp/edit-profile/edit-profile.php";
        require_once "mvc/View/layout.php";
    }
}
