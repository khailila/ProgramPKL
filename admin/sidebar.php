

<nav id="sidebar">
        <?php
                include "../config/koneksi.php";
                $admin=isset($_GET['id_admin']) ? $_GET['id_admin'] : '';
                $query="SELECT * FROM admin WHERE id_admin = '$admin'";
                $a = mysqli_query($koneksi, $query);
                $b = mysqli_fetch_array($a);
        ?>
        
        <div class="title"><div class="name">E-POIN</div></div>
        <div class="img2"></div>
        <ul class="list-items">
          <li><div><?php echo "<img src='../img/logo1.png' width='70' height='90' />";?>
          <!--<div class="username"><?php // echo $b['nama_admin'];  ?></div>-->
          <li><a href="dasboardadmin.php"><i class="fas fa-home"></i>Home</a></li>
          <li><a href="datasiswa.php" style="font-size: 15px;"><i class="fas fa-user-check"></i>Daftar Siswa</a></li>
          <li><a href="tambahterlambat.php"><i class="fas fa-plus"></i>Add Terlambat</a></li>
          <li><a href="tambahpoin.php"><i class="fas fa-plus"></i>Add Data Poin</a></li>
          <li><a href="datapoin.php"><i class="fas fa-history"></i>Riwayat</a></li>
          <li><a href="peraturan.php"><i class="fas fa-book"></i>Peraturan</a></li>
          <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>LogOut</a></li>

          <?php 
    
           ?>
          </div>
          
        </ul>

</nav>
