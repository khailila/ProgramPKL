<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <title>Input Poin</title>
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
        $a = mysqli_query($koneksi, "SELECT * FROM siswa 
        JOIN kelas ON kelas.id_kelas = siswa.id_kelas WHERE siswa.id_siswa = '$id_siswa'");
        $b = mysqli_fetch_array($a, MYSQLI_ASSOC);
    ?>
    <div style="margin-left:50px;font-weight: 500;">             
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
    <tr>
        <td>Kelas</td>
        <td>: <?= $b['nama_kelas'] ?></td>
    </tr><br>
    </div>
    <form method="POST" action="">
    <table class="table5" style="width:90%">
                <tr bgcolor="99FF66">
                  <th>No</th>
                  <th>Nama Pelanggaran</th>
                  <th>Jenis Pelanggaran</th>
                  <th>Poin</th>
                  <th>Aksi</th>
                </tr><br>

               
           <?php
          // Mengambil nilai id_kelas dari form pencarian
          $ab=mysqli_query($koneksi,"SELECT * FROM pelanggaran join jenis_pelanggaran on 
          jenis_pelanggaran.id_jenis_pelanggaran = pelanggaran.id_jenis_pelanggaran
          WHERE pelanggaran.id_pelanggaran=15");
          
          // Query untuk mengambil data siswa berdasarkan id_kelas
          $query = "SELECT * FROM pelanggaran_siswa
          JOIN pelanggaran on pelanggaran_siswa.id_pelanggaran = pelanggaran.id_pelanggaran
          JOIN siswa ON pelanggaran_siswa.id_siswa = siswa.id_siswa
          ";
          
          $no = 1;
          $result = mysqli_query($koneksi, $query);

          // Menampilkan data siswa ke dalam tabel
          
          while ($c = mysqli_fetch_assoc($ab)) {
            $row=mysqli_fetch_assoc($result);
            ?>
                           
          <tr style="center">
            <td><?php echo $no++;  ?></td>
            <td><?php echo $c['nama_pelanggaran'];  ?></td>
            <td><?php echo $c['nama_jenis_pelanggaran'];  ?></td>
            <td><?php echo $c['point_pelanggaran'];  ?></td>
              
            <td>
              <form method="POST" action="">
                <input type="hidden" name="id_pelanggaran" value="<?php echo $c['id_pelanggaran']; ?>">
                <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
                <input type="hidden" name="id_kelas" value="<?php echo $b['id_kelas']; ?>">
                <input type="hidden" name="point_pelanggaran" value="<?php echo $c['point_pelanggaran']; ?>">
                <input type="hidden" name="tanggal_input" 
                        value="<?php date_default_timezone_set('Asia/Jakarta');
                        echo date("Y-m-d H:i:s ");?>">
                <input type="hidden" name="tanggal_pelanggaran" value="<?php echo date("Y-m-d H:i:s"); ?>">
                <button class="edit-btn" type="submit" name="simpan" value="Simpan">submit</button>
              </form>             
          </td>
          </tr>  
        <?php
          }        
        ?>
        <?php
                include  "../config/koneksi.php";
                $tanggal=isset($_POST['tanggal_pelanggaran']) ? $_POST['tanggal_pelanggaran'] : '';
                $pelanggaran= isset($_POST['id_pelanggaran']) ? (int) $_POST['id_pelanggaran'] : 0;
                $id_siswa= isset($_POST['id_siswa']) ? (int) $_POST['id_siswa'] : 0;
                $id_kelas= isset($_POST['id_siswa']) ? (int) $_POST['id_kelas'] : 0;
                $point = isset($_POST['point_pelanggaran']) ? (int) $_POST['point_pelanggaran'] : 0;

                if(isset($_POST['simpan'])){

                $ab = mysqli_query($koneksi, "INSERT INTO pelanggaran_siswa (id_pelanggaran, id_siswa, id_kelas, tanggal_pelanggaran, point)
                VALUES ('$pelanggaran', '$id_siswa', '$id_kelas',  '$tanggal', '$point')");       
                                   
                if($ab){
                  echo "<script>alert('Add Success!')</script>";
                  echo "<meta http-equiv='refresh' content=\"0; url=tambahterlambat.php\">";

                }else{
                  echo 
                  "input data gagal! 
                  ";
                }}            
            ?> 
    </table>
        </form >
</body>
</html>