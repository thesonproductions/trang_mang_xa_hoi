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
//        $arr1 = $cmt->readComment(0,5);
//        echo "<pre>";
//        echo print_r($arr1);
//        die();
        $view = "homes/Index";
        $this->view($view, [
            "model"=>$contr,
            "postNew"=>$arr,
            "m_comment"=>$cmt,
        ]);

    }


    public function comment(){
        $arr = array(
            'status'=>0
        );
        $contructor = $this->model('Comments');
        $userId = $_POST['userId'];
        $postId = $_POST['postId'];
        $comment = $_POST['comment'];
        $result = $contructor->postComment($userId,$postId,$comment);
        if ($result){
            $arr['status'] = 1;
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
                $response['status'] = 1;
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

        echo json_encode($response);
    }

    public function readMore(){
        $contructor = $this->model('Comments');
        $row = $_POST['row'];
        $postId = $_POST['postId'];
        $arr = $contructor->readMore($row,$postId);

//        echo "<pre>";
//        echo print_r($arr);
//        die();

        $html = '';
        foreach ($arr as $key => $value){
            $html .= '<li><div class="comet-avatar"><img src="public/images/resources/comet-1.jpg" alt=""></div>';
            $html .= '<div class="we-comment"><div class="coment-head"><h5><a href="profile/index/'.$value->id_user.'" title="">Jason borne</a></h5>';
            $html .= '<span>1 year ago</span><a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a></div><p>'.$value->content.'</p></div><ul>';
            $reply = $contructor->readReply($value->id,$value->id_post);
            foreach ($reply as $index => $item){
                $html .= '<li>
                            <div class="comet-avatar">
                                <img src="public/images/resources/comet-3.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="profile/index/'.$item->id_user.'" title="">Olivia</a></h5>
                                    <span>16 days ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>'.$item->content.'</p>
                            </div>
                        </li>';
            }
            $html .= '</ul></li>';
        }
        echo $html;
    }
}