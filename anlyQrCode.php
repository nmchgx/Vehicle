<?php 
	//require "jsonHelper.php";
	//require "connectSQL.php";
	
	//$qrCode = $_GET['qrCode'];
	//$c_id = $_GET['c_id'];
	
	$qrCode = $_POST['qrCode'];
	$c_id = $_POST['c_id'];
	
	//	$json = '{"Brand":"吉普","Logo":"Jeep","Model":"牧马人","License":"京E20849","EngNum":"491Q-E649815","BodyLevel":"四门四座","Mil":"10035","GasVol":"82","EngOK":"1","TranOK":"1","LightOK":"1"}';

	$json = json_decode($qrCode);
	
	$sql = "select Logo_Url from logo where Logo_Name='".$json->{"Logo"}."'";
	
	$result=mysql_query($sql);
	if($result === false)
	{	
		$obj['length'] = 0;
		
		$array['data'] = $obj;
		$array['msg'] = "连接出错";
		$array['code'] = -1;
		
		$returnStr = JSON($array);
	}else{
		$logo_url ="";
		while($row=mysql_fetch_array($result)){
			$logo_url = $row['Logo_Url'];
		}
		
		$sql1 = "insert into car(C_ID, Car_Brand, Car_Logo, Car_Model, Car_LicensePlate, Car_EngineNum, Car_BodyLevel, Car_Mileage, Car_GasVol, Car_EngIsOK, Car_TranIsOK, Car_LightIsOK) values (".$c_id.",'".$json->{"Brand"}."','".$logo_url."','".$json->{"Model"}."','".$json->{"License"}."','".$json->{"EngNum"}."','".$json->{"BodyLevel"}."',".$json->{"Mil"}.",".$json->{"GasVol"}.",".$json->{"EngOK"}.",".$json->{"TranOK"}.",".$json->{"LightOK"}.")";
		
		$result1=mysql_query($sql1);
		if($result1 === false)
		{	
			$obj['length'] = 0;
			
			$array['data'] = $obj;
			$array['msg'] = "连接出错";
			$array['code'] = -1;
			
			$returnStr = JSON($array);
		}else{
			
			$sql2 = "select * from car where C_ID=".$c_id." order by Car_ID DESC limit 1";
			$result2=mysql_query($sql2);
			if($result2 === false)
			{	
				$obj['length'] = 0;
				
				$array['data'] = $obj;
				$array['msg'] = "连接出错";
				$array['code'] = -1;
				
				$returnStr = JSON($array);
			}else{
				while($row=mysql_fetch_array($result2)){
					$carid = $row['Car_ID'];
					$title = $row['Car_Brand'].$row['Car_Model'];
				}
				
				$obj['Car_ID'] = $carid;
				$obj['Car_Title'] = $title;
						
				$array['data'] = $obj;
				$array['msg'] = "添加车辆成功";
				$array['code'] = 1;
						
				$returnStr = JSON($array);	
			}
			mysql_free_result($result2);
		}
		mysql_free_result($result1);
		
	}
	// 释放资源
    mysql_free_result($result);
	
	echo $returnStr;
?>