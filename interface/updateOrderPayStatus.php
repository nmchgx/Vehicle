<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/14
 * Time: 上午10:04
 * Function: 取消汽车加油订单
 */

$C_ID = $_POST['c_id'];
$Order_ID = $_POST['Order_ID'];

// 数据库操作
$result = null;

$sql="UPDATE orders SET Pay_Status = 1 WHERE Order_ID = '$Order_ID' AND C_ID = '$C_ID'";
$sqlResult=$mysql->query($sql);

if(!empty($sqlResult)) {
    returnData("更新成功", 1);
}else{
    returnData("更新失败", 0);
}

function returnData ($msg, $code) {
    $result['msg'] = $msg;
    $result['code'] = $code;

    $json = JSON($result);
    echo $json;
}