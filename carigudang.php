<!DOCTYPE HTML>
<html>
<head>
<title>Pencarian PHP Ajax + Jquery</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 
<script>
function cari(){
    //membuat variabel val_cari dan mengisinya dengan nilai pada field cari
    var val_cari = $('#cari').val();
 
    //kode 1
    var request = $.ajax ({
        url : "hasilcarigudang.php",
        data : "cari="+val_cari,
        type : "POST",
        dataType: "text"
    });
 
    //menampilkan pesan Sedang mencari saat aplikasi melakukan proses pencarian
    $('#hasil-cari').html('Sedang Mencari…');
 
    //Jika pencarian selesai
    request.done(function(output) {
        //Tampilkan hasil pencarian pada tag div dengan id hasil-cari
        $('#hasil-cari').html(output);
    });
 
}
</script>
 
</head>
 
<body>
 
    <input type="text" id="cari" onkeyup="cari();">
 
    <div id="hasil-cari">
    <!– Data akan tampil disini –>
    </div>
 
</body>
</html>