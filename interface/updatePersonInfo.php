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

$sql = "update customer set C_NickName='".$C_NickName."', C_Sex='".$C_Sex."', C_Birthday='".$C_Birthday."', C_Place='".$C_Place."',  C_Sign='".$C_Sign."' where C_ID=".$C_ID;

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

?>