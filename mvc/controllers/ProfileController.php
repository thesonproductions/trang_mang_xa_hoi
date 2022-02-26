<?php
include "BaseController.php";
class ProfileController extends BaseController{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $view = "profiles/Index";
        $this->view($view,[
            "active"=>"timeline"
        ]);

    }
    public function photos(){
        $view = "profiles/Photos";
        $this->view($view,[
            "active"=>"photos"
        ]);
    }
    public function videos(){
        $view = "profiles/videos";
        $this->view($view,[
            "active"=>"videos"
        ]);
    }
    public function friend(){
        $view = "profiles/Friends";
        $this->view($view,[
            "active"=>"friends"
        ]);
    }
    public function about(){
        $view = "profiles/Abouts";
        $this->view($view,[
            "active"=>"abouts"
        ]);
    }
    public function editProfile(){
        $view = "profiles/EditProfile";
        $this->view($view,[
            "active"=>"action"
        ]);
    }
    public function editWork(){
        $view = "profiles/EditWork";
        $this->view($view,[
            "active"=>"action"
        ]);
    }
    public function changePassword(){
        $view = "profiles/ChangePassword";
        $this->view($view,[
            "active"=>"action"
        ]);
    }
}
