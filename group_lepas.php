<?php
require_once "method.php";
$gph = new GroupLepas();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	 case 'GET':
	 		if(!empty($_GET["id"]))
	 		{
	 			$id=intval($_GET["id"]);
	 			$gph->get_lepas($id);
	 		}
	 		else
	 		{
	 			$gph->get_lepas();
	 		}
	 		break;

	
	
	default:
		
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>