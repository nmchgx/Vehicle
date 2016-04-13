<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/4/13
 * Time: 上午9:18
 */

include 'phpqrcode/phpqrcode.php';

$C_ID = $_POST['C_ID'];
$Car_ID = $_POST['Car_ID'];
$Filling_Type = $_POST['Filling_Type'];
$Filling_Amount = $_POST['Filling_Amount'];
$Filling_Station_ID = $_POST['Filling_Station_ID'];
$Filling_Station = $_POST['Filling_Station'];
$Filling_Time = $_POST['Filling_Time'];

$data = null;
$qrcode = null;

$data['C_ID'] = $C_ID;
$data['Car_ID'] = $Car_ID;
$data['Filling_Type'] = $Filling_Type;
$data['Filling_Amount'] = $Filling_Amount;
$data['Filling_Station_ID'] = $Filling_Station_ID;
$data['Filling_Station'] = $Filling_Station;
$data['Filling_Time'] = $Filling_Time;

$qrcode['data'] = $data;
$qrcode_json = JSON($qrcode);
$timestamp = strtotime('+0 day');
$qrcode_name = "filling-$C_ID-$Car_ID-$timestamp.png";
//echo $qrcode_name;

QRcode::png($qrcode_json, $qrcode_name, QR_ECLEVEL_L, 5, 0);

$result = null;

$sql="INSERT INTO orders (C_ID,Car_ID,Filling_Type,Filling_Amount,Filling_Station_ID,Filling_Station,Filling_Time,Order_Status) VALUES ('$C_ID','$Car_ID','$Filling_Type','$Filling_Amount','$Filling_Station_ID','$Filling_Station','$Filling_Time','0')";
$sqlResult=$mysql->query($sql);
//echo $sql;
if(!empty($sqlResult)) {
    $result['msg'] = '下单成功';
    $result['code'] = 1;

    $json = JSON($result);
    echo $json;
}else{
    $result['msg'] = '下单失败';
    $result['code'] = 0;

    $json = JSON($result);
    echo $json;
}