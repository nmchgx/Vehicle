<?php
	$loginName = $_POST["loginName"];
	$password = $_POST["password"];
	$nickName = $_POST["nickName"];
	
	$returnStr;
	$obj['length'] = 0;
	if(!preg_match("/^[0-9a-zA-Z]{4,26}$/",$loginName)){
		returnData("用户名须由4-26位的字母和数字组成", 0, $obj);
	}
	else{
		$sql = "select * from customer where C_LoginName = '".$loginName."'";
		$result=mysql_query($sql);
		
		if($result === false)
		{	
			returnData("连接出错", -1, $obj);
		}
		else{
			
			$ID = "";
			while($row=mysql_fetch_array($result))
			{
				$ID = $row['C_ID'];
			}
			if($ID === ""){
				$addSql = "insert into customer(C_LoginName, C_Password, C_NickName) values ('".$loginName."','".$password."','".$nickName."')";
				$result1=mysql_query($addSql);
				
				if($result1 === false){
					returnData("连接出错", -1, $obj);
				}
				else{
					returnData("添加用户成功", 1, $obj);
				}
			}
			else{
				returnData("用户名已存在", 0, $obj);
			}
		}
		
		// 释放资源
    	mysql_free_result($result);
	}
	
	
	
	function returnData ($msg, $code, $data) {
		$array['msg'] = $msg;
		$array['code'] = $code;
		$array['data'] = $data;
	
		$returnStr = JSON($array);
		echo $returnStr;
	}
?>