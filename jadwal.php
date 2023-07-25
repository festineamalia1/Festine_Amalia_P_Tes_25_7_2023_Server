<?php
require_once "method.php";
$jdl = new Jadwal();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$jdl->get_jadwal($id);
			}
			else
			{
				$jdl->get_jadwal();
			}
			break;
	
	default:
	
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>