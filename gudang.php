<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIM Gudang V.2023 - Form Gudang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
<div class="container">
  <h1>Form Gudang</h1>
  <form method="post">
  <div class="form-group row">
    <label for="KodeGudang" class="col-4 col-form-label">Kode Gudang</label> 
    <div class="col-8">
      <input id="KodeGudang" name="KodeGudang" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="Alamat" name="Alamat" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Simpan Gudang Baru</button>
    </div>
  </div>
  </form>
  <?php 
  if (isset($_POST['submit'])) {
    $KodeGudang=filter_var($_POST['KodeGudang'],FILTER_SANITIZE_STRING);
    $Alamat=filter_var($_POST['Alamat'],FILTER_SANITIZE_STRING);
    include('koneksi.db.php');
    $sql="INSERT INTO `gudang`(`KodeGudang`, `Alamat`) VALUES ('".$KodeGudang."','".$Alamat."')";
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