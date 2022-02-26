<?php
include "BaseController.php";
class SigninController extends BaseController{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        require_once 'mvc/views/temp/signin/Signin.php';
    }
    public function register(){
        require_once 'mvc/views/temp/signin/Signup.php';
    }
    public function signup(){
        $response = array(
            'status' => 0,
            'message' => 'Form submission Failed!'
        );

        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];

        $obj = $this->model('Register');
        $arr = $obj->checkExist($email);
        $count = count($arr);

        if ($count >= 1){
            $response['message'] = 'This User Already Exists!';
        } else {
            $result = $obj->insertUser($email,$password,$username,$fname,$lname,$gender);
            if ($result){
                $response['status'] = 1;
                $response['message'] = 'Sign Up Success';
            } else {
                $response['message'] = 'failed registration';
            }
        }
        echo json_encode($response);
    }
    public function signin(){

        $email = $_POST['email'];
        $password = $_POST['password'];
//        $remember = $_POST['remember_me'];

        $obj = $this->model('Register');
        $arr = $obj->readUser($email,$password);
        if (!empty($arr)){
            if (isset($_POST['remember_me'])){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                header('location: ../home');
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                header('location: ../home');
            }
        }else{
            setcookie('error_message','Account does not Exist!',time()+1);
            header('location: index');
        }
    }
    public function logout(){
        if (isset($_SESSION['email'])){
            unset($_SESSION['email']);
            unset($_SESSION['password']);
        }
        if (isset($_COOKIE['email'])){
            setcookie('email','',time()-864111);
            setcookie('password','',time()-864111);
        }
        header('location: index');
    }
    
}

?>
