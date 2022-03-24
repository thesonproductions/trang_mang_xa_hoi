<?php
include "BaseController.php";
class ProfileController extends BaseController{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){

        $contr = $this->model('Models');
        $arr = $contr->getPostOfuser($_GET['id']);
        $cmt = $this->model('Comments');

        $view = "profiles/Index";
        $this->view($view,[
            "active"=>"timeline",
            "model"=>$contr,
            "postNew"=>$arr,
            "m_comment"=>$cmt,
        ]);

    }
    public function photos(){
        $con = $this->model('Models');
        $arr = [];
        $imageExtension = array('jpg', 'png', 'jpeg', 'gif');

        $postOfUser = $con->getPostOfuser($_GET['id']);
        foreach ($postOfUser as $key => $value){
            $fileType = strtolower(pathinfo($value->media_content,PATHINFO_EXTENSION));
            if (in_array($fileType,$imageExtension)){
                array_push($arr,$value->media_content);
            }
        }

        $view = "profiles/Photos";
        $this->view($view,[
            "active"=>"photos",
            'data'=>$arr,
        ]);
    }
    public function videos(){
        $con = $this->model('Models');
        $arr = [];
        $videoExtension = array("mp4","avi","3gp","mov","mpeg","mp3");

        $postOfUser = $con->getPostOfuser($_GET['id']);
        foreach ($postOfUser as $key => $value){
            $fileType = strtolower(pathinfo($value->media_content,PATHINFO_EXTENSION));

            if (in_array($fileType,$videoExtension)){
                array_push($arr,$value);
            }

        }

        $view = "profiles/videos";
        $this->view($view,[
            "active"=>"videos",
            'data'=>$arr,
        ]);
    }

    public function friend(){
        $contruct = $this->model('TopBar');
        $arr = $contruct->readUserFollow($_GET['id']);
        $arr2 = $contruct->readAllFollow($_GET['id']);

        $view = "profiles/Friends";
        $this->view($view,[
            "active"=>"friends",
            "arrFollower"=>$arr,
            "model"=>$this->model('Models'),
            "user"=>$contruct,
            "allFollower"=>$arr2,
        ]);
    }

    public function about(){
        $ob = $this->model('Models');
        $top = $this->model('TopBar');

        $view = "profiles/Abouts";
        $this->view($view,[
            "active"=>"abouts"
        ]);
    }

    public function editProfile(){
        $contruct = $this->model('Models');
        $view = "profiles/EditProfile";
        $this->view($view,[
            "active"=>"action",
            "models"=>$contruct,
        ]);
    }
    public function updateProfile(){
        $arr = $this->model('updateUser');
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phoneNumber = $_POST['phoneNumber'];
        $birthday = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

        $gender = $_POST['gen'];
        $address = $_POST['address'];
        $desc = $_POST['description'];
        $keyId = $_POST['getDetailUserId'];
        $result = $arr->updateDetailUser($fname,$lname,$birthday,$phoneNumber,$gender,$address,$desc,$keyId);
        if ($result){
            header("location: profile/index.php?id=".$keyId);
        }
    }
    public function editWork(){
        $contruct = $this->model('updateUser');
        $view = "profiles/EditWork";
        $this->view($view,[
            "active"=>"action",
            "models"=>$contruct
        ]);
    }
    public function updateWork(){
        $keyId = $_POST['getDetailUserId'];
        $arr = json_encode($_POST,true);
        $contruct = $this->model('updateUser');
        if (($contruct->readWork($keyId)) != null){
            $a = $contruct->deleteWork($keyId);
            if ($a){
                $result = $contruct->updateWork($keyId,$arr);
            }
        } else {
            $result = $contruct->updateWork($keyId,$arr);
        }
        if ($result){
            header("location: profile/index.php?id=".$keyId);
        }
    }
    public function changePassword(){
        $view = "profiles/ChangePassword";
        $this->view($view,[
            "active"=>"action",
        ]);
    }
    public function changeUpdate(){
        $arr = array(
          'status'=>0,
          'message'=>''
        );
        $keyId = $_POST['id'];
        $pass = $_POST['pass'];
        $newPass = $_POST['newPass'];
        $contruct = $this->model('updateUser');
        $detail = $contruct->readUser($keyId);
        if (md5($pass) != $detail->password){
            $arr['status'] = 0;
            $arr['message'] = 'Wrong Password!';
        } else {
            $result = $contruct->updatePass($keyId,$newPass);
            $_SESSION['password'] = $newPass;
            if ($result){
                $arr['status'] = 1;
                $arr['message'] = 'Successfully';
            }
        }

        echo json_encode($arr);
    }
    public function follower(){
        $contruct = $this->model('TopBar');
        $id_user = $_POST['id_user'];
        $id_follower = $_POST['id_follower'];
        $result = $contruct->addFollower($id_user,$id_follower);
        $arr = $contruct->readFollowerOfUser($id_follower);
        if ($result){
            $arr = array('status'=>1,'countFl'=>count($arr));
        } else {
            $arr = array('status'=>0);
        }

        echo json_encode($arr);
    }
    public function unFollower(){
        $contruct = $this->model('TopBar');
        $id_user = $_POST['id_user'];
        $id_follower = $_POST['id_follower'];
        $result = $contruct->unFollower($id_user,$id_follower);
        $arr = $contruct->readFollowerOfUser($id_follower);
        if ($result){
            $arr = array('status'=>1,'countFl'=>count($arr));
        } else {
            $arr = array('status'=>0);
        }

        echo json_encode($arr);
    }
    public function uploadAvatar(){

        $keyId = $_POST['updateId'];
        $update = $this->model('updateUser');

        include "mvc/core/uploadFile.php";

        $up = new uploadFile();

        if ($_POST['isAvatar'] == 'cover'){
            $up->setUrl('public/images/cover/');
            $type = 1;
        } else {
            $up->setUrl('public/images/avatar/');
            $type = 2;
        }
        $filename = $up->checkUpload($keyId);
        if ($filename != null){

            if ($type == 2){
                $result = $update->updateAvatar($keyId,$filename);

            } else {
                $result = $update->updateCover($keyId,$filename);
            }
        } else {
            echo "<script>alert('An error occurred, please check again')</script>";
            $url = 'profile/index.php?id='.$keyId;
            header('location: '.$url);
        }

        if ($result){
            $url = 'profile/index.php?id='.$keyId;
            header('location: '.$url);
        }

    }
}
