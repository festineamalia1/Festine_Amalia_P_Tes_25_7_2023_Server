<?php
require_once "method.php";
$grp = new Group();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$grp->get_group($id);
			}
			else
			{
				$grp->get_group();
			}
			break;
	
	default:
	
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>