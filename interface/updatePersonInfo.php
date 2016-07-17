<?php
/**
 * User: zqh
 * Date: 16/7/17
 * Time: 下午1:34
 * Function:
 */

$C_ID = $_POST['c_id'];
$C_NickName = $_POST['C_NickName'];
$C_Sex = $_POST['C_Sex'];
$C_Birthday = $_POST['C_Birthday'];
$C_Place = $_POST['C_Place'];
$C_Sign = $_POST['C_Sign'];

// 数据库操作
$result = null;

$sql = "update customer set ";
if($C_NickName.length > 0){
	$sql += " C_NickName='".$C_NickName."' ";
}else if($C_Sex.length>0){
	$sql += " , C_Sex='".$C_Sex."' ";
}else if($C_Birthday.length>0){
	$sql += " , C_Birthday='".$C_Birthday."' ";
}else if($C_Place.length>0){
	$sql += " , C_Place='".$C_Place."' ";
}else if($C_Sign.length>0){
	$sql += " , C_Sign='".$C_Sign."' ";
}

$sql += " where C_ID=".$C_ID;

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

?>