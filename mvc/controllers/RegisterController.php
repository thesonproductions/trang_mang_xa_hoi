<?php
include "BaseController.php";
class RegisterController extends BaseController{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        require_once "mvc/views/temp/register/Index.php";
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
    
}

?>
