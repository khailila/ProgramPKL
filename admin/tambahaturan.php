<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <title>Tambah Peraturan</title>
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
                  <h3>Tambah Peraturan</h3></div>
    
    <?php
          include '../config/koneksi.php';
          // menyimpan data siswa
          if(isset($_POST['simpan'])){
          $insert = mysqli_query($koneksi, "INSERT INTO pelanggaran VALUES
                    ('',
                    
                    '".$_POST['nama_pelanggaran']."',
                    '".$_POST['point_pelanggaran']."',
                    '".$_POST['id_jenis_pelanggaran']."')
                    ");
          if($insert){
            echo "<script>alert('Add Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=peraturan.php\">";
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
          <td>Nama Pelanggaran</td>
          <td>:</td>
          <td><input type="text" name="nama_pelanggaran" required="required"></td>
      </tr>
      <tr>
          <td>Poin Pelanggaran</td>
          <td>:</td>
          <td><input type="int" name="point_pelanggaran" required="required"></td>
      </tr>
      <tr>
          <td>Jenis Pelanggaran</td>
          <td>:</td>
          <td>
            <select name="id_jenis_pelanggaran">
              <option value=" ">--Pilih Jenis Pelanggaran--</option>
              <?php
              $query = "SELECT * FROM jenis_pelanggaran ORDER BY nama_jenis_pelanggaran";
              $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value=\"" . $row['id_jenis_pelanggaran'] . "\">" . $row['nama_jenis_pelanggaran'] . "</option>";
                }
              ?>
            </select>
          </td>
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