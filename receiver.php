<?php
	session_start();
	
	require "jsonHelper.php";
	require "connectSQL.php";
	
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
					case "getMyCars":  require "getMyCars.php"; break;
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