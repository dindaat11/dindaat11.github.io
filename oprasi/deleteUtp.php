<?php
include "../../koneksi.php";
if (empty($_SESSION['username']) || $_SESSION['username'] == '') {
    header("Location: $host");
    die();
}

$id = $_GET['iduteknisp'];
$query = "DELETE FROM uteknisp WHERE iduteknisp='$id'";
$hasil = mysqli_query($conn, $query);
echo "<script> 
        alert('Delete data berhasil'); 
		location = '../utp.php'; 
	</script>";
