<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <title>Detail Siswa</title>
  <link rel="icon" href="..\img\logo1.png">
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
                  <h3>Data Pelanggaran Siswa</h3></div>
  
    <?php
        include '../config/koneksi.php';
        $id_siswa=isset($_GET['id_siswa']) ? $_GET['id_siswa'] : '';
        $point = mysqli_query($koneksi, "SELECT SUM(point) FROM pelanggaran_siswa WHERE id_siswa = '$id_siswa'");
          $point_result = mysqli_fetch_assoc($point);

        $query=mysqli_query($koneksi, "SELECT * FROM siswa
        JOIN kelas ON kelas.id_kelas = siswa.id_kelas
        LEFT JOIN pelanggaran_siswa ON pelanggaran_siswa.id_siswa = siswa.id_siswa
        JOIN guru ON guru.id_guru = kelas.id_wali_kelas
        WHERE siswa.id_siswa = '$id_siswa'
        ");
          $hasil = mysqli_fetch_assoc($query);
        
    ?>

    <div style="margin-left:50px;font-weight: 500;">             
    <tr>
        <td>Nama</td>
        <td>    : <?php echo $hasil['nama_siswa'] ?></td>
    </tr><br>
    <tr>
        <td>Nomor Induk</td>
        <td>: <?php echo $hasil['no_induk'] ?></td>
    </tr><br>
    <tr>
        <td>Alamat</td>
        <td>: <?php echo $hasil['alamat'] ?></td>
    </tr><br>
    <tr>
        <td>Nama Kelas</td>
        <td>: <?php echo $hasil['nama_kelas'] ?></td>
    </tr><br>
    <tr>
        <td>Wali Kelas</td>
        <td>: <?php echo $hasil['nama_guru'] ?></td>
    </tr><br>
    <tr>
        <td>Jumlah Poin</td>
        <td>: <?php echo $point_result['SUM(point)'] ?></td>
    </tr><br>
    </div>
    <?php
        
    ?>
    <table class="table5" style="width:90%">
                <tr bgcolor="99FF66">
                  <th>No</th>
                  <th>Nama Pelanggaran</th>
                  <th>Tanggal Pelanggaran</th>
                  <th>Poin</th>
                  <th>Aksi</th>
                </tr><br>
           <?php
          // Mengambil nilai id_kelas dari form pencarian

          // Query untuk mengambil data siswa berdasarkan id_kelas
          $k=isset($_GET['id_siswa']) ? $_GET['id_siswa'] : '';
          $query = "SELECT * FROM pelanggaran 
          JOIN jenis_pelanggaran on jenis_pelanggaran.id_jenis_pelanggaran = pelanggaran.id_jenis_pelanggaran
          JOIN pelanggaran_siswa on pelanggaran_siswa.id_pelanggaran = pelanggaran.id_pelanggaran
          JOIN siswa on siswa.id_siswa = pelanggaran_siswa.id_siswa WHERE siswa.id_siswa= '$k'
          ";
          $no = 1;
          $result = mysqli_query($koneksi, $query);

          // Menampilkan data siswa ke dalam tabel
          
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
                          
          <tr style="center">
            <td><?php echo $no++;  ?></td>
            <td><?php echo $row['nama_pelanggaran'];  ?></td>
            <td><?php echo $row['tanggal_pelanggaran'];  ?></td>
            <td><?php echo $row['point'];  ?></td>
            <td>
              <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapuspn.php?id_pelanggaran_siswa=<?php echo $row['id_pelanggaran_siswa']; ?>' }" class="hapus-btn"><span class="glyphicon glyphicon-remove">Hapus</a>
            </td>

          </tr>  
        <?php
          }
        ?>
    </table>
</body>
</html>