<?php
include "BaseController.php";

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $contr = $this->model('Models');
        $arr = $contr->getPost($_SESSION['idUser'],$_SESSION['idUser']);
//        echo "<pre>";
//        echo print_r($arr);
//        die();
        $view = "homes/Index";
        $this->view($view, [
            "model"=>$contr,
            "postNew"=>$arr,
        ]);

    }
    public function likeUnLike(){
        $keyId = $_SESSION['idUser'];
//        echo "<pre>";
//        echo print_r($_SESSION);
//        die();
        $postId = $_POST['postid'];
        $type = $_POST['type'];

        $contr = $this->model('Models');
        $arrCheck = $contr->checkExistUserLike($postId,$keyId);
        if ($arrCheck->cou > 0){
            if (($arrCheck->type) != $type){
                $result = $contr->updateIntoLikes($keyId,$postId,$type);
                $status = 0;
            } else {
                $result = $contr->deleteIntoLikes($keyId,$postId);
                $status = -1;
            }
        } else {
            $result = $contr->insertIntoLikes($keyId,$postId,$type);
            $status = 1;
        }

        if ($result){
            $unlike = $contr->countUnLike($postId);
            $like = $contr->countLike($postId);
        }
        $arr = array(
            'like'=>$like,
            'unlike'=>$unlike,
            'status'=>$status
        );

        echo json_encode($arr);
    }
    public function uploadFile()
    {
        $response = array(
            'status' => 0,
            'message' => 'An error occurred, please try again'
        );
        $ob = $this->model('Models');
        if (!empty($_FILES)){
            //        var_dump($_FILES);
//        die();

        $content = $_POST["content"];

        $arr = $ob->getDetailUser($_SESSION['email'], $_SESSION['password']);
        $primeId = $arr->id_user;
        $uploadDir = 'public/images/post/';
        $fileName = $primeId . '-' . rand(1, 100) . $_FILES['file']['name'];

        $PATH = $uploadDir.$fileName;

        $videoExtension = array("mp4","avi","3gp","mov","mpeg");
        $maxsize = 52428800;
        $imageExtension = array('jpg', 'png', 'jpeg', 'gif');

        $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $status = 0;
        if ($_FILES['file']['size'] > $maxsize){
            $response['status'] = 0;
            $response['message'] = 'The size is too large, please try again';
        }
         if (in_array($fileType,$imageExtension)){
             $status = 1;
         } else if (in_array($fileType,$videoExtension)){
             $status = 1;
         }

        if ($status != 0){
            if (move_uploaded_file($_FILES['file']['tmp_name'], $PATH)) {
                $response['status'] = 1;
                $result = $ob->postFile($primeId, $content, $fileName);

                if ($result) {
                    $response['message'] = 'Posted successfully, please wait for your friend\'s response';
                }
            }
        }
        }

        echo json_encode($response);
    }
}