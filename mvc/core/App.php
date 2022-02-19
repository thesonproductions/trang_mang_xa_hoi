<?php
// xử lí url, gọi controller,model,view
class App{
    protected $controller = 'HomeController'; // ten class
    protected $action = 'index'; // ten function
    protected $params = [];
    public function __construct()
    {
        $url = $this->urlProcess();

         //[0]=>Home [1] => index .........
//        echo "<pre>";
//        echo print_r($_GET);
//        die();
        if (file_exists("mvc/controllers/".$url[0]."Controller.php")){
            $this->controller = ucfirst($url[0]."Controller");
            unset($url[0]);
        }
        require_once "mvc/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;

        // xu li action
        if (isset($url[1])){
            if (method_exists($this->controller,$url[1])){
                $this->action = $url[1];
            }
            unset($url[1]);
        }
        // xu li params
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->action], $this->params );

    }
    public function urlProcess(){
        if (isset($_GET['url'])){
            $url = $_GET["url"];
            return array_values(array_filter(explode('/',$url))); // xoa bo khoang trang o dau ca cuoi cua url
        }
    }
}
