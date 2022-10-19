<?php
require_once('../db_login.php');
session_start();

if (!isset($_SESSION['nip'])){ 
    header ("Location:../login.php");
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

    <form method="POST" autocomplete="on">
        <section class="home-section">
            <div class="container">
                <h1 id="header">VERIFIKASI BERKAS MAHASISWA </h1>
                <div class="row mt-5 gx-5 justify-content-center">

                    <div class="col-md-6 justify-content-center" id="showstats" onclick="location.href='verifIRS.php'">
                        <h1 id="div_title"> IRS <h1>
                    </div>

                    <div class="col-md-6 justify-content-center" id="showstats" onclick="location.href='verifKHS.php'">
                        <h1 id="div_title"> KHS <h1>
                    </div>

                </div>
                <div class="row mt-5 gx-5 justify-content-center">

                    <div class="col-md-6 justify-content-center" id="showstats" onclick="location.href='verifPKL.php'">
                        <h1 id="div_title"> PKL <h1>
                    </div>

                    <div class="col-md-6 justify-content-center" id="showstats" onclick="location.href='verifSkripsi.php'">
                        <h1 id="div_title"> SKRIPSI <h1>
                    </div>


                </div>
            </div>

        </section>
    </form>
    <script src="../library/js/script.js"> </script>
</body>

</html>