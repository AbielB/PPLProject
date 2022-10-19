<?php
    require_once('../db_login.php');
    $nim = $_GET['nim'];
	$status = $_GET['status'];
    $params = array(
        ":status" => $status,
        ":nim" => $nim,
      );
	//Asign a query
    $saved = false;
	$query = "UPDATE tb_khs SET verif_khs='".$status."' WHERE nim=".$nim;
    $connect = mysqli_query($conn, $query);

    if ($connect){
        echo "<p>UPDATE SUCCESSFUL </p>";
    }
    else{
        echo $nim.' '.$status;
        echo 'gagal';
    }

?>