<?php
	
	//require "jsonHelper.php";
	//require "connectSQL.php";
	$c_id = $_POST['c_id'];
	//$loginName = 'Yann';
	
	$sql = "SELECT Car_ID, Car_Brand, Car_Model FROM car WHERE C_ID = ".$c_id;
	
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
		
		while($row=mysql_fetch_array($result))
		{
			$data[$i]['Car_ID'] = $row['Car_ID'];
			$data[$i]['Car_Title'] = $row['Car_Brand'].$row['Car_Model'];
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