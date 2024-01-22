<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<script src="assets/js/bootstrap.bundle.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<h1>Rekapitulasi Barang</h1>
<h5>Daftar Rekapitulasi Barang Di Gudang</h5>

<table id="myTable">
  <tr class="header">
    <th style="width:20%;">Kode Barang</th>
    <th style="width:25%;">Nama Barang</th>
    <th style="width:20%;">Waktu Transaksi</th>
    <th style="width:15%;">Status Transaksi</th>
	<th style="width:10%;">Jumlah Stok</th>
	<th style="width:30%;">Lokasi Gudang</th>
  </tr>
<?php include('koneksi.db.php');
$sql="select * from barang inner join barangdigudang on barang.Kodebarang=barangdigudang.Kodebarang inner join gudang on gudang.Kodegudang=barangdigudang.Kodegudang";
$q=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_array($q);
if (!empty($r)) {
do { ?>
  <tr>
    <td><?php echo $r['KodeBarang'];?></td>
    <td><?php echo $r['NamaBarang'];?></td>
	<td><?php echo $r['TglAuditTerakhir'];?></td>
	<td><?php echo $r['StatusTransaksi'];?></td>
	<td><?php echo $r['JumlahStok'];?></td>
    <td><?php echo $r['Alamat'];?></td>
  </tr>
<?php } while($r=mysqli_fetch_array($q)); 
} else {
  echo "<h2>Barang tidak ada !</h2>";
}?> 
  
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
