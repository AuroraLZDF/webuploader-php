<?php

$ds = DIRECTORY_SEPARATOR;

$storeFolder = 'uploads';

if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];

    $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;

    $targetFile = $targetPath . $_FILES['file']['name'];

    if (!move_uploaded_file($tempFile, $targetFile)) {
        echo json_encode(['code' => 2, 'msg' => '上传图片失败！']);
        exit;
    }

    echo json_encode(['code' => 1, 'msg' => '上传图片成功！', 'file_path' => $targetFile]);
    exit;
}

echo json_encode(['code' => 2, 'msg' => '网络错误！']);
exit;