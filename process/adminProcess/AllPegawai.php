<?php
//fetch.php
	include_once('../../config/dbcon.php');
	
	$column = array("idPegawai", "nama", "jabatan", "alamat", "kabupaten", "kecamatan", "desa", "telepon");
	$query = "
			SELECT * FROM pegawai 
			";
			
	$query .= " WHERE ";
	
	if(isset($_POST["kabupaten"]))
	{
		$query .= "kabupaten = '".$_POST["kabupaten"]."' AND ";
	}
	if(isset($_POST["search"]["value"]))
	{
		$query .= '(nama LIKE "%'.$_POST["search"]["value"].'%" ';
		$query .= 'OR desa LIKE "%'.$_POST["search"]["value"].'%" ';
	}

	if(isset($_POST["order"]))
	{
		$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
	}
	else
	{
		$query .= 'ORDER BY idPegawai DESC ';
	}

	$query1 = '';

	if($_POST["length"] != 1)
	{
		$query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}

	$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

	$result = mysqli_query($conn, $query . $query1);

	$data = array();

	while($row = mysqli_fetch_array($result))
	{
		$sub_array = array();
		$sub_array[] = $row["idPegawai"];
		$sub_array[] = $row["nama"];
		$sub_array[] = $row["jabatan"];
		$sub_array[] = $row["kabupaten"];
		$sub_array[] = $row["kecamatan"];
		$sub_array[] = $row["desa"];
		$sub_array[] = $row["telepon"];
		$data[] = $sub_array;
	}

	function get_all_data($conn)
	{
		$query = "SELECT * FROM pegawai";
		$result = mysqli_query($conn, $query);
		return mysqli_num_rows($result);
	}

	$output = array(
		"draw"    => intval($_POST["draw"]),
		"recordsTotal"  =>  get_all_data($conn),
		"recordsFiltered" => $number_filter_row,
		"data"    => $data
	);

	echo json_encode($data);

?>