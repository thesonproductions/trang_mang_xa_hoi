<?php
class Signup{
    public function __construct()
    {
        
    }
    public function index() {

        $view = "mvc/Views/temp/signups/index.php";
        include "mvc/Views/temp/signups/Layout.php";
        
    }
    public function validated() {

    }
}
?>