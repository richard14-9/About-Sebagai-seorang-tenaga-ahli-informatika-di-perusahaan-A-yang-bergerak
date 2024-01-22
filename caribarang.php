<?php 
if (isset($_POST['KodeBarang'])) {
    $KodeBarang=filter_var($_POST['KodeBarang'],FILTER_SANITIZE_STRING);
    include('koneksi.db.php');
    $sql="select * from barang where KodeBarang = '".$KodeBarang."'";
    $q=mysqli_query($koneksi,$sql);
    $r=mysqli_fetch_array($q);
    if (!empty($r)) {
        echo $r['NamaBarang'];   
    } else {
        echo 'Barang tidak ditemukan !';
    }
    mysqli_close($koneksi);
}