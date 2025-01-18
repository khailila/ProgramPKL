<?php 
 session_start();
include '../config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../asset/stylelogin.css"rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="icon" href="../img/logo1.png">
    <title>LOGIN ADMIN</title>
</head>

<body style="width: 100%">

    <div class="container-fluid py-1" style="background-color: #E8E8E8;">
        <div class="container">
            <div class="row">
                    <img src="img/logo.png" alt="" class="img-fluid" style="width: 150px; margin-top: 15px">
                <div class="col-xs-11">
                    <h1>E-POIN</h1>
                    <h3 class="h3_ps">SMA Negeri 3 Sidoarjo</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="h2_ps">LOGIN ADMIN</h2></div>
                <form method="POST">
                <div class="col-lg-12 text-center ">
                    <input type="text" name="username" class="form_login" placeholder="username" required="required">
                </div><br>
                <div class="col-lg-12 text-center ">
                     <input type="password" class="form_login" name="password" placeholder="password" id="myPassword" ><br/></div><br>
                <div class="col-lg-12 text-center ">
                    <input type="submit" class="tombol_login" value="LOGIN" name="proseslog">
                    <br/></div>
                <center>
                    <a class="link" href="../index.php">kembali</a>
                </center>
                </form>
                <?php
                if(isset($_POST['proseslog'])){
                    $sql = mysqli_query($koneksi, "select * from admin where username = '$_POST[username]' and password = '$_POST[password]'");

                    $cek = mysqli_num_rows($sql);
                    if ($cek > 0) {
                        $_SESSION['password'] = $_POST['password'];
                        echo "<meta http-equiv=refresh content=0;URL='dasboardadmin.php'>";
                    }else{
                        echo "<p>Username atau Password Salah!</p>";
                        echo "<meta http-equiv=refresh content=6;URL='loginadmin.php'>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" style="background-color: #E8E8E8;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 class="h4_ps">INFORMASI</h3>
            </div>

            VISI dan MISI<br><br>

VISI :<br>
TERWUJUDNYA SEKOLAH YANG BERKUALITAS BERPIJAK PADA IMTAQ DAN IPTEK YANG BERWAWASAN GLOBAL <br><br>
Akademik : <br>
<ol type = "1">
<li>Unggul dalam perolehan Nilai Ujian Nasional</li><br>

<li>
    Unggul dalam persaingan Seleksi Penerimaan Mahasiswa Baru
</li>    
    <ol type = "a"><li>Unggul dalam lomba akademik baik di bidang Ilmu Pengetahuan Alam  ( IPA ), Ilmu Pengetahuan Sosial ( IPS ) maupun Bahasa</li>
    <li>Unggul dalam pemanfaatan dan pengembangan Ilmu Pengetahuan dan Teknologi serta Estetika</li>
    <li>Unggul dalam pemanfaatan dan pengembangan Teknologi Informasi dan Komunikasi</li>
    <li>Unggul dalam penguasaan dan pemanfaatan Bahasa internasional</li>
</ol><br>
    

Non-Akademik : <br>
<ol type = "1">
<li>Unggul dalam pengamalan aktivitas keagamaan</li><br>
<li>Unggul dalam bidang bela negara</li><br>
<li>Unggul dalam kepedulian sosial, budaya, dan organisasi</li><br>
<li>Unggul dalam sikap disiplin, beretika, dan bertanggung jawab</li><br>
<li>Unggul dalam lomba di bidang kreativitas dan seni</li><br>
<li>Unggul dalam lomba di bidang olahraga dan kesegaran jasmani</li><br>
</ol>


MISI :<br>
Untuk memenuhi tuntutan yang dituangkan dalam Visi Sekolah dengan berbagai indikatornya, maka Misi Sekolah adalah sebagai berikut  : <br><br>

<ol>
<li>Menumbuhkan penghayatan terhadap ajaran agama yang dianutnya agar menjadi manusia yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa</li><br>
<li>Mendorong dan membantu siswa dalam menggali potensi dirinya</li><br>
<li>Melaksanakan pembelajaran dan bimbingan secara maksimal demi masa depan siswa yang lebih maju</li><br>
<li>Melengkapi sarana dan prasarana belajar yang memadai untuk meningkatkan mutu pendidikan di sekolah</li><br>
<li>Melaksanakan kultur sekolah dengan menerapkan 5S dan 9K  secara optimal</li><br>
<li>Melibatkan seluruh warga sekolah dan masyarakat khususnya orangtua siswa sebagai salah satu pihak utama yang berkepentingan dengan pendidikan ( Stakeholder ) untuk ikut bertanggung jawab dalam kemajuan pendidikan.</li><br>
</ol>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>