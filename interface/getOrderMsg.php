<?php
	require "../helper/jsonHelper.php";
	require "../helper/connectSQL.php";
	$order_id = $_POST['order_id'];
	$car_id = $_POST['car_id'];
	$c_id = $_POST['c_id'];
	
	$sql = "SELECT C_NickName, Car_Brand, Car_Model, Car_LicensePlate, Filling_Type, Filling_Amount, Filling_Total, Filling_Station, Filling_Time, Order_Status FROM car, customer, orders WHERE car.Car_ID=".$car_id." AND customer.C_ID=".$c_id." AND Orders.Order_ID =".$order_id;
	
	$result=mysql_query($sql);
	
	$returnStr;
	$ordermsg;
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
		$i = 0;
		while($row=mysql_fetch_array($result))
		{
			$ordermsg = setData(0, "用户", $row['C_NickName'], $ordermsg);
			$ordermsg = setData(1, "汽车", $row['Car_Brand'].$row['Car_Model'], $ordermsg);
			$ordermsg = setData(2, "车牌", $row['Car_LicensePlate'], $ordermsg);
			$ordermsg = setData(3, "加油类型", $row['Filling_Type'], $ordermsg);
			$ordermsg = setData(4, "加油数量", $row['Filling_Amount']."L", $ordermsg);
			$ordermsg = setData(5, "总价格", "￥".$row['Filling_Total']."元", $ordermsg);
			$ordermsg = setData(6, "加油站", $row['Filling_Station'], $ordermsg);
			$ordermsg = setData(7, "加油时间", $row['Filling_Time'], $ordermsg);
			if($row['Order_Status'] === "1")
				$ordermsg = setData(8, "订单状态", "未完成", $ordermsg);
			else
				$ordermsg = setData(8, "订单状态", "已完成", $ordermsg);
			
			$i++;
		}
		if($i === 0){
			$obj['length'] = 0;
		
			$array['data'] = $obj;
			$array['msg'] = "订单不存在";
			$array['code'] = 0;
			
			$returnStr = JSON($array);		
			
		}
		else{
			
			$obj['myOrder'] = $ordermsg;
			
			$array['data'] = $obj;
			$array['msg'] = "获取订单信息成功";
			$array['code'] = 1;
			$returnStr = JSON($array);
		}
	}

	// 释放资源
    mysql_free_result($result);
	
	echo $returnStr;
	
	function setData($index, $key, $value, $ordermsg) {
		$ordermsg[$index]['key'] = $key;
		
		$ordermsg[$index]['value']= $value;
    	return $ordermsg;
	}
?>