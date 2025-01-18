<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="../asset/style-ssw.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <body>
    <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
      </label>
      <?php include('sidebar.php');?>
    </div>
    <div class="header">
      <div class="name">E-POIN</div>
        <div class="img"><a href="guru.php"></div></a></div></div>
        <div class="formbody">
                <div>
                  <h3>Edit Data</h3></div>
        <hr><br>
        <?php
              include '../config/koneksi.php';
              $a = mysqli_query($koneksi, "SELECT * FROM terlambat WHERE noinduk = '".$_GET['noinduk']."'");
              $b = mysqli_fetch_array($a, MYSQLI_ASSOC)
          ?>
    	<a class="lihat"  href="<?php echo "terlambat.php"; ?>">Lihat Data</a><br><br><br>

        <form  method="POST">
            
            <table class="table5">
              <tr>
                <td>NO INDUK</td>
                <td style="text-align: center;">:</td>
                <td><input type="text" name="noinduk"  readonly="readonly" value="<?= $b['noinduk'] ?>"></td>
              </tr>
              <tr>
                <td>NAMA</td>
                <td style="text-align: center;">:</td>
                <td><input type="text" name="nama"  required="required" value="<?= $b['nama'] ?>"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td style="text-align: center;">:</td>
                <td><input type="text" name="email"  required="required" value="<?= $b['email'] ?>"></td>
              </tr>
    
      
            </table>
          <button class="simpan" type="submit" name="update" value="Simpan">Simpan</button></a> 
          </form>

		  <?php
          if(isset($_POST['update'])){
            $update = mysqli_query($koneksi, "UPDATE terlambat SET noinduk = '".$_POST['noinduk']."', nama = '".$_POST['nama']."', email = '".$_POST['email']."' WHERE noinduk = '".$_GET['noinduk']."'");

          if($update){
             echo "<script>alert('Add Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=terlambat.php\">";
          }else{
            echo "gagal disimpan";
          }
        }
          ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>
