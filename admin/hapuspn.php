<?php 

  include ('../config/koneksi.php'); 
  
  if(isset($_GET['id_pelanggaran_siswa'])){
          $delete = mysqli_query ($koneksi, "DELETE FROM pelanggaran_siswa WHERE id_pelanggaran_siswa = '".$_GET['id_pelanggaran_siswa']."'"); 
 
          if($delete){
            echo "<script>alert('Delete Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=datapoin.php\">";
          }else{
            echo "gagal";
          }
        }

    
  ?>