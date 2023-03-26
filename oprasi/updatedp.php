<?php
include "../../koneksi.php";
$page = 'rampcheck';
if (isset($_POST['submit'])) {
    // $id_user = $_SESSION['idusers'];
    // DATA PEMERIKSAAN
    $id = $_GET['iddpemeriksaan'];

    $name = $_POST['name'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $nlokasi = $_POST['nlokasi'];
    $umur = $_POST['umur'];
    $npo = $_POST['npo'];
    $nkendaraan = $_POST['nkendaraan'];
    $ntkendaraan = $_POST['ntkendaraan'];
    $nstuk = $_POST['nstuk'];
    $jtrayek = $_POST['jtrayek'];
    $trayek = $_POST['trayek'];


    $query = "UPDATE `dpemeriksaan` SET `name`='$name',`tanggal`='$tanggal',`lokasi`='$lokasi',`nlokasi`='$nlokasi',
    `umur`='$umur',`npo`='$npo',`nstuk`='$nstuk',`nkendaraan`='$nkendaraan',`ntkendaraan`='$ntkendaraan',`jtrayek`='$jtrayek',`trayek`='$trayek' WHERE iddpemeriksaan= $id";
    $sql = mysqli_query($conn, $query);

    echo "<script> alert('Data berhasil diupdate.'); </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FormWizard_v9</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/my.css">
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="../../form-style/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="../../form-style/vendor/date-picker/css/datepicker.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="../../form-style/css/style.css">

</head>

<body class=" p-3">
    <?php include '../navbar.php'; ?>

    <div class="card p-4">

        <form method="POST">
            <?php
            $id = $_GET['iddpemeriksaan'];
            $result = mysqli_query($conn, "SELECT * FROM dpemeriksaan WHERE iddpemeriksaan=$id");
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <div class=" card-body">
                    <a class="btn btn-secondary mb-3" href="../history.php">
                        <i class="zmdi zmdi-long-arrow-return"></i>
                        Kembali
                    </a>
                    <h3>UPDATE DATA PEMERIKSAAN</h3>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Hari/Tanggal
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-calendar-check-fill"></i>
                                <input name="tanggal" type="date" class="form-control" value="<?php echo $data['tanggal']; ?>" required>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Nama Pengemudi
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-person-fill"></i>
                                <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Umur
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-calendar-event-fill"></i>
                                <input name="umur" type="number" class="form-control" value="<?php echo $data['umur']; ?>" required>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Nama Lokasi
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-pin-map-fill"></i>
                                <input name="nlokasi" type="text" class="form-control" value="<?php echo $data['nlokasi']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Lokasi
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-geo-alt-fill"></i>
                                <select name="lokasi" id="" class="form-control" value="<?php echo $data['lokasi']; ?>" required>
                                    <option class="option" <?php if ($data['lokasi'] == 'Terminal') {
                                                                echo 'selected';
                                                            } ?>>Terminal</option>
                                    <option class="option" <?php if ($data['lokasi'] == 'Pool') {
                                                                echo 'selected';
                                                            } ?>>Pool</option>
                                    <option class="option" <?php if ($data['lokasi'] == 'Lainya') {
                                                                echo 'selected';
                                                            } ?>>Lainya</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Nama PO
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-person-fill"></i>
                                <input name="npo" type="text" class="form-control" value="<?php echo $data['npo']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Nomor Kendaraan
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-car-front-fill"></i>
                                <input name="nkendaraan" type="text" class="form-control" id="nkendaraan" value="<?php echo $data['nkendaraan']; ?>" required>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Nomor Stuk
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-postcard-fill"></i>
                                <input name="nstuk" type="text" class="form-control" value="<?php echo $data['nstuk']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Nomor Kendaraan
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-file-text-fill"></i>
                                <select name="ntkendaraan" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['ntkendaraan'] == 'Reguler') {
                                                                echo 'selected';
                                                            } ?>>Reguler</option>
                                    <option class="option" <?php if ($data['ntkendaraan'] == 'Cadangan') {
                                                                echo 'selected';
                                                            } ?>>Cadangan</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Jenis Trayek
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-map-fill"></i>
                                <select name="jtrayek" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['jtrayek'] == 'AKAP') {
                                                                echo 'selected';
                                                            } ?>>AKAP</option>
                                    <option class="option" <?php if ($data['jtrayek'] == 'AKDP') {
                                                                echo 'selected';
                                                            } ?>>AKDP</option>
                                    <option class="option" <?php if ($data['jtrayek'] == 'PARIWISA') {
                                                                echo 'selected';
                                                            } ?>>PARIWISA</option>
                                    <option class="option" <?php if ($data['jtrayek'] == 'MPU') {
                                                                echo 'selected';
                                                            } ?>>MPU</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                TRAYEK
                            </label>
                            <div class="form-holder">
                                <i class="bi bi-map"></i>
                                <input name="trayek" type="text" class="form-control" value="<?php echo $data['trayek']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="btnfc mb-5">
                        <button name="submit" class=" btnf">SIMPAN</button>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>

    <script src="../../form-style/js/jquery-3.3.1.min.js"></script>

    <!-- JQUERY STEP -->
    <script src="../../form-style/js/jquery.steps.js"></script>

    <!-- DATE-PICKER -->
    <script src="../../form-style/vendor/date-picker/js/datepicker.js"></script>
    <script src="../../form-style/vendor/date-picker/js/datepicker.en.js"></script>

    <script src="../../form-style/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Template created and distributed by Colorlib -->
</body>

</html>