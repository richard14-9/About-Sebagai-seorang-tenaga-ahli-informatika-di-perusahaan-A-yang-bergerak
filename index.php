<!DOCTYPE html>

<html>
<head>
 <title>Silahkan Login Terlebih Dahulu</title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 <?php
 if(isset($_GET['pesan'])){
  if($_GET['pesan']=="gagal"){
   echo "<div class='alert'>Username dan Password Salah !</div>";
  }
 }
 ?>

 <div class="panel_login">
  <p class="tulisan_atas">Silahkan Masuk</p>

  <form action="login.php" method="post">
   <label>Username</label>
   <input type="text" name="username" class="form_login" placeholder="Username" required="required">

   <label>Password</label>
   <input type="password" name="password" class="form_login" placeholder="Password" required="required">
   
    <label for="captcha">silahkan ketik tulisan dibawah ini:</label>
	<img src="captcha.php" alt="Captcha"><br>
    <input type="text" id="captcha" name="captcha" required><br>

   <input type="submit" class="tombol_login" value="LOGIN">

   <br/>
   <br/>
   
  </form>
  
 </div>


</body>
</html>