<?php
	require "jsonHelper.php";
	require "connectSQL.php";
	ini_set("display_errors", "On");
	error_reporting(E_ALL | E_STRICT);
	require_once("JPush/JPush.php");
	
	$mil = $_POST['mil'];
	$gas = $_POST['gas'];
	$light = $_POST['light'];
	$eng = $_POST['eng'];
	$tran = $_POST['tran'];
	$car_id = $_POST['car_id'];
	$car_title = $_POST['car_title'];
	$c_id = $_POST['c_id'];
	
	$sql ="update car set Car_Mileage=".$mil.", Car_GasVol=".$gas.", Car_EngIsOK=".$eng.", Car_TranIsOK=".$tran.", Car_LightIsOK=".$light." where Car_ID=".$car_id;
	
	$result=mysql_query($sql);
	
	$returnStr;	
	if($result === false)
	{	
		$obj['length'] = 0;
		
		$array['data'] = $obj;
		$array['msg'] = "连接出错";
		$array['code'] = -1;
		
		$returnStr = JSON($array);
	}
	else
	{
		$intMil = (int)$mil;
		$intGas = (int)$gas;
		if($intMil%15000==0 || $intGas<20 || $light==="0" || $eng==="0" || $tran=== "0"){
			$app_key = '012fcdc77a63018fce8e617f';
			$master_secret = '069f96cbec4b8c6c22c21c35';
			
			// 初始化
			$client = new JPush($app_key, $master_secret);
			
			// 完整的推送示例,包含指定Platform,指定Alias,Tag,指定iOS,Android notification,指定Message等
			$result = $client->push()
			->setPlatform(array('ios', 'android'))
			->addAlias($c_id)
		//    ->addTag(array('tag1', 'tag2'))
		//	->setNotificationAlert('')
			->addAndroidNotification('请尽快维修', '车辆出现异常', 1, array("Car_ID"=>$car_id, "Car_Title"=>$car_title))
		 //   ->addIosNotification("Hi, iOS notification", 'iOS sound', JPush::DISABLE_BADGE, true, 'iOS category', array("key1"=>"value1", "key2"=>"value2"))
		 //   ->setMessage("msg content", 'msg title', 'type', array("key1"=>"value1", "key2"=>"value2"))
			->setOptions(100000, 3600, null, false)
			->send();
			
			$sql1 = "";
		}
		else{
			$obj = 0;
		}
	//	$obj['length'] = 0;
				
		$array['data'] = $obj;
		$array['msg'] = "更新成功";
		$array['code'] = 1;
				
		$returnStr = JSON($array);
	}
	
	// 释放资源
    mysql_free_result($result);
	
	echo $returnStr;
	
?>