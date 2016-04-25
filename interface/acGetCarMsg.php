<?php
	require "jsonHelper.php";
	require "connectSQL.php";
	$C_LoginName = $_POST['account'];
	
	$sql = "SELECT Car_ID, Car_Brand, Car_Model, car.C_ID FROM car, customer WHERE car.C_ID=customer.C_ID AND C_LoginName ='".$C_LoginName."'";
	
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
		$i = 0;
		$c_id="";
		while($row=mysql_fetch_array($result))
		{
			$data[$i]['Car_ID'] = $row['Car_ID'];
			$data[$i]['Car_Title'] = $row['Car_Brand'].$row['Car_Model'];
			$c_id = $row['C_ID'];
			$i++;
		}
		if($i === 0){
			$obj['length'] = 0;
		
			$array['data'] = $obj;
			$array['msg'] = "当前还未有车辆";
			$array['code'] = 0;
			
			$returnStr = JSON($array);		
			
		}
		else{
			
			$obj['myCars'] = $data;
			$obj['c_id'] = $c_id;
			
			$array['data'] = $obj;
			$array['msg'] = "获取车辆成功";
			$array['code'] = 1;
			$returnStr = JSON($array);
		}
	}

	// 释放资源
    mysql_free_result($result);
	
	echo $returnStr;
?>