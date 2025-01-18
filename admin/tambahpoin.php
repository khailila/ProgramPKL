<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <title>Tambah Poin</title>
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
                  <h3>E-POIN</h3></div>
  


     <form method="GET"><center>
  <label>Cari siswa berdasarkan kelas :<br></label>
  <select name="id_kelas">
  <option value=" ">--Pilih Kelas--</option>
    <?php
      // Koneksi ke database
      $koneksi = mysqli_connect("localhost","root","","poin");

      // Query untuk mengambil data kelas
      $query = "SELECT * FROM kelas ORDER BY nama_kelas";
      $result = mysqli_query($koneksi, $query);

      // Menampilkan data kelas ke dalam dropdown
      
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"" . $row['id_kelas'] . "\">" . $row['nama_kelas'] . "</option>";
      }

      // Menutup koneksi ke database
      mysqli_close($koneksi);
    ?>
  </select>
  <button class="edit-btn" type="submit">Cari</button>
</center>
</form>

<h3>Data Siswa </h3>
  <table class="table5" style="width:86%">
     <tr style="height:30px;" bgcolor="#00ac4a">
          <th>No </th>
          <th>Nama Siswa </th>
          <th>No Induk </th>
          <th>ID Kelas </th>
          <th>Aksi </th>
      </tr>

        <?php
  // Koneksi ke database
  $koneksi = mysqli_connect("localhost","root","","poin");
  // Mengambil nilai id_kelas dari form pencarian
  $id_kelas = isset($_GET['id_kelas']) ? $_GET['id_kelas'] : '';

  // Query untuk mengambil data siswa berdasarkan id_kelas
  $query = "SELECT * FROM siswa WHERE id_kelas = '$id_kelas'";
  $no = 1;
  $result = mysqli_query($koneksi, $query);

  // Menampilkan data siswa ke dalam tabel
  
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
                  
  <tr style="center">
    <td><?php echo $no++;  ?></td>
    <td><?php echo $row['nama_siswa'];  ?></td>
    <td><?php echo $row['no_induk'];  ?></td>
    <td><?php echo $row['id_kelas'];  ?></td>
    <td>
    <a href="<?php echo "inputpoin.php?id_siswa=".$row['id_siswa']; ?> "class="edit-btn">Input Poin</a>
    </td>
  </tr>
                 
        <?php
  }?>
  </table>


      
    

</body>
</html>