<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
  <title>Daftar Peraturan</title>
  <link rel="icon" href="../img/logo1.png">
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
        <h3>PERATURAN</h3>
        <hr><br>

        <a class="add-btn" href="<?php echo "tambahaturan.php"; ?>">Tambah Peraturan</a><br><br>
        <table class="table5" style="width:76%">
                <tr style="height:30px;" bgcolor="#00ac4a">
                  <th>NO</th>
                  
                  <th>Nama Peraturan</th>
                  <th>Poin</th>
                  <th>Jenis Peraturan</th>
                  <th>Aksi</th>
                </tr>
                <?php
                include "../config/koneksi.php";
                  $no = 1;
                  $data = mysqli_query($koneksi, "SELECT *                  
                  FROM pelanggaran JOIN jenis_pelanggaran  
                  ON pelanggaran.id_jenis_pelanggaran =  jenis_pelanggaran.id_jenis_pelanggaran; 
                  ");

                 while($hasil = mysqli_fetch_array($data)){
                  
                 
                    ?>
                  
                  <tr>
                    <td><?php echo $no++;  ?></td>
                    <td><?php echo $hasil['nama_pelanggaran'];  ?></td>
                    <td><?php echo $hasil['point_pelanggaran'];  ?></td>
                    <td><?php echo $hasil['nama_jenis_pelanggaran'];  ?></td>
                    <td>
                      <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                      { location.href='hapusperaturan.php?id_pelanggaran=<?php echo $hasil['id_pelanggaran']; ?>' }" 
                      class="hapus-btn"><span class="glyphicon glyphicon-remove">Hapus</a>
                    </td>
                  </tr>
                 
        <?php 
    }
    ?>
</table>
<br/><br/>
</div>
      </div>
    </div>
  </div>
</div>
</body>
</html>