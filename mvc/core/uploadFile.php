<?php
class uploadFile{
    public function upload($primeId)
    {
        $upload;
        foreach ($_FILES as $key => $value){
            $upload=$key;
        }
        if ($_FILES[$upload]['error'] != 0){
            return array(
                'status'=>0,
                'message'=>'An error occurred, please try again'
            );
        }
        $uploadDir = 'public/images/post/';
        $fileName = $primeId.'-'.rand(1,100).$_FILES[$upload]['name'];
        $PATH = $uploadDir.$fileName;
        if (move_uploaded_file($_FILES[$upload]['tmp_name'],$PATH)){
            return array(
                'status'=>1,
                'message'=>'Posted successfully, please wait for your friend\'s response',
                'filename'=>$fileName,
            );
        }
    }
}
?>