<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/14
 * Time: 上午8:31
 * Function: 获取汽车加油订单
 */

$C_ID = $_POST['C_ID'];
$type = $_POST['type'];
$key_words = null;
$result = null;
$data = null;

switch ($type) {
    case 0: {$key_words = "";break;} // 所有
    case 1: {$key_words = "AND orders.Order_Status in (0, 3)";break;} // 已完成
    case 2: {$key_words = "AND orders.Order_Status in (1, 2)";break;} // 未完成
}

$sql = "SELECT orders.Order_ID, orders.C_ID,orders.Car_ID,car.Car_Model,orders.Filling_Type,orders.Filling_Amount,orders.Filling_Station_ID,orders.Filling_Station,orders.Filling_Time,orders.Order_Status,orders.Order_QRCode FROM orders,car WHERE orders.C_ID = '$C_ID' AND car.Car_ID = orders.Car_ID $key_words ORDER BY orders.Order_Time DESC";
$sqlResult = $mysql->query($sql);

if(!empty($sqlResult)){
    foreach($sqlResult as $row=>$rowVal){
        $data[$row] = $rowVal;
    }

    returnData("获取成功", 1, $data);
}
else{
    returnData("获取失败", 0);
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