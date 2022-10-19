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

    <form method="GET" autocomplete="on">
        <section class="home-section">
            <div class="d-flex justify-content-center" id="searchmhs">
                <h3 id="header">Verifikasi KHS Mahasiswa</h3>
                <input class="form-control" type="text" name="nama_mhs" placeholder="Nama Mahasiswa" value=""
                    id="nama_mhs" />
                <input type="submit" class="btn btn-class mt-4" name="cari_mhs" value="Cari" />
            </div>

            <div id="datamhs">
                <h4>Mahasiswa Perwalian</h4>
                <div class="d-flex justify-content-center">
                    <table id="tabelmhs">
                        <tr>
                            <th id="table1">NO. </th>
                            <th id="table1">NAMA </th>
                            <th id="table1">NIM </th>
                            <th id="table1">SEMESTER </th>
                            <th id="table1">SKS </th>
                            <th id="table1">SKS KUMULATIF</th>
                            <th id="table1">IP SEMESTER</th>
                            <th id="table1">IP KUMULATIF</th>
                            <th id="table1">SCAN KHS </th>
                            <th id="table2">VERIFIKASI </th>
                        </tr>
                        <?php 

                        $query = "SELECT * FROM tb_khs JOIN tb_mhs where tb_khs.nim = tb_mhs.nim ORDER BY tb_khs.verif_khs,tb_khs.semester";
                        $connect = mysqli_query($conn, $query);
                        $no = 1;

                        if (isset($_GET['cari_mhs'])){
                            $nama_mhs = $_GET['nama_mhs'];
                            $query = "SELECT * FROM tb_khs JOIN tb_mhs where tb_khs.nim = tb_mhs.nim && tb_mhs.nama LIKE '%".$nama_mhs."%' ORDER BY tb_khs.verif_khs,tb_khs.semester";
                            $connect = mysqli_query($conn, $query);
                            $no = 1;
                        }
                        
                    
                    while ($data = $connect->fetch_object()) {
                        $st_verif = $data->verif_khs;
                        if ($st_verif == "belum"){
                            $selectstatus1 = "selected = true";
                            $selectstatus2 = "";
                        }
                        elseif ($st_verif == "sudah"){
                                $selectstatus1 = "";
                                $selectstatus2 = "selected = true";
                        }
                        echo '<tr id ="rows">';
                        echo '<td id="table1">'.$no.'</td>';
                        echo '<td id="table1">'.$data->nama.'</td>';
                        echo '<td id="table1">'.$data->nim.'</td>';
                        echo '<td id="table1">'.$data->semester.'</td>';
                        echo '<td id="table1">'.$data->sks.'</td>';
                        echo '<td id="table1">'.$data->sks_kumulatif.'</td>';
                        echo '<td id="table1">'.$data->ip_semester.'</td>';
                        echo '<td id="table1">'.$data->ip_kumulatif.'</td>';
                        ?>
                        <td id="table1"><button type="button" class="btn btn-primary"
                                onclick="location.href = 'scanKHS.php?nim=<?php echo $data->nim ?>'">Lihat
                                Scan KHS</button></td>
                        <?php echo '
                         <td>
                            <select id="'.$data->nim.'" name="verif_khs" class="form-control" onchange="changeKHS('.$data->nim.')">
                                <option value="belum"'.$selectstatus1.'>Belum</option>
                                <option value="sudah"'.$selectstatus2.'>Sudah</option>
                            </select>
                        </td>'; ?>
                        <?php echo '</tr>';
                        $no = $no+1;
                    }
                  ?>
                    </table>
                </div>
            </div>
        </section>
    </form>
    <p id="db_status"></p>
    <script src="../library/js/script.js"> </script>