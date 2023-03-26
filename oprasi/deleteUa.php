<?php
include "../../koneksi.php";
if (empty($_SESSION['username']) || $_SESSION['username'] == '') {
    header("Location: $host");
    die();
}

$id = $_GET['iduadministrasi'];
$query = "DELETE FROM uadministrasi WHERE iduadministrasi='$id'";
$hasil = mysqli_query($conn, $query);
echo "<script> 
        alert('Delete data berhasil'); 
		location = '../uadm.php'; 
	</script>";
