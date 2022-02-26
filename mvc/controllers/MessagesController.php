<?php
include "BaseController.php";
class MessagesController extends BaseController {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $view = "messages/index";
        $this->view($view,[]);
    }
}