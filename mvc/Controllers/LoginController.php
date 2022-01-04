<?php
class Login{
  public function __construct()
  {
      
  }  
  public function index(){
      $view = "mvc/Views/temp/logins/index.php";
      include "mvc/Views/temp/logins/layout.php";
  }
}
?>