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
        $cmt = $this->model('Comments');

        $view = "homes/Index";
        $this->view($view, [
            "model"=>$contr,
            "postNew"=>$arr,
            "m_comment"=>$cmt,
        ]);

    }


    public function comment(){
        $arr = array(
            'status'=>0,
            'id'=>-1
        );
        $contructor = $this->model('Comments');
        $userId = $_POST['userId'];
        $postId = $_POST['postId'];
        $comment = $_POST['comment'];
        $result = $contructor->postComment($userId,$postId,$comment);
        if ($result != -1){
            $arr['status'] = 1;
            $arr['id'] = $result;
        }
        echo json_encode($arr);
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
    //----------------------------------------------------------------
    public function uploadFile()
    {

        $response = array(
            'status' => 0,
            'message' => 'An error occurred, please try again'
        );
        $ob = $this->model('Models');
        $content = $_POST["content"];

        $arr = $ob->getDetailUser($_SESSION['email'], $_SESSION['password']);
        $primeId = $arr->id_user;


        if (!empty($_FILES)){

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
                    $result = $ob->postFile($primeId, $content, $fileName);

                    if ($result) {
                        $response['message'] = 'Posted successfully, please wait for your friend\'s response';
                    }
                }
            }
        } else {
            $result = $ob->postFile($primeId, $content, null);
            if ($result) {
                $response['message'] = 'Posted successfully, please wait for your friend\'s response';
            }
        }
        header('location: Home');
    }
    //---------------------------------------------------/
    public function readMore(){
        $contructor = $this->model('Comments');
        $row = $_POST['row'];
        $postId = $_POST['postId'];

        $arr = $this->model('Models')->getDetailUser($_SESSION['email'], $_SESSION['password']);
        $keyId = $arr->id_user;

        $arr = $contructor->readMore($row,$postId);
        $model = $this->model('Models');

        $html = '';
        foreach ($arr as $key => $value){
            $detail = $model->readUser($value->id_user);
            $html .= '<li id="last'.$value->id.'"><div class="comet-avatar"><div class="border-avatar"><img src="public/images/avatar/'.$detail->avatar.'" alt=""></div></div>';
            $html .= '<div class="we-comment"><div class="coment-head"><h5><a href="profile/index.php?id='.$value->id_user.'" title="">'.$detail->username.'</a></h5>';
            $html .= '<span>'.$value->create_at.'</span><a class="we-reply" title="Reply"><i class="'.(($keyId == $value->id_user) ? 'ti-trash delete' : '').'" id="delete_'.$value->id.'"></i></a></div><p>'.$value->content.'</p></div>';
            $html .= '</li>';
        }
        echo $html;
    }

    public function deleteComment(){
        $idCmt = $_POST['idCmt'];
        $contructor = $this->model('Comments');
        $result = $contructor->deleteUser($idCmt);
        if ($result){
            $arr = array('status'=>1);
        }
        echo json_encode($arr);
    }
    public function deletePost(){
        $id = $_POST['id'];
        $contructor = $this->model('Comments');

        $model = $this->model('Models');
        $post = $model->readPostById($id);

        $file_name = $post->media_content;
        $folder="public/images/post/";
        $file_name=$folder."".$file_name;

        unlink($file_name);

        $result = $contructor->deletePost($id);

        echo $result;
    }
    public function editPost(){
        $model = $this->model('Models');
        $content = $_POST['contentEdit'];
        $idPost = $_POST['idPostEdit'];

        $post = $model->readPostById($idPost);

        if (!$_FILES['editFile']['name']){
            $result = $model->editPostWithoutFile($idPost,$content);
        } else {

            if ($_FILES['editFile']['error']==0) {
                $file_name = $post->id_user . '-' . rand(1, 100) .$_FILES['editFile']['name'];
            } else {
                echo "<script>alert('error')</script>";
                header('location: index');
            }

            $folder="public/images/post/";

            unlink($folder.''.($post->media_content));

            if (move_uploaded_file($_FILES['editFile']['tmp_name'],$folder.''.$file_name)){
                $result = $model->editPost($idPost,$content,$file_name);
            }

        }

        if ($result){
            echo "<script>alert('Update success')</script>";
        }
        header('location: index');
    }

    public function search(){
        $conn = $this->model('Models');
        if (isset($_POST['query'])){
            $result = $conn->search($_POST['query']);
        } else {
            $result = null;
        }
//        echo "<pre>";
//        echo print_r($result);
//        die();
        $html = '';
        if (isset($result)){
            foreach ($result as $key => $value){
                $html .= '<li class="search-size list-group-item">
                            <a href="profile/index.php?id='.$value->id_user.'" style="display: flex;">
                                <figure style="width: 45px;height: 40px;">
                                    <img src="public/images/avatar/'.(($value->avatar != null) ? $value->avatar : 'unknownUser.jpg' ).'" style="max-width: 100%;max-height: 100%;object-fit: cover;border-radius: 50%;">
                                </figure>
                                <div>
                                    <p style="color: black;">'.$value->username. '</p>
                                    <p style="color: #7b7777;position: absolute;top: 30px;">' .$value->email.'</p>
                                </div>
                            </a>
                        </li>';
            };
        }

        echo $html;
    }
}