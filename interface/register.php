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
				
				$sql = "select C_ID from customer where C_LoginName = '".$loginName."'";
				$result2=mysql_query($sql);
				while($row=mysql_fetch_array($result2))
				{
					$ID = $row['C_ID'];
				}
				
				$sql1 = "insert into car(C_ID, Car_Brand, Car_Logo, Car_Model, Car_LicensePlate, Car_EngineNum, Car_BodyLevel, Car_Mileage, Car_GasVol, Car_EngIsOK, Car_TranIsOK, Car_LightIsOK, Car_VinNo, Car_Img) values (".$ID.",'奥迪','http://7xst41.com2.z0.glb.clouddn.com/Audi.png','A4L','粤YM5610','G4GA-5B257630','四门四座',1200,76,0,1,1,'LBEPCCAK45X116238','http://7xst41.com2.z0.glb.clouddn.com/FmMY8_f5z0TulMqNptvY53zV5gdW')";
		
				$result3=mysql_query($sql1);
				
				$sql2 = "insert into car(C_ID, Car_Brand, Car_Logo, Car_Model, Car_LicensePlate, Car_EngineNum, Car_BodyLevel, Car_Mileage, Car_GasVol, Car_EngIsOK, Car_TranIsOK, Car_LightIsOK, Car_VinNo, Car_Img) values (".$ID.",'吉普','http://7xst41.com2.z0.glb.clouddn.com/Jeep.png','牧马人','浙JA1285','1634814','四门四座',1800,18,1,1,1,'91110095','http://7xst41.com2.z0.glb.clouddn.com/FizfSQ9eEaJ7W7cCsw_gMt1CHOn0')";
		
				$result4=mysql_query($sql2);
				
				if($result1 === false){
					returnData("连接出错", -1, $obj);
				}
				else{
					returnData("添加用户成功", 1, $obj);
				}
				mysql_free_result($result1);
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