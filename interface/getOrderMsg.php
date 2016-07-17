<?php
	require "../helper/jsonHelper.php";
	require "../helper/connectSQL.php";
	$Order_Key = $_POST['Order_Key'];
	
	$sql = "SELECT C_NickName, Car_Brand, Car_Model, Car_LicensePlate, Filling_Type, Filling_Amount, Filling_Total, Filling_Station, Filling_Time, Order_Status, Pay_Status FROM car, customer, orders WHERE car.Car_ID=orders.Car_ID AND customer.C_ID=orders.C_ID AND Orders.Order_Key ='".$Order_Key."'";
	
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
			
			if($row['Pay_Status'] === "0")
				$ordermsg = setData(8, "支付状态", "未支付", $ordermsg);
			else
				$ordermsg = setData(8, "支付状态", "已支付", $ordermsg);
			
			
			if($row['Order_Status'] === "0")
				$ordermsg = setData(9, "订单状态", "已取消", $ordermsg);
			else if($row['Order_Status'] === "1")
				$ordermsg = setData(9, "订单状态", "已下单", $ordermsg);
			else if($row['Order_Status'] === "2"){
				$ordermsg = setData(9, "订单状态", "已接单", $ordermsg);
			}else{
				$ordermsg = setData(9, "订单状态", "已完成", $ordermsg);
			}
			

			
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