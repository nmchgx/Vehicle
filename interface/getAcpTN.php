<?php
	//$c_id = $_POST['c_id'];
	
	//$sql = "DELETE from token where C_ID=".$c_id;
	
	//$result=mysql_query($sql);
	
	$result=true;
	
	$returnStr;
	$array;
	$obj['length'] = 0;
	
	if($result === false)
	{	
		returnData("连接出错", -1, $obj);
	}
	else
	{			
		returnData("注销成功", 1, $obj);
	}
	
	// 释放资源
    mysql_free_result($result);
	
	function returnData ($msg, $code, $data) {
		$array['msg'] = $msg;
		$array['code'] = $code;
		$array['data'] = $data;
	
		$returnStr = JSON($array);
		echo $returnStr;
	}
?>