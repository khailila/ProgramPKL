<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <title>Tambah Siswa</title>
  <link rel="icon" href="../img/logo1.png">
    <link rel="stylesheet" href="../asset/styletambah.css">
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
                <div>
                  <h3>Tambah Data Siswa</h3></div>
    
    <?php
          include '../config/koneksi.php';
          $tanggal=isset($_POST['tanggal_input']) ? $_POST['tanggal_input'] : '';
          // menyimpan data siswa
          if(isset($_POST['simpan'])){
          $insert = mysqli_query($koneksi, "INSERT INTO siswa VALUES
                    ('',
                    '".$_POST['nama_siswa']."',
                    '".$_POST['no_induk']."',
                    '".$_POST['alamat']."', 
                    '".$_POST['jenis_kelamin']."',
                    '".$_POST['id_kelas']."',
                    '$tanggal')");
          if($insert){
            echo "<script>alert('Add Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=datasiswa.php\">";
          }else{
            echo 
            "input data gagal! 
            No Induk Siswa sudah terdaftar!! 
            ";
          }
        }
?>

    <form method="POST" action="">
    <table class="tabel5">
      
      <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama_siswa" required="required"></td>
      </tr>
      <tr>
          <td>No Induk</td>
          <td>:</td>
          <td><input type="text" name="no_induk" required="required"></td>
      </tr>
      <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><input type="text" name="alamat" required="required"></td>
      </tr>
      <tr>
          <td>Jenis Kelamin</td>
          <td style="text-align: center;">:</td>
          <td><select id="jenis_kelamin" name="jenis_kelamin">
          <option value=" ">-</option>
          <option value="P">P</option>
          <option value="L">L</option>
          </td>
      </tr>
      <tr>
          <td>ID Kelas</td>
          <td>:</td>
          <td>
            <select id="id_kelas" name="id_kelas">
              <option value=" ">--Pilih Kelas--</option>
              <?php
              $query = "SELECT * FROM kelas ORDER BY nama_kelas";
              $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value=\"" . $row['id_kelas'] . "\">" . $row['nama_kelas'] . "</option>";
                }
              ?>
            </select>
          </td>
      </tr>
      <tr>
          <td><input type="hidden" name="tanggal_input" 
          value="
          <?php 
          date_default_timezone_set('Asia/Jakarta');
          echo date("Y-m-d H:i:s "); 
          
          ?>
          "></td>
      </tr>
      
      
</table>
        <button class="btn-add" type="submit" name="simpan" value="Simpan">Simpan</button></a>
</form>


      </div>
    </div>
  </div>
</div>
</body>
</html>
