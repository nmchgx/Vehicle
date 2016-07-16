<?php
/**
 * Created by PhpStorm.
 * User: nmchgx
 * Date: 16/7/16
 * Time: 下午3:30
 * Function:
 */

chdir(dirname(__FILE__));
include '../upacp_SDK/acp_service.php';

$Order_ID = $_POST['Order_ID'];
$txnAmt = $_POST['txnAmt'];
$merId = '777290058110048';
$txnTime = date('YmdHis');
$orderId = $txnTime + $Order_ID;

$result = null;
$data = null;

$params = array(

    //以下信息非特殊情况不需要改动
    'version' => '5.0.0',                 //版本号
    'encoding' => 'utf-8',				  //编码方式
    'txnType' => '01',				      //交易类型
    'txnSubType' => '01',				  //交易子类
    'bizType' => '000201',				  //业务类型
    'frontUrl' =>  SDK_FRONT_NOTIFY_URL,  //前台通知地址
    'backUrl' => SDK_BACK_NOTIFY_URL,	  //后台通知地址
    'signMethod' => '01',	              //签名方法
    'channelType' => '08',	              //渠道类型，07-PC，08-手机
    'accessType' => '0',		          //接入类型
    'currencyCode' => '156',	          //交易币种，境内商户固定156

    // 以下信息需要填写
    'merId' => $merId,		//商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
    'orderId' => $orderId,	//商户订单号，8-32位数字字母，不能含“-”或“_”，此处默认取demo演示页面传递的参数，可以自行定制规则
    'txnTime' => $txnTime,	//订单发送时间，格式为YYYYMMDDhhmmss，取北京时间，此处默认取demo演示页面传递的参数
    'txnAmt' => $txnAmt,	//交易金额，单位分，此处默认取demo演示页面传递的参数
// 		'reqReserved' =>'透传信息',        //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现，如有需要请启用并修改自己希望透传的数据
);

//AcpService::sign ( $params ); // 签名
//$url = SDK_App_Request_Url;
//
//$result_arr = AcpService::post ($params,$url);
//if(count($result_arr)<=0) { //没收到200应答的情况
//    returnData("未收到应答", 0, null);
//    return;
//}
//
//
//if (!AcpService::validate ($result_arr) ){
//    returnData("应答报文验签失败", 0, null);
//    return;
//}
//
//if ($result_arr["respCode"] == "00"){
//    //成功
//    $data['tn'] = $result_arr["tn"];
//    returnData("获取成功", 1, $data);
//} else {
//    //其他应答码做以失败处理
//    returnData($result_arr["respMsg"], 0, null);
//}
returnData("应答报文验签失败", 0, null);
//$sql = "SELECT orders.Order_ID, orders.C_ID,orders.Car_ID,car.Car_Model,orders.Filling_Type,orders.Filling_Amount,orders.Filling_Total,orders.Filling_Station_ID,orders.Filling_Station,orders.Filling_Time,orders.Order_Status,orders.Order_QRCode FROM orders,car WHERE orders.C_ID = '$C_ID' AND car.Car_ID = orders.Car_ID $key_words ORDER BY orders.Order_Time DESC";
//$sqlResult = $mysql->query($sql);
//
//if(!empty($sqlResult)){
//    foreach($sqlResult as $row=>$rowVal){
//        $data[$row] = $rowVal;
//    }
//
//    returnData("获取成功", 1, $data);
//}
//else{
//    returnData("获取失败", 0, null);
//}

function returnData ($msg, $code, $data) {
//    $result['msg'] = $msg;
//    $result['code'] = $code;
//    if ($data) {
//        $result['data'] = $data;
//    }
//
//    $json = JSON($result);
//    echo $json;
    echo '{"msg":"haha"}';
}