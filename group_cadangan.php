<?php
require_once "method.php";
$gph = new GroupCadangan();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	 case 'GET':
	 		if(!empty($_GET["id"]))
	 		{
	 			$id=intval($_GET["id"]);
	 			$gph->get_cadangan($id);
	 		}
	 		else
	 		{
	 			$gph->get_cadangan();
	 		}
	 		break;

	
	
	default:
		
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>