<?php
require_once "koneksi.php";
class Jadwal {
	public  function get_jadwal()
	{
		global $mysqli;
		$query="SELECT * FROM jadwal";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

class Group {
	public  function get_group()
	{
		global $mysqli;
		$query="SELECT * FROM group";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

class Pekerja {
	public  function get_pekerja()
	{
		global $mysqli;
		$query="SELECT * FROM pekera";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}


class GroupPiket {

	public  function get_grouppiket()
	{
		global $mysqli;
		$query="SELECT  * FROM group_piket JOIN pekera ON group_piket.id_pekerja = pekera.id_pekerja  JOIN jabatan ON group_piket.id_jabatan = jabatan.id_jabatan JOIN tb_group ON group_piket.id_group = tb_group.id_group JOIN jadwal ON tb_group.id_group = jadwal.id_group";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	function update_grouppiket($id)
		{
			global $mysqli;
			$arrcheckpost = array('id_group_piket' => '', 'id_pekerja' => '', 'id_jabatan' => '', 'id_group' => '');
			$hitung = count(array_intersect_key($_POST, $arrcheckpost));
			if($hitung == count($arrcheckpost)){
			
		        $result = mysqli_query($mysqli, "UPDATE group_piket SET
		        id_group_piket = '$_POST[id_group_piket]',
		        id_pekerja = '$_POST[id_pekerja]',
		        id_jabatan = '$_POST[id_jabatan]',
		        id_group = '$_POST[id_group]',
		    
		        WHERE id_group_piketid='$id'");
		   
				if($result)
				{
					$response=array(
						'status' => 1,
						'message' =>'Successfully.'
					);
				}
				else
				{
					$response=array(
						'status' => 0,
						'message' =>'Failed.'
					);
				}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match'
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}
}

class GroupPiketHadir {

	public function get_pikethadirs()
	{
		global $mysqli;
		 $query="SELECT  * FROM group_piket JOIN pekera ON group_piket.id_pekerja = pekera.id_pekerja  JOIN jabatan ON group_piket.id_jabatan = jabatan.id_jabatan JOIN tb_group ON group_piket.id_group = tb_group.id_group JOIN jadwal ON tb_group.id_group = jadwal.id_group WHERE group_piket.id_group = 111";
		
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function get_pikethadir($id=0)
	{
		global $mysqli;
		 $query="SELECT  * FROM group_piket JOIN pekera ON group_piket.id_pekerja = pekera.id_pekerja  JOIN jabatan ON group_piket.id_jabatan = jabatan.id_jabatan JOIN tb_group ON group_piket.id_group = tb_group.id_group JOIN jadwal ON tb_group.id_group = jadwal.id_group WHERE group_piket.id_group = 111 AND jadwal.id_jadwal = $id";
		
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
}

class GroupCadangan {

	public  function get_cadangans()
	{
		global $mysqli;
		 $query="SELECT  * FROM group_piket JOIN pekera ON group_piket.id_pekerja = pekera.id_pekerja  JOIN jabatan ON group_piket.id_jabatan = jabatan.id_jabatan JOIN tb_group ON group_piket.id_group = tb_group.id_group WHERE group_piket.id_group = 222";
		
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public  function get_cadangan($id=0)
	{
		global $mysqli;
		 $query="SELECT  * FROM group_piket JOIN pekera ON group_piket.id_pekerja = pekera.id_pekerja  JOIN jabatan ON group_piket.id_jabatan = jabatan.id_jabatan JOIN tb_group ON group_piket.id_group = tb_group.id_group WHERE group_piket.id_group = 222 AND jadwal.id_jadwal = $id";
		
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
}

class GroupLepas {
public  function get_lepass()
	{
		global $mysqli;
		 $query="SELECT  * FROM group_piket JOIN pekera ON group_piket.id_pekerja = pekera.id_pekerja  JOIN jabatan ON group_piket.id_jabatan = jabatan.id_jabatan JOIN tb_group ON group_piket.id_group = tb_group.id_group WHERE group_piket.id_group = 333";
		
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	public  function get_lepas($id=0)
	{
		global $mysqli;
		 $query="SELECT  * FROM group_piket JOIN pekera ON group_piket.id_pekerja = pekera.id_pekerja  JOIN jabatan ON group_piket.id_jabatan = jabatan.id_jabatan JOIN tb_group ON group_piket.id_group = tb_group.id_group WHERE group_piket.id_group = 333 AND jadwal.id_jadwal = $id";
		
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
}


class GroupIzin {

	public  function get_izin()
	{
		global $mysqli;
		 $query="SELECT  * FROM group_piket JOIN pekera ON group_piket.id_pekerja = pekera.id_pekerja  JOIN jabatan ON group_piket.id_jabatan = jabatan.id_jabatan JOIN tb_group ON group_piket.id_group = tb_group.id_group WHERE group_piket.id_group = 444 ";
		
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
}

 ?>