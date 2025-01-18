<?php 

  include ('../config/koneksi.php'); 
  
  if(isset($_GET['no_induk'])){
          $delete = mysqli_query ($koneksi, "DELETE FROM siswa WHERE no_induk = '".$_GET['no_induk']."'"); 
 
          if($delete){
            echo "<script>alert('Delete Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=datasiswa.php\">";
          }else{
            echo "gagal";
          }
        }

    
  ?>