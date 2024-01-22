<?php
//Koneksi database
include('koneksi.db.php'); 
//Mengambil isi parameter cari
$KodeGudang = $_POST['cari'];
 
if ( !empty ( $KodeGudang ) ) {
 
    //Query sql untuk mencari data
    $sql ="SELECT * from gudang where KodeGudang LIKE '%".$KodeGudang."%'"; 
    $q=mysqli_query($koneksi,$sql);
 
    //Cek apakah data ditemukan
    $row = mysqli_num_rows( $q );
 
    //Jika ditemukan maka tampilkan
    if ( $row != 0 ) {
        while ( $r = mysqli_fetch_array( $q ) ) {
            echo $r['Alamat'] . "<br>";
        }
    //Jika tidak ditemukan tampilkan pesan berikut
    } else { echo "Tidak menemukan data"; }
}
?>