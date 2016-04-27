<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/24
 * Time: 下午12:01
 * Function:
 */

$result = null;
$data = null;

chdir(dirname(__FILE__));
require "upload.php";
$QiniuToken = QiniuCreateToken();

if(!empty($QiniuToken)){
    $data['QiniuToken'] = $QiniuToken;

    returnData("获取成功", 1, $data);
}
else{
    returnData("获取失败", 0, null);
}

function returnData ($msg, $code, $data) {
    $result['msg'] = $msg;
    $result['code'] = $code;
    if ($data) {
        $result['data'] = $data;
    }

    $json = JSON($result);
    echo $json;
}