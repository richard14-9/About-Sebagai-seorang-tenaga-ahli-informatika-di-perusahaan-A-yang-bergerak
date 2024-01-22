<?php
	//koneksi ke database mysqli_affected_row
	include "koneksi.db.php";
	
	//membuat query/sql untuk mengambil seluruh data barang
	$sql = "SELECT * FROM barang";
	$query = mysqli_query($koneksi, $sql);
	while($data = mysqli_fetch_array($query)){
		//echo $data["KodeBarang"]." ";
		//echo $data["NamaBarang"]." ";
		//echo $data["JumlahStok"]." ";
		//echo $data["Harga"]." ";
		//echo $data["Satuan"]." ";
		//echo $data["TglAuditTerakhir"]." ";
		
		$item[] = array(
			'Kode'=>$data["KodeBarang"],
			'Nama'=>$data["NamaBarang"],
			'Jumlah'=>$data["JumlahStok"],
			'Harga'=>$data["Harga"],
			'Satuan'=>$data["Satuan"],
			'Tanggal'=>$data["TglAuditTerakhir"],
			'Jumlah'=>$data["JumlahStok"]
			
		);
	}
	
	$response = array(
		'status'=>'OK',
		'data'=>$item
	);
	
	echo json_encode($response);
?>