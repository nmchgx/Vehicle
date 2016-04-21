<?php
	$c_id = $_POST['c_id'];
	$token = $_POST['token'];
	
	$tokenSql = "select T_Secret from token where C_ID=".$c_id;
		
	$res = mysql_query($tokenSql);
	if($res === false)
	{
		$obj['length'] = 0;
	
		$array['data'] = $obj;
		$array['msg'] = "连接出错";
		$array['code'] = -1;
		
		$returnStr = JSON($array);	
		
	}else{
		$tsecret = "";
		while($row=mysql_fetch_array($res)){
			$tsecret = $row['T_Secret'];
		}
		if($tsecret === ""){
			$returnStr;
			$obj['length'] = 0;
			
			$array['data'] = $obj;
			$array['msg'] = "未登录";
			$array['code'] = 0;
			
			$returnStr = JSON($array);
		}
		else{
			if($tsecret === $token){
				$sql = "select * from customer where C_ID = ".$c_id;
				$result=mysql_query($sql);
				
				$nickName = "";
				while($row=mysql_fetch_array($result))
				{
					$nickName = $row['C_NickName'];
				}
				$data['nickName'] = $nickName;
				$data['token'] = $token;
				$data['C_ID'] = $c_id;
				
				$array['data'] = $data;
				$array['msg'] = "登陆成功";
				$array['code'] = 1;
				
				$returnStr = JSON($array);
				
				mysql_free_result($result);
			}
			else{

				$obj = $obj['length'] = 0;
				
				$array['data'] = $obj;
				$array['msg'] = "登录状态失效，请重新登录";
				$array['code'] = -9;
				
				$returnStr = JSON($array);
			}
		}
	}
	
	mysql_free_result($res);
	
	mysql_close($conn);
	echo $returnStr;
?>