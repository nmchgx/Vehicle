<?php
	//require "jsonHelper.php";
	//require "connectSQL.php";
	
	$Car_ID = $_POST['Car_ID'];
	
	$c_id = $_POST['c_id'];
	
	//$Car_ID = 5;
	//$C_ID = 1;
	
	$sql = "DELETE FROM car WHERE Car_ID =".$Car_ID. " AND C_ID=".$c_id;
	$result=mysql_query($sql);
	
	$returnStr;	
	if($result === false)
	{	
		$obj['length'] = 0;
		
		$array['c_id'] = $c_id;
		$array['Car_ID'] = $Car_ID;
		$array['data'] = $obj;
		$array['msg'] = "连接出错";
		$array['code'] = -1;
		
		$returnStr = JSON($array);
	}
	else
	{
		$obj['length'] = 0;
				
		$array['data'] = $obj;
		$array['msg'] = "删除车辆成功";
		$array['code'] = 1;
				
		$returnStr = JSON($array);
	}
	
	// 释放资源
    mysql_free_result($result);
	
	echo $returnStr;
?>