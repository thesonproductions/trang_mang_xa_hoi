<?php
include "BaseController.php";
class HomeController extends BaseController {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $view = "homes/Index";
        $this->view($view,[]);
    }
    public function uploadFile(){
        $response = array(
            'status'=>0,
            'message'=>'none'
        );

        $content = $_POST['content'];
        require_once "mvc/core/uploadFile.php";
        $ob = $this->model('Models');

        $arr = $ob->getDetailUser($_SESSION['email'],$_SESSION['password']);
        $primeId = $arr->id_user;

        $up = new uploadFile();
        $arr = $up->upload($primeId);
        $response['status'] = $arr['status'];


        if ($response['status'] == 1){
            $result = $ob->postFile($primeId,$content,$arr['filename']);
            if ($result){
                $response['message'] = $arr['message'];
            }
        }
        echo json_encode($response);
    }
}