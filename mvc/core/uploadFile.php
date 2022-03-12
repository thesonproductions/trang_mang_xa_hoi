<?php

class uploadFile
{
//var_dump($_FILES);
//die();
foreach ($_FILES as $key => $value)
{
$upload = $key;
$arr = explode("-", $key);
}

//var_dump($arr);
//die();
// file upload.php xử lý upload file

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //$_SERVER['REQUEST_METHOD'] kiểm tra xem phương thức nào truy vấn đến server như GET,POST,PUT,HEAD
    // Dữ liệu gửi lên server không bằng phương thức post
    echo "Phải Post dữ liệu";
    die;
}
//khi gửi dữ liệu lên nó sẽ được lưu ở dạng file trong một thư mục tạm nên cần phải chuyển nó sang file lưu trữ,nếu ko sẽ mất
// Kiểm tra có dữ liệu fileupload trong $_FILES không
// Nếu không có thì dừng
if (!isset($_FILES[$upload])) {
    echo "Dữ liệu không đúng cấu trúc";
    die;
}

// Kiểm tra dữ liệu có bị lỗi không
if ($_FILES[$upload]['error'] != 0) {
    echo "Dữ liệu upload bị lỗi";
    die;
}

// Đã có dữ liệu upload, thực hiện xử lý file upload

//Thư mục bạn sẽ lưu file upload
$target_dir = "uploads/";
//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
$target_file = $target_dir . $arr[0] . '.' . pathinfo($_FILES[$upload]['name'], PATHINFO_EXTENSION);
//echo rand(1,10).$target_file;
//die();
$allowUpload = true;

//Lấy phần mở rộng của file (jpg, png, ...)
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
echo $imageFileType;
// Cỡ lớn nhất được upload (bytes)
$maxfilesize = 16777216;

////Những loại file được phép upload
$allowtypes = array('jpg', 'png', 'jpeg', 'gif');


if (isset($_POST["submit"])) {
    //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
    $check = getimagesize($_FILES[$upload]["tmp_name"]);
    if (is_array($check))//kiểm tra nếu trả về mảng thì tồn tại ảnh, nếu ko thì ko phải
    {
        echo "Đây là file ảnh - " . $check["mime"] . ".";
        $allowUpload = true;
    } else {
        echo "Không phải file ảnh.";
        $allowUpload = false;
    }
}

// Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
// Bạn có thể phát triển code để lưu thành một tên file khác
if (file_exists($target_file)) {
    echo "Tên file đã tồn tại trên server, không được ghi đè";
    $allowUpload = false;
}
// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
if ($_FILES[$upload]["size"] > $maxfilesize) {
    echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
    $allowUpload = false;
}


// Kiểm tra kiểu file
if (!in_array($imageFileType, $allowtypes)) {
    echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
    $allowUpload = false;
}
if ($allowUpload) {
    // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
    if (move_uploaded_file($_FILES[$upload]["tmp_name"], $target_file)) {
        echo "File " . basename($_FILES[$upload]["name"]) .
            " Đã upload thành công.";

        echo "File lưu tại " . $target_file;


    } else {
        echo "Có lỗi xảy ra khi upload file.";
    }
} else {
    echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
}
}
?>