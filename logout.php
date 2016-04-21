<?php
	$c_id = $_POST['c_id'];
	
	$sql = "DELETE from token where C_ID=".$c_id;
	
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
		$obj['length'] = 0;
				
		$array['data'] = $obj;
		$array['msg'] = "注销成功";
		$array['code'] = 1;
				
		$returnStr = JSON($array);
	}
	
	// 释放资源
    mysql_free_result($result);
	
	echo $returnStr;
?>