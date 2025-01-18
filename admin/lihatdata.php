<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <title>Tambah Siswa</title>
  <link rel="icon" href="../img/logo1.png">
    <link rel="stylesheet" href="../asset/style-ssw.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
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
    <div class="img"><a href="admin.php">
    </div></a></div></div>
    <div class="formbody">
                <div>
                  <h3>Input Data Pelanggaran Siswa</h3></div>
  
    <?php
        include '../config/koneksi.php';
        $id_siswa=isset($_GET['id_siswa']) ? $_GET['id_siswa'] : '';
        $a = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
        $b = mysqli_fetch_array($a, MYSQLI_ASSOC);
    ?>
                 
    <tr>
        <td>Nama</td>
        <td>    : <?= $b['nama_siswa'] ?></td>
    </tr><br>
    <tr>
        <td>Nomor Induk</td>
        <td>: <?= $b['no_induk'] ?></td>
    </tr><br>
    <tr>
        <td>Alamat</td>
        <td>: <?= $b['alamat'] ?></td>
    </tr><br>
    
    <?php 
     
    ?>
    

      
    

</body>
</html>