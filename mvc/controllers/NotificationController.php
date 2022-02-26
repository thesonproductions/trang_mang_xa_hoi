<?php
include "BaseController.php";
class NotificationController extends BaseController {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $view = "notifications/index";
        $this->view($view,[
            "active"=>"action"
        ]);
    }
}