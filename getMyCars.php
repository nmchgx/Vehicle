<?php
	
	$str = '{"ID":"1","Brand":"宝马","Logo":"宝马","Model":"A4L"，"License":"京E20849","EngNum":"491Q-E649815","BodyLevel":"四门四座","Mil":"10000","GasVol":"80","EngOK":"1","TranOK":"1","LightOK":"1"}';
	$str1 = '{"ID":"2","Brand":"宝马","Logo":"宝马","Model":"A4L"，"License":"京E20849","EngNum":"491Q-E649815","BodyLevel":"四门四座","Mil":"10000","GasVol":"80","EngOK":"1","TranOK":"1","LightOK":"1"}';
	$str2 = '{"ID":"3","Brand":"宝马","Logo":"宝马","Model":"A4L"，"License":"京E20849","EngNum":"491Q-E649815","BodyLevel":"四门四座","Mil":"10000","GasVol":"80","EngOK":"1","TranOK":"1","LightOK":"1"}';
	
	/*
	//123
	$carmsg[0]['key'] = 'Brand';
	$carmsg[0]['value'] = '宝马';
	$carmsg[1]['key'] = "Model";
	$carmsg[1]["value"] = "A4L";
	$carmsg[2]['key'] = "License";
	$carmsg[2]["value"] = "京E20849";
	$carmsg[3]['key'] =  "EngNum";
	$carmsg[3]["value"] =  "491Q-E649815";
	$carmsg[4]['key'] = "BodyLevel";
	$carmsg[4]["value"] = "四门四座";
	$carmsg[5]['key'] = "Mil";
	$carmsg[5]["value"] = 10000;
	$carmsg[6]['key'] = "GasVol";
	$carmsg[6]["value"] = 80;
	$carmsg[7]['key'] = "EngOK";
	$carmsg[7]["value"] = '正常';
	$carmsg[8]['key'] = "TranOK";
	$carmsg[8]["value"] = '正常';
	$carmsg[9]['key'] = "LightOK";
	$carmsg[9]["value"] = '正常';
	
	$arr['carMsg']['carmsg'] = $carmsg;
	$arr['carMsg']['Title'] = '宝马A4L';
	$arr['carMsg']['ID'] = 1;
	$arr['carMsg']['Logo'] = "http://7xst41.com2.z0.glb.clouddn.com/BMW.png";
	
	$arr1[0] = $arr['carMsg'];
	
	
	$carmsg[0]['key'] = 'Brand';
	$carmsg[0]['value'] = '宝马';
	$carmsg[1]['key'] = "Model";
	$carmsg[1]["value"] = "A4L";
	$carmsg[2]['key'] = "License";
	$carmsg[2]["value"] = "京E20849";
	$carmsg[3]['key'] =  "EngNum";
	$carmsg[3]["value"] =  "491Q-E649815";
	$carmsg[4]['key'] = "BodyLevel";
	$carmsg[4]["value"] = "四门四座";
	$carmsg[5]['key'] = "Mil";
	$carmsg[5]["value"] = 10000;
	$carmsg[6]['key'] = "GasVol";
	$carmsg[6]["value"] = 80;
	$carmsg[7]['key'] = "EngOK";
	$carmsg[7]["value"] = '正常';
	$carmsg[8]['key'] = "TranOK";
	$carmsg[8]["value"] = '正常';
	$carmsg[9]['key'] = "LightOK";
	$carmsg[9]["value"] = '正常';
	
	$arr['carMsg']['carmsg'] = $carmsg;
	$arr['carMsg']['Title'] = '宝马A4L';
	$arr['carMsg']['ID'] = 2;
	$arr['carMsg']['Logo'] = "http://7xst41.com2.z0.glb.clouddn.com/BMW.png";
	
	$arr1[1] = $arr['carMsg'];

	
	$data['dataArr'] = $arr1;
	*/
	
	//$array['data'] = $data;
	
	$array['data'] = '车';
	$array['msg']  = '获取车辆信息成功';
	$array['code'] = 1;
	
	$returnStr = JSON($array);
	
	echo $returnStr;
?>