<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/24
 * Time: 下午1:41
 * Function:
 */

$C_ID = $_POST['c_id'];
$C_Head = $_POST['C_Head'];

// 数据库操作
$result = null;

$sql="UPDATE customer SET C_Head = '$C_Head' WHERE C_ID = '$C_ID'";
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