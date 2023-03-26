<?php
include "../../koneksi.php";
if (empty($_SESSION['username']) || $_SESSION['username'] == '') {
    header("Location: $host");
    die();
}

$id = $_GET['iduteknisu'];
$query = "DELETE FROM uteknisu WHERE iduteknisu='$id'";
$hasil = mysqli_query($conn, $query);
echo "<script> 
        alert('Delete data berhasil'); 
		location = '../utu.php'; 
	</script>";
