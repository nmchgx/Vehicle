<?php
	
	$str = '{"ID":"1","Brand":"宝马","Logo":"宝马","Model":"A4L"，"License":"京E20849","EngNum":"491Q-E649815","BodyLevel":"四门四座","Mil":"10000","GasVol":"80","EngOK":"1","TranOK":"1","LightOK":"1"}';
	$str1 = '{"ID":"2","Brand":"宝马","Logo":"宝马","Model":"A4L"，"License":"京E20849","EngNum":"491Q-E649815","BodyLevel":"四门四座","Mil":"10000","GasVol":"80","EngOK":"1","TranOK":"1","LightOK":"1"}';
	$str2 = '{"ID":"3","Brand":"宝马","Logo":"宝马","Model":"A4L"，"License":"京E20849","EngNum":"491Q-E649815","BodyLevel":"四门四座","Mil":"10000","GasVol":"80","EngOK":"1","TranOK":"1","LightOK":"1"}';
	
	
	
	$carmsg[0]['key'] = '汽车品牌';
	$carmsg[0]['value'] = '宝马';
	$carmsg[1]['key'] = "型号";
	$carmsg[1]["value"] = "A4L";
	$carmsg[2]['key'] = "车牌号";
	$carmsg[2]["value"] = "京E20849";
	$carmsg[3]['key'] =  "发动机号";
	$carmsg[3]["value"] =  "491Q-E649815";
	$carmsg[4]['key'] = "车身级别";
	$carmsg[4]["value"] = "四门四座";
	$carmsg[5]['key'] = "里程数";
	$carmsg[5]["value"] = "10000 km";
	$carmsg[6]['key'] = "油量%";
	$carmsg[6]["value"] = "90%";
	$carmsg[7]['key'] = "发动机状态";
	$carmsg[7]["value"] = '正常';
	$carmsg[8]['key'] = "变速器状态";
	$carmsg[8]["value"] = '正常';
	$carmsg[9]['key'] = "车灯状态";
	$carmsg[9]["value"] = '正常';
	
	$arr['carMsg']['carmsg'] = $carmsg;
	$arr['carMsg']['Title'] = '宝马A4L';
	$arr['carMsg']['ID'] = 1;
	$arr['carMsg']['Logo'] = "http://7xst41.com2.z0.glb.clouddn.com/BMW.png";
	
	$arr1[0] = $arr['carMsg'];
	
	
	$carmsg[0]['key'] = '汽车品牌';
	$carmsg[0]['value'] = '雷克萨斯';
	$carmsg[1]['key'] = "型号";
	$carmsg[1]["value"] = "ES";
	$carmsg[2]['key'] = "车牌号";
	$carmsg[2]["value"] = "京E20849";
	$carmsg[3]['key'] =  "发动机号";
	$carmsg[3]["value"] =  "491Q-E649815";
	$carmsg[4]['key'] = "车身级别";
	$carmsg[4]["value"] = "四门四座";
	$carmsg[5]['key'] = "里程数";
	$carmsg[5]["value"] = "10000 km";
	$carmsg[6]['key'] = "油量";
	$carmsg[6]["value"] = "90%";
	$carmsg[7]['key'] = "发动机状态";
	$carmsg[7]["value"] = '正常';
	$carmsg[8]['key'] = "变速器状态";
	$carmsg[8]["value"] = '正常';
	$carmsg[9]['key'] = "车灯状态";
	$carmsg[9]["value"] = '正常';
	
	$arr['carMsg']['carmsg'] = $carmsg;
	$arr['carMsg']['Title'] = '雷克萨斯ES';
	$arr['carMsg']['ID'] = 2;
	$arr['carMsg']['Logo'] = "http://7xst41.com2.z0.glb.clouddn.com/Lexus.png";
	
	$arr1[1] = $arr['carMsg'];

	
	$data['dataArr'] = $arr1;
	
	
	
	$array['data'] = $data;
	$array['msg']  = '获取车辆信息成功';
	$array['code'] = 1;
	
	$returnStr = JSON($array);
	
	echo $returnStr;
?>