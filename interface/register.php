<?php
	$loginName = $_POST["loginName"];
	$password = $_POST["password"];
	$nickName = $_POST["nickName"];
	
	$returnStr;
	if(!preg_match("/^[0-9a-zA-Z]{4,26}$/",$loginName)){
		$obj['length'] = 0;
		
        $array['data'] = $obj;
		$array['msg'] = "用户名须由4-26位的字母和数字组成";
		$array['code'] = 0;
			
		$returnStr = JSON($array);
	}
	else{
		$sql = "select * from customer where C_LoginName = '".$loginName."'";
		$result=mysql_query($sql);
		
		if($result === false)
		{	
			$obj['length'] = 0;
		
			$array['data'] = $obj;
			$array['msg'] = "连接出错";
			$array['code'] = -1;
			
			$returnStr = JSON($array);
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
					$obj['length'] = 0;
					
					$array['data'] = $obj;
					$array['msg'] = "连接出错";
					$array['code'] = -1;
					
					$returnStr = JSON($array);
				}
				else{
					$obj['length'] = 0;
					
					$array['data'] = $obj;
					$array['msg'] = "添加用户成功";
					$array['code'] = 1;
					
					$returnStr = JSON($array);
				}
			}
			else{
				$obj['length'] = 0;
				
				$array['data'] = $obj;
				$array['msg'] = "用户名已存在";
				$array['code'] = 0;
					
				$returnStr = JSON($array);
			}
		}
	}
	echo $returnStr;
?>