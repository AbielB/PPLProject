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

        <h1 id="datadirititle">Home</h1>
        <h3 id="halo">Halo <?php echo $namadosen ?></h3>
        <div id="datadiri">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <img src="../img/default-profile-pic.jpg" id="profilepic">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-warning" onclick="location.href = 'editdosen.php'">Edit
                            data
                            diri</button>
                    </div>
                </div>
                <div class="col-8">
                    <h2>Nama lengkap: <?php echo $namadosen ?></h2>
                    <h3>NIP: <?php echo $nip ?></h3>
                    <h3>Kode Wali : <?php echo $kodewali ?></h3>
                    <h3>Alamat : <?php echo $alamat ?></h3>
                    <h3>Kabupaten/Kota : Semarang</h3>
                    <h3>Propinsi : Jawa Tengah </h3>
                    <h3>Email : <?php echo $email ?></h3>
                    <h3>No. HP : <?php echo $nohp ?></h3>

                </div>
            </div>
        </div>


        <div id="stat">
            <div class="row gx-5 justify-content-center">

                <div class="col-lg-4 col-md-12 " id="showstats">
                    <h3 class="text-center">Mahasiswa Perwalian</h3>
                    <h1 class="text-center">129</h1>
                </div>

                <div class="col-lg-4 col-md-6" id="showstats">
                    <h3 class="text-center">Mahasiswa Perwalian Aktif</h3>
                    <h1 class="text-center">40</h1>
                </div>

                <div class="col-lg-4 col-md-6" id="showstats">
                    <h3 class="text-center">Mahasiswa Perwalian Sudah Lulus Skripsi</h3>
                    <h1 class="text-center">43</h1>
                </div>

            </div>
        </div>
        <div id="stat">
            <div class="row gx-5 justify-content-center">

                <div class="col-lg-4 col-md-12 " id="showstats">
                    <h3 class="text-center">Mahasiswa Perwalian Cuti</h3>
                    <h1 class="text-center">32</h1>
                </div>

                <div class="col-lg-4 col-md-6" id="showstats">
                    <h3 class="text-center">Mahasiswa Perwalian Sudah PKL</h3>
                    <h1 class="text-center">21</h1>
                </div>

                <div class="col-lg-4 col-md-6" id="showstats">
                    <h3 class="text-center">Mahasiswa Perwalian Mangkir</h3>
                    <h1 class="text-center">2</h1>
                </div>

            </div>
        </div>

    </section>
    <script src="../library/js/script.js"> </script>
</body>

</html>