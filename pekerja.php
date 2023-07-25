<?php
require_once "method.php";
$pkj = new Pekerja();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$pkj->get_pekerja($id);
			}
			else
			{
				$pkj->get_pekerja();
			}
			break;
	
	default:
		
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>