<?php
	header("Content-type: text/html;charset=utf-8;");
	error_reporting(0); 
	
	$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("vehicle");
	mysql_query("set names utf8");