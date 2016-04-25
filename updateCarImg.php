<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/25
 * Time: 下午1:34
 * Function:
 */

$C_ID = $_POST['c_id'];
$Car_ID = $_POST['Car_ID'];
$Car_Img = $_POST['Car_Img'];

// 数据库操作
$result = null;

$sql="UPDATE car SET Car_Img = '$Car_Img' WHERE C_ID = '$C_ID' AND Car_ID = '$Car_ID'";
$sqlResult=$mysql->query($sql);

if(!empty($sqlResult)) {
    returnData("修改成功", 1);
}else{
    returnData("修改失败", 0);
}

function returnData ($msg, $code) {
    $result['msg'] = $msg;
    $result['code'] = $code;

    $json = JSON($result);
    echo $json;
}