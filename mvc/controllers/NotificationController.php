<?php
include "BaseController.php";
class NotificationController extends BaseController {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $view = "notifications/index";
        $this->view($view,[
            "active"=>"action"
        ]);
    }

    public function notifications(){
        include 'public/js/pusher/vendor/autoload.php';

        $app_id = '1363228';
        $app_key = '2ccdca5b017f58d508dd';
        $app_secret = '2feceed59ff09b202b0c';
        $app_cluster = 'ap1';

        $pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);

        $id_post = $_POST['id_post'];
        $type = $_POST['type'];
        $keyId = $_SESSION['idUser']; // id của người đang thực hiện notifications

        $a = array('disLike','Like','Comment');
        $contruct = $this->model('Models');

        $detailPost = $contruct->readPostById($id_post);

        $id = $detailPost->id_user;

        $instance = $this->model('Notification');

        $checkExist = $instance->checkExistNoti($keyId,$id_post);

        if (!empty($checkExist)){
            if ($checkExist[0]->type == $type){
                $instance->deleteNoti($checkExist[0]->id);
            } else {
                $instance->updateNoti($checkExist[0]->id,$type);
            }
        } else {
            $result = $instance->insertNoti($keyId, $id, $id_post, $type);
            // id_notifier la id cua nguoi ma thuc hien hanh dong like, id_user la id dung de hien thi
            $readNoti = $instance->readNotification($id); // đếm tổng số notification thôi, không đọng gì vào

            $noti = $instance->readNotiById($result);

            $html = '';


            $detailUser = $contruct->readUser($noti->id_notifier);
            $ava = ($detailUser->avatar == NULL) ? 'unknownUser.jpg' : $detailUser->avatar;

            $html .= '<a class="dropdown-item" style="cursor: pointer;">
                    <div class="minibox-side">
                        <img src="public/images/avatar/'.$ava.'" style="max-height: 100%;max-width: 100%;object-fit: cover;width: 50px;height: 45px">
                        <div style="'.(($noti->status == 1) ? 'font-weight: bold;' : '').'">
                            <h6>'.$detailUser->username.'</h6>
                            <span>'.$a[$noti->type].' your post</span>
                            <i>'.$this->time_ago($noti->create_at).'</i>
                        </div>
                    </div>
                </a>';

            $total = count($readNoti);

                $data['message'] = array(
                    'notifier'=> $noti->id_user,
                    'count'=>$total,
                    'noti'=>$html,
                );

                $pusher->trigger('notifications', 'noti', $data);
            }


        echo 'done';
    }
    public function statusnotification(){
        $id_uer = $_POST['id_user'];
        $instance = $this->model('Notification');
        $result = $instance->updateStatus($id_uer);
        if ($result){
            $countN = count($instance->readNotification($id_uer));
        }

        $arr = array('countN'=>$countN);
        echo json_encode($arr);
    }

    function time_ago($timestamp)
    {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes      = round($seconds / 60 );           // value 60 is seconds
        $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks          = round($seconds / 604800);          // 7*24*60*60;
        $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if($seconds <= 60)
        {
            return "Just Now";
        }
        else if($minutes <=60)
        {
            if($minutes==1)
            {
                return "one minute ago";
            }
            else
            {
                return "$minutes minutes ago";
            }
        }
        else if($hours <=24)
        {
            if($hours==1)
            {
                return "an hour ago";
            }
            else
            {
                return "$hours hrs ago";
            }
        }
        else if($days <= 7)
        {
            if($days==1)
            {
                return "yesterday";
            }
            else
            {
                return "$days days ago";
            }
        }
        else if($weeks <= 4.3) //4.3 == 52/12
        {
            if($weeks==1)
            {
                return "a week ago";
            }
            else
            {
                return "$weeks weeks ago";
            }
        }
        else if($months <=12)
        {
            if($months==1)
            {
                return "a month ago";
            }
            else
            {
                return "$months months ago";
            }
        }
        else
        {
            if($years==1)
            {
                return "one year ago";
            }
            else
            {
                return "$years years ago";
            }
        }
    }
}