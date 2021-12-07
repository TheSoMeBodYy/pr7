<?php
$target_dir = "public/images/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$isUploaded = false;
$filePath = '';
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["photo"]["tmp_name"]);
if($check !== false) {
    $isUploaded = true;
} else {
    $isUploaded = false;
}

if (file_exists($target_file)) {
    //echo "Файл уже существует.<br>";
    $isUploaded = false;
}

if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
    && $fileType != "gif" ) {
    //echo "Неверный формат.<br>";
    $isUploaded = false;
}
if (!$isUploaded) {
    //echo "Ваш файл не установлен, будет загружено изображение по умолчанию<br>";
    $filePath = "public/images/default.jpg";
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $filePath = $target_dir . basename($_FILES["photo"]["name"]);
    }
}