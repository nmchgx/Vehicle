<?php
	
	$loginName = $_POST["loginName"];
	$password = $_POST["password"];
	
	//$loginName = $_GET["loginName"];
	//$password = $_GET["password"];
	
	$sql = "select * from customer where C_LoginName = '".$loginName."'";
	
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
		$psw = "";
		$nickName = "";
		while($row=mysql_fetch_array($result))
		{
			$psw = $row['C_Password'];
			$nickName = $row['C_NickName'];
		}
		if($psw === "")
		{
			$obj  = $obj['length'] = 0;;
			
			$array['data'] = $obj;
			$array['msg'] = "用户名或密码错误";
			$array['code'] = 0;
			
			$returnStr = JSON($array);
		}
		else
		{
			if($psw === $password)
			{
				$data['nickName'] = $nickName;
				$token = md5(time() . mt_rand(0,1000));
				$data['token'] = $token;
				$data['loginName'] = $loginName;
				
				$array['data'] = $data;
				$array['msg'] = "登陆成功";
				$array['code'] = 1;
				
				
				//session记录
				$_SESSION['token'] = $token;
				$array['session'] = $_SESSION['token'];
				
				
				
				$returnStr = JSON($array);
				
				//session记录
				//$_SESSION['token'] = $token;
				
				//echo $_SESSION['token'];
				//echo $token."\n";
			}
			else
			{
				$obj = $obj['length'] = 0;
				
				$array['data'] = $obj;
				$array['msg'] = "用户名或密码错误";
				$array['code'] = 0;
				
				$returnStr = JSON($array);
			}
		}
	}
	
	// 释放资源
    mysql_free_result($result);
	
	echo $returnStr;
?>