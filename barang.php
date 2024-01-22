<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIM Gudang V.2023 - Form Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
<div class="container">
  <h1>Form Barang</h1>
<form method="post">
  <div class="form-group row">
    <label for="KodeBarang" class="col-4 col-form-label">Kode Barang</label> 
    <div class="col-8">
      <input id="KodeBarang" name="KodeBarang" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaBarang" class="col-4 col-form-label">Nama Barang</label> 
    <div class="col-8">
      <input id="NamaBarang" name="NamaBarang" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="JumlahStok" class="col-4 col-form-label">Jumlah Stok</label> 
    <div class="col-8">
      <input id="JumlahStok" name="JumlahStok" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Harga</label> 
    <div class="col-8">
      <input id="Harga" name="Harga" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="Satuan" class="col-4 col-form-label">Satuan</label> 
    <div class="col-8">
      <input id="Satuan" name="Satuan" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="TglAuditTerakhir" class="col-4 col-form-label">Tgl. Audit Terakhir</label> 
    <div class="col-8">
      <input id="TglAuditTerakhir" name="TglAuditTerakhir" type="date" class="form-control" value="<?php echo date('Y-m-d');?>">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<?php 
  if (isset($_POST['submit'])) {
    $KodeBarang=filter_var($_POST['KodeBarang'],FILTER_SANITIZE_STRING);
    $NamaBarang=filter_var($_POST['NamaBarang'],FILTER_SANITIZE_STRING);
    $JumlahStok=filter_var($_POST['JumlahStok'],FILTER_SANITIZE_STRING);
    $Harga=filter_var($_POST['Harga'],FILTER_SANITIZE_STRING);
    $Satuan=filter_var($_POST['Satuan'],FILTER_SANITIZE_STRING);
    $TglAuditTerakhir=filter_var($_POST['TglAuditTerakhir'],FILTER_SANITIZE_STRING);
    include('koneksi.db.php');
    $sql="INSERT INTO `barang`(`KodeBarang`, `NamaBarang`, `JumlahStok`, `Harga`, `Satuan`, `TglAuditTerakhir`) VALUES ('".$KodeBarang."','".$NamaBarang."','".$JumlahStok."','".$Harga."','".$Satuan."','".$TglAuditTerakhir."')";
    $q=mysqli_query($koneksi,$sql);
    if ($q) {
      echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Success!</strong> Rekord sukses disimpan !.
    </div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Gagal!</strong> Rekord gagal disimpan !.
    </div>';
    }
  }
  ?>
</div>
</body>
</html>