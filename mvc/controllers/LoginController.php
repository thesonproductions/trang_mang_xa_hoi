<?php
include 'BaseController.php';
class LoginController extends BaseController{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        require_once 'mvc/views/temp/login/index.php';
    }
    public function signin(){
        $response = array(
          'status'=>0,
          'message'=>'Invalid Form! Please Try Again'
        );

        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember = $_POST['remember_me'];

        $obj = $this->model('Register');
        $arr = $obj->readUser($email,$password);
        if (!empty($arr)){
            if ($remember){
                setcookie('email',$email,time()+864000);
                setcookie('password',$password,time()+864000);
                $response['status'] = 1;
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $response['status'] = 1;
            }
        }else{
            $response['message'] = 'Account does not Exist!';
        }
        echo json_encode($response);
    }
}