// JavaScript Document
//var BASE_URL = "http://139.129.27.123:8001/Vehicle/";
var BASE_URL = "http://localhost:8001/Vehicle/interface/";

$.post = function(a, b, c) {
	$.ajax({
		url: a,
		type: 'post',
		data: typeof(b) == 'object' ? b : {},
		dataType: 'json',
		cache: false,
		traditional: true,
		success: typeof(b) == 'function' ? b :
				typeof(c) == 'function' ? c : function() {}
	});
};

$_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();