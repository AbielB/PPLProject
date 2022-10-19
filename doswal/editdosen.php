<?php
require_once('../db_login.php');
session_start();

if (isset($_SESSION['nip'])){  
    $nip = $_SESSION['nip'];
    $query = mysqli_query($conn,"select * from tb_dosen where nip='$nip'");
    $cek = mysqli_num_rows($query);
    $dosen = mysqli_fetch_assoc($query);
    $namadosen = $dosen['nama'];
    $kodewali = $dosen['kode_wali'];
    $alamat = $dosen['alamat'];
    $email = $dosen['email'];
    $nohp = $dosen['no_hp'];

}
else{
    header ("Location: ../login.php");
}

if(isset($_POST['edit'])){
    $nama = $_POST['nama'];
    $kodewali = $_POST['kode'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['no_hp'];
    $email = $_POST['email'];
    $queryedit = mysqli_query($conn,"UPDATE tb_dosen 
                                SET kode_wali = '$kodewali',
                                nama = '$nama',
                                alamat = '$alamat',
                                no_hp = $nohp,
                                email = '$email'
                                where nip=$nip;");
    header("Location: doswal.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../library/css/style.css">
    <link rel="stylesheet" href="doswal.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="" alt="" class="logo-undip">
            <div class="logo_name">Universitas Diponegoro</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">

            <li>
                <a href="doswal.php">
                    <i class='bx bx-grid-alt' id="icon"></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="editdosen.php">
                    <i class='bx bx-user' id="icon"></i>
                    <span class="links_name">Edit Data Dosen</span>
                </a>
                <span class="tooltip">Edit Data Dosen</span>
            </li>
            <li>
                <a href="verifMhs.php">
                    <i class='bx bx-chat' id="icon"></i>
                    <span class="links_name">Verifikasi <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Verifikasi Mahasiswa</span>
            </li>
            <li>
                <a href="datamhs.php">
                    <i class='bx bx-pie-chart-alt-2' id="icon"></i>
                    <span class="links_name">Lihat Data <br>Mahasiswa</span>
                </a>
                <span class="tooltip">Lihat Data Mahasiswa</span>
            </li>
            <li>
            <a href="../logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <span class="links_name">Keluar</span>
                </a>
                <span class="tooltip">Keluar</span>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="main-menu container">
            <form action="" method="POST" id="buatakun">
                <div class="form-group">
                    <label for="name" id="uname">Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap"
                        value="<?=$dosen['nama'];?>" />
                </div>

                <div class="form-group">
                    <label for="alamat" id="uname">Alamat</label>
                    <input class="form-control" type="text" name="alamat" placeholder="alamat"
                        value="<?=$dosen['alamat'];?>" />
                </div>

                <div class="form-group">
                    <label for="no_telp" id="uname">No. Telepon</label>
                    <input class="form-control" type="number" name="no_hp" placeholder="Nomor Telepon"
                        value="<?=$dosen['no_hp'];?>" />
                </div>

                <div class="form-group">
                    <label for="kode" id="uname">Kode Wali</label>
                    <input class="form-control" type="number" name="kode" placeholder="kode"
                        value="<?=$dosen['kode_wali'];?>" />
                </div>
                <div class="form-group">
                    <label for="kode" id="uname">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="email"
                        value="<?=$dosen['email'];?>" />
                </div>

                <br>
                <div class="col-12 d-flex justify-content-center button-signup" id="ctn-signup">
                    <input type="submit" class="btn btn-class mt-4" name="edit" value="edit" id="signupbutton" />
                </div>
            </form>
        </div>
    </section>
    <script src="../library/js/script.js"> </script>
</body>

</html>