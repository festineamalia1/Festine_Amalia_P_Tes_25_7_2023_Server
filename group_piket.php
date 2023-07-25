<?php
require_once "method.php";
$gp = new GroupPiket();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	 case 'GET':
	 		if(!empty($_GET["id"]))
	 		{
	 			$id=intval($_GET["id"]);
	 			$gp->get_grouppiket($id);
	 		}
	 		else
	 		{
	 			$gp->get_grouppiket();
	 		}
	 		break;

	case 'POST':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$gp->update_grouppiket($id);
			}
			else
			{
				$gp->update_grouppiket();
			}		
			break; 
	
	default:
		
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>