<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Edit Data Siswa</title>
  <link rel="icon" href="../img/logo1.png">
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
                  <h3>Edit Siswa</h3></div>
        <hr><br>
        <?php
              include '../config/koneksi.php';
              $id_siswa = $_GET['id_siswa'];            
              $a = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
              $b = mysqli_fetch_array($a, MYSQLI_ASSOC);
          ?>
    	<a class="lihat"  href="<?php echo " detailpoinssw.php?id_siswa=".$b['id_siswa'];?>">Lihat Data</a><br><br><br>

        <form  method="POST">
            
            <table class="table5">
            <tr>
                <td>ID Siswa</td>
                <td style="text-align: center;">:</td>
                <td><input type="text" name="id_siswa"  readonly="readonly" value="<?= $b['id_siswa'] ?>"></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td style="text-align: center;">:</td>
                <td><input type="text" name="nama_siswa"  required="required" value="<?= $b['nama_siswa'] ?>"></td>
              </tr>
              <tr>
                <td>No Induk</td>
                <td style="text-align: center;">:</td>
                <td><input type="text" name="no_induk"  required="required" value="<?= $b['no_induk'] ?>"></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td style="text-align: center;">:</td>
                <td><input type="text" name="alamat"  required="required" value="<?= $b['alamat'] ?>"></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td style="text-align: center;">:</td>
                <td><select id="jenis_kelamin" name="jenis_kelamin">
                <option value=" ">-</option>
                <option value="p">P</option>
                <option value="l">L</option>
                </td>
              </tr>
    
              <tr>
                <td>Kode Kelas</td>
                <td style="text-align: center;">:</td>
                <td><input type="text" name="id_kelas"  required="required" value="<?= $b['id_kelas'] ?>"></td>
              </tr>
    
      
            </table>
          <button class="simpan" type="submit" name="update" value="Simpan">Simpan</button></a> 
          </form>

		  <?php
          if(isset($_POST['update'])){
            $update = mysqli_query($koneksi, "UPDATE siswa SET 
            id_siswa = '".$_POST['id_siswa']."',
            nama_siswa = '".$_POST['nama_siswa']."',
            no_induk = '".$_POST['no_induk']."', 
            alamat = '".$_POST['alamat']."', 
            jenis_kelamin = '".$_POST['jenis_kelamin']."', 
            alamat = '".$_POST['alamat']."', 
            id_kelas = '".$_POST['id_kelas']."' 
            WHERE id_siswa = '".$_GET['id_siswa']."'");

          if($update){
             echo "<script>alert('Add Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=datasiswa.php\">";
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
