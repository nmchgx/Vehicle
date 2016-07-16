<?php
	session_start();
	
	require "helper/jsonHelper.php";		//json封装
	require "helper/connectSQL.php";
	require "helper/sqlHelper.php";
	
	$PostType = $_GET['PostType'];
	
	if($PostType === "login" || $PostType === "register" || $PostType=== "checkToken")
	{
		switch($PostType){
			case "login":  require "interface/login.php"; break;
			case "register": require "interface/register.php"; break;
			case "checkToken": require "interface/checkToken.php";break;
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
			echo $returnStr;
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
				echo $returnStr;
			}
			else{
				if($tsecret === $token){
					switch ($PostType) {
						/* 用户管理 start */
						case "logout":  require "interface/logout.php"; break;
						case "updateCustomerAvatar":  require "interface/updateCustomerAvatar.php"; break;
						case "getQiniuToken":  require "interface/getQiniuToken.php"; break;
						/* 用户管理 end */
						
						/* 汽车维护 start */
						case "getMyCars":  require "interface/getMyCars.php"; break;
						case "getTheCar":  require "interface/getTheCar.php"; break;
						case "getAllCars": require "interface/getAllCars.php"; break;
						case "addTheCar" : require "interface/anlyQrCode.php"; break;
						case "delTheCar":  require "interface/delTheCar.php"; break;
						case "updateCarImg":  require "interface/updateCarImg.php"; break;
						/* 汽车维护 end */
						
						/* 汽车加油 start */
						case "addFillingOrder":  require "interface/addFillingOrder.php"; break;
						case "getFillingOrder":  require "interface/getFillingOrder.php"; break;
						case "cancelFillingOrder":  require "interface/cancelFillingOrder.php"; break;
						case "getOrderUpacpTN":  require "interface/getOrderUpacpTN.php"; break;
						/* 汽车加油 end */
					}
				}
				else{
					$returnStr;
					$obj['length'] = 0;
					
					$array['data'] = $obj;
					$array['msg'] = "登录状态失效，请重新登录";
					$array['code'] = -9;
					
					$returnStr = JSON($array);
					echo $returnStr;
				}
			}
		}
		mysql_free_result($res);
	}
	mysql_close($conn);

?>