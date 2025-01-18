<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
  <title>Data Pelanggaran Siswa</title>
  <link rel="icon" href="..\img\logo1.png">
  <link rel="stylesheet" type="text/css" href="../asset/style-ssw.css">
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
        <div class="img"><a href="dasboardadmin.php"></div></a></div></div>
        <div class="formbody">
        <h3>Riwayat Data Pelanggaran Siswa</h3>
        <hr><br>
        <table class="table5" style="width:85%">
                <tr style="height:30px;" bgcolor="#00ac4a">
                  
                  <th>No</th>
                  <th>Nama</th>
                  <th>No Induk</th>
                  <th>Pelanggaran</th>
                  <th>Kelas</th>
                  <th>Poin</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                    
                <tbody>
                    <?php
                      include "../config/koneksi.php";
                       $no = 1;
                       // Query untuk mengambil data
                        $a=mysqli_query($koneksi, "SELECT * FROM pelanggaran_siswa 
                        JOIN siswa on siswa.id_siswa= pelanggaran_siswa.id_siswa
                        LEFT JOIN kelas on kelas.id_kelas=pelanggaran_siswa.id_kelas
                        JOIN pelanggaran on pelanggaran.id_pelanggaran = pelanggaran_siswa.id_pelanggaran"
                        );
                        
                      while($b = mysqli_fetch_assoc($a)){
                    ?>
                        <tr>
                          <td><?php echo $no++;  ?></td>
                          <td><?php echo $b['nama_siswa'];  ?></td>
                          <td><?php echo $b['no_induk'];  ?></td>
                          <td><?php echo $b['nama_pelanggaran'];  ?></td>
                          <td><?php echo $b['nama_kelas'];  ?></td>
                          <td><?php echo $b['point'];  ?></td>
                          <td><?php echo $b['tanggal_pelanggaran'];  ?></td>
                          <td>
                            <a href="<?php echo "detailpoinssw.php?id_siswa=".$b['id_siswa']; ?>" class="edit-btn">Detail</a>
                          </td>
                        </tr>
                          <?php 
                          } 
                          ?>
                    </tbody>
          </table><br><br><br>

</table>
</center>

    </div>
  </body>
</html>
