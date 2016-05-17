// JavaScript Document

var c_id;

function submitAC(){
	var ac = $("#account").val();
	
	$.post(BASE_URL + "acGetCarMsg.php", {account:ac}, function(data) {
		
		$("#car_id").empty(); 
				
		if(data.code == 1){			
			
			$("#account").hide();
			$("#submitAC").hide();
			$("#form").show();
			
			c_id = data.data.c_id;
			
			for (i = 0; i < data.data.myCars.length; i++) {
				$("#car_id").append("<option value='"+data.data.myCars[i].Car_ID+"'>"+data.data.myCars[i].Car_Title+"</option>"); 
			}	
		}
		else alert(data.msg);		
	});
}

function submitIt(){
	var mil = $("#mil").val();
	var gas = $("#gas").val();
	var light = $("#light").val();
	var eng = $("#eng").val();
	var tran = $("#tran").val();
	var car_id=$("#car_id").val(); //获取Select选择的Value 
	var car_title=$("#car_id").find("option:selected").text(); 
	
	$.post(BASE_URL + "acUpdateCarMsg.php", {c_id:c_id, mil:mil, gas:gas, light:light, eng:eng, tran:tran, car_id:car_id, car_title:car_title}, function(data) {
	
		if(data.code == 1){			
			
			alert(data.msg);
		}
		else alert(data.msg);		
	});
	
	alert("已推送");
	
}