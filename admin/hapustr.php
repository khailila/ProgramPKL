<?php 

  include ('../config/koneksi.php'); 
  
  if(isset($_GET['kode'])){
          $delete = mysqli_query ($koneksi, "DELETE FROM peraturan WHERE kode = '".$_GET['kode']."'"); 
 
          if($delete){
            echo "<script>alert('Delete Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=peraturan.php\">";
          }else{
            echo "gagal";
          }
        }

    
  ?>