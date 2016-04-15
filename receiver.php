<?php
	session_start();
	
	require "jsonHelper.php";
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
		$loginName = $_POST['loginName'];
		$token = $_POST['token'];
		
		//$loginName = $_GET['loginName'];
		//$token = $_GET['token'];
		
		//echo $loginName."\n";
		//echo $token."\n";
		
		//echo "*".$_SESSION['token']."*";
		
		if(!isset($_SESSION['token'])){
			
			if(1){
			
				switch ($PostType) {
					/* 汽车维护 start */
					case "getMyCars":  require "getMyCars.php"; break;
					case "getAllCars": require "getAllCars.php"; break;
					case "getTheCar" : require "getTheCar.php"; break;
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
		else{
			$returnStr;
			$obj['length'] = 0;
			
			$array['data'] = $obj;
			$array['token'] = $_SESSION['token'];
			$array['msg'] = "未登录";
			$array['code'] = 0;
			
			$returnStr = JSON($array);
			echo $returnStr;
		}
		
	}
	mysql_close($conn);

?>