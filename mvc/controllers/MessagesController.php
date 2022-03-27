<?php
include "BaseController.php";
class MessagesController extends BaseController {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $mess = $this->model('Messenger');
        $view = "messages/index";
        $this->view($view,[
            'mess'=>$mess,
        ]);
    }

    public function appearChatContentMini(){
        $id_send = $_SESSION['idUser'];
        $id_receive = $_POST['id_receive'];

        $cont = $this->model('Messenger');
        $listChat = $cont->appearChat($id_send,$id_receive);
        $html = '';
        $html .= '<ul class="chatting-area">';
        foreach ($listChat as $key => $value){

            if ($value->id_user_send == $id_receive){
                $html .= ' <li class="you">
                                <figure><img src="public/images/avatar/'.($value->avatar == null ? "unknownUser.jpg" : $value->avatar ).'" alt=""></figure>
                                <p>'.$value->message.'</p>
                          </li>';
            } else {
                $html .= ' <li class="me">
                                <figure><img src="public/images/avatar/'.($value->avatar == null ? "unknownUser.jpg" : $value->avatar ).'" alt=""></figure>
                                <p>'.$value->message.'</p>
                          </li>';
            }

        }
        $html .= '</ul>';
        $html .= ' <div class="message-text-container">
                        <form method="post" id="chat-bar">
                            <textarea id="send-area" style="width: 100%!important;"></textarea>
                            <input type="hidden" name="id_send" value="'.$id_send.'" id="idSend">
                            <input type="hidden" name="id_receive" value="'.$id_receive.'" id="idReceive">
                            <button title="send" type="submit" id="send"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>';
        echo $html;
    }

    public function appearChatContent(){
        $id_send = $_SESSION['idUser'];
        $id_receive = $_POST['id_receive'];

        $cont = $this->model('Messenger');
        $listChat = $cont->appearChat($id_send,$id_receive);

        $html = ' <div class="conversation-head">
                    <figure style="width: 50px;height: 50px;">
                        <img src="public/images/avatar/'.(($cont->readUser($id_receive)->avatar) == null ? "unknownUser.jpg" : ($cont->readUser($id_receive)->avatar)).'" alt="" style="width: 100%;height: 100%;object-fit: cover;border-radius: 50%;">
                    </figure>
                    <span>'.($cont->readUser($id_receive)->username).'</span>
                </div>';
        $html .= '<ul class="chatting-area">';
        foreach ($listChat as $key => $value){

            if ($value->id_user_send == $id_receive){
                $html .= ' <li class="you">
                                <figure><img src="public/images/avatar/'.($value->avatar == null ? "unknownUser.jpg" : $value->avatar ).'" alt=""></figure>
                                <p>'.$value->message.'</p>
                          </li>';
            } else {
                $html .= ' <li class="me">
                                <figure><img src="public/images/avatar/'.($value->avatar == null ? "unknownUser.jpg" : $value->avatar ).'" alt=""></figure>
                                <p>'.$value->message.'</p>
                          </li>';
            }

        }
        $html .= '</ul>';
        $html .= ' <div class="message-text-container">
                        <form method="post" id="chat-bar">
                            <textarea id="send-area"></textarea>
                            <input type="hidden" name="id_send" value="'.$id_send.'" id="idSend">
                            <input type="hidden" name="id_receive" value="'.$id_receive.'" id="idReceive">
                            <button title="send" type="submit" id="send"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>';
        echo $html;
    }
    public function sendChat(){
        include 'public/js/pusher/vendor/autoload.php';

        $app_id = '1363228';
        $app_key = '2ccdca5b017f58d508dd';
        $app_secret = '2feceed59ff09b202b0c';
        $app_cluster = 'ap1';

        $pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);

        $content = $_POST['content'];
        $id_send = $_POST['id_send'];
        $id_receive = $_POST['id_receive'];
        $cont = $this->model("Messenger");
        $result = $cont->chat($id_send,$id_receive,$content);

        $countChat = count($this->model('TopBar')->countChat($id_receive));

        $data['message'] = array(
            'idReceive'=>$id_receive,
            'countChat'=>$countChat,
        );

        $pusher->trigger('notifications', 'sendChat', $data);

        if (!$result){
            echo "Failed!";
        }
    }
    public function showChat(){
        $id_send = $_SESSION['idUser'];
        $id_receive = $_POST['id_receive'];

        $cont = $this->model('Messenger');
        $listChat = $cont->appearChat($id_send,$id_receive);
        $html = '';
        foreach ($listChat as $key => $value){

            if ($value->id_user_send == $id_receive){
                $html .= ' <li class="you">
                                <figure><img src="public/images/avatar/'.($value->avatar == null ? "unknownUser.jpg" : $value->avatar ).'" alt=""></figure>
                                <p>'.$value->message.'</p>
                          </li>';
            } else {
                $html .= ' <li class="me">
                                <figure><img src="public/images/avatar/'.($value->avatar == null ? "unknownUser.jpg" : $value->avatar ).'" alt=""></figure>
                                <p>'.$value->message.'</p>
                          </li>';
            }

        }
        echo $html;
    }

    public function seenChat(){
        $cont = $this->model('Messenger');
        $myId = $_POST['myId'];
        $result = $cont->seenChat($myId);
        if ($result){
            echo "";
        }
    }
}