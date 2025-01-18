<?php 

  include ('../config/koneksi.php'); 
  
  if(isset($_GET['id_pelanggaran'])){
          $delete = mysqli_query ($koneksi, "DELETE FROM pelanggaran WHERE id_pelanggaran = '".$_GET['id_pelanggaran']."'"); 
 
          if($delete){
            echo "<script>alert('Delete Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=peraturan.php\">";
          }else{
            echo "gagal";
          }
        }

    
  ?>