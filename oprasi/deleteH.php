<?php
include "../../koneksi.php";
if (empty($_SESSION['username']) || $_SESSION['username'] == '') {
    header("Location: $host");
    die();
}

$id = $_GET['iddpemeriksaan'];
$query = "DELETE FROM dpemeriksaan WHERE iddpemeriksaan='$id'";
$hasil = mysqli_query($conn, $query);
echo "<script> 
        alert('Delete data berhasil'); 
		location = '../history.php'; 
	</script>";
