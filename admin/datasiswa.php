<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
  <title>Data Siswa</title>
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
        <h3>Data Siswa</h3>
        <hr><br>

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
          <button class="edit-btn" type="submit" >Cari</button>
        </center>
        </form>
      
  <br><a class="add-btn" href="<?php echo "tambahsiswa.php"; ?>">Tambah Data</a><br><br>
        <table class="table5" style="width:85%">
                <tr style="height:30px;" bgcolor="#00ac4a">
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>No Induk</th>
                  <th>ID Kelas</th>
                  <th>Aksi</th>
                </tr>
                <?php
          // Koneksi ke database
          $koneksi = mysqli_connect("localhost","root","","poin");
          // Mengambil nilai id_kelas dari form pencarian
          $id_kelas = isset($_GET['id_kelas']) ? $_GET['id_kelas'] : '';
          $no = 1;
          // Query untuk mengambil data siswa berdasarkan id_kelas
          $query = "SELECT * FROM siswa 
          WHERE siswa.id_kelas = '$id_kelas' ";
          
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
                <a href="<?php echo "detailpoinssw.php?id_siswa=".$row['id_siswa']; ?>" class="edit-btn">Detail</a>
                |      
                <a href="<?php echo "editssw.php?id_siswa=".$row['id_siswa']; ?>" class="edit-btn"> Update</a>
                |
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapusssw.php?no_induk=<?php echo $row['no_induk']; ?>' }" class="hapus-btn"><span class="glyphicon glyphicon-remove">Hapus</a>
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
