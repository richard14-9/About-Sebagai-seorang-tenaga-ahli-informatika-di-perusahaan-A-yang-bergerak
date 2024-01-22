<?php
include('koneksi.db.php');

$sql = "SELECT b.KodeBarang, b.NamaBarang, t.WaktuTransaksi, t.StatusTransaksi, t.Jumlah, g.Alamat
        FROM barang b
        INNER JOIN barangdigudang t ON b.KodeBarang = t.KodeBarang
        INNER JOIN gudang g ON t.KodeGudang = g.KodeGudang
        ORDER BY b.KodeBarang";

// Gunakan prepared statement
$stmt = mysqli_prepare($koneksi, $sql);

if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $KodeBarang, $NamaBarang, $WaktuTransaksi, $StatusTransaksi, $Jumlah, $Alamat);

    $algo = "AES-256-Ctr";
    $option =0;
    $kunci = "tes";
    $iv = "1234567890112233";

    $arrahhasil = array();

    while (mysqli_stmt_fetch($stmt)) {
        $h = array();
        $h['KodeBarang'] = enkripaes($KodeBarang, $algo, $kunci, $iv);
        $h['NamaBarang'] = enkripaes($NamaBarang, $algo, $kunci, $iv);
        $h['WaktuTransaksi'] = enkripaes($WaktuTransaksi, $algo, $kunci, $iv);
        $h['StatusTransaksi'] = enkripaes($StatusTransaksi, $algo, $kunci, $iv);
        $h['Jumlah'] = enkripaes($Jumlah, $algo, $kunci, $iv);
        $h['Alamat'] = enkripaes($Alamat, $algo, $kunci, $iv);
        array_push($arrahhasil, $h);
    }

    mysqli_stmt_close($stmt);
    echo json_encode($arrahhasil);
} else {
    echo "Gagal mengeksekusi query.";
}

function enkripaes($data, $algo, $kunci, $iv) {
    // Implementasi fungsi enkripsi sesuai kebutuhan Anda
    // ...

    return $data;
}
?>
