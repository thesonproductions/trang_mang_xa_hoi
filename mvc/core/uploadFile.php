<?php

class uploadFile
{
    private $url = 'public/images/';
    public function setUrl($url){
        $this->url = $url;
    }
    public function getUrl(){
        return $this->url;
    }
    public function checkUpload($primeId){


        if (!empty($_FILES)){
            foreach ($_FILES as $key => $value)
            {
                $upload = $key;
            }
            $uploadDir = $this->url;

            $fileName = $primeId . '-' . rand(1, 100) . $_FILES[$upload]['name'];

            $PATH = $uploadDir.$fileName;

            $maxsize = 52428800;
            $imageExtension = array('jpg', 'png', 'jpeg', 'gif');

            $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

            if ($_FILES[$upload]['size'] > $maxsize){
                return null;
            }
            if (!in_array($fileType,$imageExtension)){
                return null;
            }

           move_uploaded_file($_FILES[$upload]['tmp_name'], $PATH);
            return $fileName;


        } else {
            return null;
        }

    }
}
?>