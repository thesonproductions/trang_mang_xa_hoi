<?php
class C_group_details{
    public function __construct()
    {
    }
    public function callIndex()
    {
        $view = "mvc/View/temp/group-details/group-detail.php";
        require_once "mvc/View/layout.php";
    }
}
