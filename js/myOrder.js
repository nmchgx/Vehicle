// JavaScript Document

var order_id, c_id, car_id;

$(document).ready(function() { 
	var Request = new Object();
	Request = GetRequest();
	
	order_id = Request["order_id"];
	c_id = Request["c_id"];
	car_id = Request["car_id"];
	
	$.post(BASE_URL + "getOrderMsg.php", {order_id:order_id, c_id:c_id, car_id:car_id}, function(data) {
		
		$("tr:not(:first)").empty("");
		$("#orderTab").css("margin-top", window.screen.availHeight/10);
				
		if(data.code == 1){			
			
			for (i = 0; i < data.data.myOrder.length; i++) {
			var tr = $("<tr></tr>"); 
			
			var td = $("<td></td>");
			td.text(data.data.myOrder[i].key);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.data.myOrder[i].value);
			tr.append(td);
									
			$("#orderTab").append(tr);
			}	
		}
		else alert(data.msg);
				
	});
	
}); 

function GetRequest() {   
   var url = location.search; //获取url中"?"符后的字串   
   var theRequest = new Object();   
   if (url.indexOf("?") != -1) {   
      var str = url.substr(1);   
      strs = str.split("&");   
      for(var i = 0; i < strs.length; i ++) {   
         theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);   
      }   
   }   
   return theRequest;
}   