<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/14
 * Time: 上午8:31
 */

$C_ID = $_POST['C_ID'];
$result = null;
$data = null;
$finished = null;
$unfinished = null;

$sql_finished = "SELECT orders.Order_ID, orders.C_ID,orders.Car_ID,car.Car_Model,orders.Filling_Type,orders.Filling_Amount,orders.Filling_Station_ID,orders.Filling_Station,orders.Filling_Time,orders.Order_Status,orders.Order_QRCode FROM orders,car WHERE orders.C_ID = '$C_ID' AND car.Car_ID = orders.Car_ID AND orders.Order_Status in (0, 3) ORDER BY orders.Order_Time DESC";
//echo $sql_finished;
$sqlResult_finished = $mysql->query($sql_finished);

if(!empty($sqlResult_finished)){
    foreach($sqlResult_finished as $row=>$rowVal){
        $finished[$row] = $rowVal;
    }

    $data['finished'] = $finished;

    $sql_unfinished = "SELECT orders.Order_ID, orders.C_ID,orders.Car_ID,car.Car_Model,orders.Filling_Type,orders.Filling_Amount,orders.Filling_Station_ID,orders.Filling_Station,orders.Filling_Time,orders.Order_Status,orders.Order_QRCode FROM orders,car WHERE orders.C_ID = '$C_ID' AND car.Car_ID = orders.Car_ID AND orders.Order_Status in (1, 2) ORDER BY orders.Order_Time DESC";
    $sqlResult_unfinished = $mysql->query($sql_unfinished);

    if(!empty($sqlResult_unfinished)){
        foreach($sqlResult_unfinished as $row=>$rowVal){
            $unfinished[$row] = $rowVal;
        }

        $data['unfinished'] = $unfinished;
        $result['msg'] = '获取成功';
        $result['code'] = 1;
        $result['data'] = $data;

        $json = JSON($result);
        echo $json;
    }
    else{
        $result['msg'] = '获取失败';
        $result['code'] = 0;

        $json = JSON($result);
        echo $json;
    }
}
else{
    $result['msg'] = '获取失败';
    $result['code'] = 0;

    $json = JSON($result);
    echo $json;
}