<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/14
 * Time: 上午10:04
 * Function: 取消汽车加油订单
 */

$C_ID = $_POST['C_ID'];
$Order_ID = $_POST['Order_ID'];

// 数据库操作
$result = null;

$sql="UPDATE orders SET Order_Status = 0 WHERE Order_ID = '$Order_ID' AND C_ID = '$C_ID'";
$sqlResult=$mysql->query($sql);
//echo $sql;
if(!empty($sqlResult)) {
    $result['msg'] = '取消成功';
    $result['code'] = 1;

    $json = JSON($result);
    echo $json;
}else{
    $result['msg'] = '取消失败';
    $result['code'] = 0;

    $json = JSON($result);
    echo $json;
}