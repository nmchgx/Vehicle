<?php
	//require "jsonHelper.php";
	//require "connectSQL.php";
	
	$Car_ID = $_POST['Car_ID'];
	
	//$Car_ID = $_GET['Car_ID'];
	//$Car_ID = 1;
	
	$sql = "SELECT * FROM car WHERE Car_ID =".$Car_ID;
	
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
	else{
		$data;
		$carmsg;
		$i = 0;
		
		while($row=mysql_fetch_array($result))
		{
			$carmsg[0]['key'] = '汽车品牌';
			$carmsg[0]['value'] = $row['Car_Brand'];
			$carmsg[0]['status'] = 0;
			$carmsg[1]['key'] = "型号";
			$carmsg[1]["value"] = $row['Car_Model'];
			$carmsg[1]['status'] = 0;
			$carmsg[2]['key'] = "车牌号";
			$carmsg[2]["value"] = $row['Car_LicensePlate'];
			$carmsg[2]['status'] = 0;
			$carmsg[3]['key'] =  "发动机号";
			$carmsg[3]["value"] =  $row['Car_EngineNum'];
			$carmsg[3]['status'] = 0;
			$carmsg[4]['key'] = "车身级别";
			$carmsg[4]["value"] = $row['Car_BodyLevel'];
			$carmsg[4]['status'] = 0;
			$carmsg[5]['key'] = "里程数";
			$carmsg[5]["value"] = $row['Car_Mileage']."km";
			$li = (int)$row['Car_Mileage'];
			if($li%15000 === 0){
				$carmsg[5]['status'] = 2;
			}
			else{
				$carmsg[5]['status'] = 1;
			}
			
			$carmsg[6]['key'] = "油量";
			$is = (int)$row['Car_GasVol'];
			$carmsg[6]["value"] = $row['Car_GasVol']."%";
			if($is > 20){
				$carmsg[6]['status'] = 1;
			}else{
				$carmsg[6]['status'] = 2;
			}
			
			
			
			$carmsg[7]['key'] = "发动机状态";
			if($row['Car_EngIsOK'] ==="1"){
				$carmsg[7]["value"] = '正常';
				$carmsg[7]['status'] = 1;
			}else{
				$carmsg[7]["value"] = '异常';
				$carmsg[7]['status'] = 2;
			}
			
			$carmsg[8]['key'] = "变速器状态";
			if($row['Car_TranIsOK'] === "1"){
				$carmsg[8]["value"] = '正常';
				$carmsg[8]['status'] = 1;
			}else{
				$carmsg[8]["value"] = '异常';
				$carmsg[8]['status'] = 2;
			}
			
			$carmsg[9]['key'] = "车灯状态";
			if($row['Car_LightIsOK'] ==="1"){
				$carmsg[9]["value"] = '正常';
				$carmsg[9]['status'] = 1;
			}else{
				$carmsg[9]["value"] = '异常';
				$carmsg[9]['status'] = 2;
			}
			
			$arr['carMsg']['carmsg'] = $carmsg;
			$arr['carMsg']['Car_ID'] = $row['Car_ID'];
			$arr['carMsg']['Car_Img'] = $row['Car_Img'];
			
			$data = $arr['carMsg'];
			
			$i++;
		}
		if($i === 0){
			$obj['length'] = 0;
		
			$array['data'] = $obj;
			$array['msg'] = "该车辆没有相关信息";
			$array['code'] = 0;
			
			$returnStr = JSON($array);		
			
		}
		else{
			
		//	$obj['myCar'] = $data;
			
			$array['data'] = $data;
			$array['msg'] = "获取车辆信息成功";
			$array['code'] = 1;
			$returnStr = JSON($array);
		}
	}

	// 释放资源
    mysql_free_result($result);
	
	echo $returnStr;
	
	
?>