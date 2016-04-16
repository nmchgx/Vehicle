<?php
	session_start();
	
	require "jsonHelper.php";		//json封装
	require "connectSQL.php";
	require "sqlHelper.php";
	
	$PostType = $_GET['PostType'];
	
	if($PostType === "login" || $PostType === "register")
	{
		switch($PostType){
			case "login":  require "login.php"; break;
			case "register": require "register.php"; break;
		}
		
	}
	else
	{
		$c_id = $_POST['c_id'];
		$token = $_POST['token'];
		
		//$loginName = $_GET['loginName'];
		//$token = $_GET['token'];
		
		
		
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
				$array['token'] = $_SESSION['token'];
				$array['msg'] = "未登录";
				$array['code'] = 0;
				
				$returnStr = JSON($array);
				echo $returnStr;
			}
			else{
				if($tsecret === $token){
					switch ($PostType) {
						/* 汽车维护 start */
						case "getMyCars":  require "getMyCars.php"; break;
						case "getTheCar":  require "getTheCar.php"; break;
						case "getAllCars": require "getAllCars.php"; break;
						/* 汽车维护 end */
						
						/* 汽车加油 start */
						case "addFillingOrder":  require "addFillingOrder.php"; break;
						case "getFillingOrder":  require "getFillingOrder.php"; break;
						case "cancelFillingOrder":  require "cancelFillingOrder.php"; break;
						/* 汽车加油 end */
					}
				}
				else{
					$returnStr;
					$obj['length'] = 0;
					
					$array['data'] = $obj;
					$array['msg'] = "登录状态失效，请重新登录";
					$array['code'] = 0;
					
					$returnStr = JSON($array);
					echo $returnStr;
				}
			}
		}
		mysql_free_result($res);
	}
	mysql_close($conn);

?>