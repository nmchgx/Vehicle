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
		$cid = "";
		while($row=mysql_fetch_array($result))
		{
			$psw = $row['C_Password'];
			$nickName = $row['C_NickName'];
			$cid = $row['C_ID'];
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
				
				
				/*//session记录
				$_SESSION['token'] = $token;
				$array['session'] = $_SESSION['token'];
				*/
						
				$returnStr = JSON($array);
				
				$sql1 = "select * from token where C_ID=".$cid;
				$result1 = mysql_query($sql1);
				
				$is = "";
				while($row=mysql_fetch_array($result1))
				{
					$is = $row['T_Secret'];
				}
				
				if($is === ""){
					$addSql = "insert into token(C_ID, T_Secret) values (".$cid.",'".$token."')";
					$result2=mysql_query($addSql);
					
					mysql_free_result($result2);
				}else{
					$updateSql = "update token set T_Secret='".$token."'  where C_ID=".$cid;
					$result2=mysql_query($updateSql);
					
					mysql_free_result($result2);
				}
					
				//session记录
				//$_SESSION['token'] = $token;
				
				//echo $_SESSION['token'];
				//echo $token."\n";
				
				// 释放资源
    			mysql_free_result($result1);
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