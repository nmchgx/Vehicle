<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>更新汽车数据</title>
<link href="../css/bootstrap.css" rel="stylesheet">
<script src="../js/jquery-1.11.2.min.js"></script> 
<script src="../js/bootstrap.js"></script>
<script src="../js/basic.js"></script>
<script src="../js/changeMysql.js"></script>
<style type="text/css">
        html, body {
            /*此部分支持chrome，应该也支持firefox*/
            background: rgb(246,248,249);
            background: url('picture/bg.jpg') no-repeat center fixed;
            background-attachment: fixed;
            background-size: 100% 100%;
            /*以下是IE部分，使用滤镜*/
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='picture/bg.jpg',sizingMethod='scale');
            background-repeat: no-repeat;
            background-positon: 100%, 100%;
            font: normal 18px tahoma, arial, verdana, sans-serif;
            margin: 0;
            padding: 0;
            border: 0 none;
            overflow: hidden;
            height: 100%;
        }
</style>
</head>

<body bgcolor="#000000">
<div class="container-fluid col-md-12" style="display:table; height:500px;">
<span style="display:table-cell; vertical-align:middle">
	<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading">车辆信息修改</div>
              <div class="panel-body">
              <div class="col-md-5" style="margin-top:20px">
                    <input type="text" class="form-control" placeholder="账号" id="account">
              </div>
              <div class="col-md-4" style="margin-top:20px">
                    <button type="button" class="btn btn-success btn-block" id="submitAC" onClick="submitAC()">确定</button>
              </div>
               <form id="form" style="display:none;">
               <div class="form-group">
               		<div class="col-md-4" style="margin-top:20px">
                        <select id="car_id" class="form-control"> 
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
        			<div class="col-md-4" style="margin-top:20px">
                    	<input type="text" class="form-control" placeholder="单位（公里）" id="mil">
                    </div>
                </div>
                <div class="form-group">
        			<div class="col-md-4" style="margin-top:20px">
                    	<input type="text" class="form-control" placeholder="油量（%）" id="gas">
                    </div>
                </div>
                <div class="form-group">
        			<div class="col-md-4" style="margin-top:20px">
                    	<input type="text" class="form-control" placeholder="车灯状态" id="light">
                    </div>
                </div>
                <div class="form-group">
        			<div class="col-md-4" style="margin-top:20px">
                    	<input type="text" class="form-control" placeholder="发动机状态" id="eng">
                    </div>
                </div>
                <div class="form-group">
        			<div class="col-md-4" style="margin-top:20px">
                    	<input type="text" class="form-control" placeholder="变速器状态" id="tran">
                    </div>
                </div>             
                <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                	<button type="button" class="btn btn-success btn-block" id="submit" onClick="submitIt()">提交</button>
                </div>

            </form>
              </div>
            </div>
        </div>     
 </span>
</div>
</body>
</html>