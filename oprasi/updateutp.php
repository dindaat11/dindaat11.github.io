<?php
include "../../koneksi.php";
$page = 'rampcheck';
if (isset($_POST['submit'])) {
    // $id_user = $_SESSION['idusers'];
    $id = $_GET['iduteknisp'];

    // UNSUR TEKNIS PENUNJANG
    $pkecepatan = $_POST['pkecepatan'];
    $lsdepan = $_POST['lsdepan'];
    $lsbelakang = $_POST['lsbelakang'];
    $kspion = $_POST['kspion'];
    $kwiper = $_POST['kwiper'];
    $klakson = $_POST['klakson'];
    $jtduduk = $_POST['jtduduk'];
    $bcadangan = $_POST['bcadangan'];
    $spengaman = $_POST['spengaman'];
    $dongkrak = $_POST['dongkrak'];
    $proda = $_POST['proda'];
    $lsenter = $_POST['lsenter'];
    $pdarurat = $_POST['pdarurat'];
    $jdarurat = $_POST['jdarurat'];
    $pkaca = $_POST['pkaca'];


    $query1 = "UPDATE `uteknisp` SET `pkecepatan`='$pkecepatan',`lsdepan`='$lsdepan',
    `lsbelakang`='$lsbelakang',`kspion`='$kspion',`kwiper`='$kwiper',`klakson`='$klakson',`jtduduk`='$jtduduk',`bcadangan`='$bcadangan',
    `spengaman`='$spengaman',`dongkrak`='$dongkrak',`proda`='$proda',`lsenter`='$lsenter',`pdarurat`='$pdarurat',
    `jdarurat`='$jdarurat',`pkaca`='$pkaca' WHERE iduteknisp=$id";
    $sql1 = mysqli_query($conn, $query1);

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
            $id = $_GET['iduteknisp'];
            $result = mysqli_query($conn, "SELECT * FROM uteknisp WHERE iduteknisp=$id");
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <div class=" card-body">
                    <a class="btn btn-secondary mb-3" href="../utp.php">
                        <i class="zmdi zmdi-long-arrow-return"></i>
                        Kembali
                    </a>
                    <h3>3. UNSUR TEKNIS PENUNJANG</h3>
                    <h5>A. PENGUKURAN KECEPATAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Pengukuran kecepatan
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="pkecepatan" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['pkecepatan'] == 'Ada dan fungsi') {
                                                                echo 'selected';
                                                            } ?>>Ada dan fungsi</option>
                                    <option class="option" <?php if ($data['pkecepatan'] == 'Tidak berfungsi') {
                                                                echo 'selected';
                                                            } ?>>Tidak berfungsi</option>
                                    <option class="option" <?php if ($data['pkecepatan'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>B. SISTEM PENERANGAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Lampu(Depan)
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="lsdepan" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['lsdepan'] == 'Semua menyala') {
                                                                echo 'selected';
                                                            } ?>>Semua menyala</option>
                                    <option class="option" <?php if ($data['lsdepan'] == 'Tidak menyala(kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kanan)</option>
                                    <option class="option" <?php if ($data['lsdepan'] == 'Tidak menyala(kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Lampu(Belakang)
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="lsbelakang" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['lsbelakang'] == 'Semua menyala') {
                                                                echo 'selected';
                                                            } ?>>Semua menyala</option>
                                    <option class="option" <?php if ($data['lsbelakang'] == 'Tidak menyala(kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kanan)</option>
                                    <option class="option" <?php if ($data['lsbelakang'] == 'Tidak menyala(kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>C. BADAN KENDARAAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Kaca Spion
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="kspion" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['kspion'] == 'Ada dan sesuai') {
                                                                echo 'selected';
                                                            } ?>>Ada dan sesuai</option>
                                    <option class="option" <?php if ($data['kspion'] == 'Tidak sesuai') {
                                                                echo 'selected';
                                                            } ?>>Tidak sesuai</option>
                                    <option class="option" <?php if ($data['kspion'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Penghapus Kaca (Wiper)
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="kwiper" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['kwiper'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['kwiper'] == 'Tidak berfungsi') {
                                                                echo 'selected';
                                                            } ?>>Tidak berfungsi</option>
                                    <option class="option" <?php if ($data['kwiper'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Klakson
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="klakson" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['klakson'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['klakson'] == 'Tidak berfungsi') {
                                                                echo 'selected';
                                                            } ?>>Tidak berfungsi</option>
                                    <option class="option" <?php if ($data['klakson'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>D. KAPASITAS TEMPAT DUDUK</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Jumlah Tempat Duduk Penumpang
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="jtduduk" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['jtduduk'] == 'Sesuai') {
                                                                echo 'selected';
                                                            } ?>>Sesuai</option>
                                    <option class="option" <?php if ($data['jtduduk'] == 'Tidak Sesuai') {
                                                                echo 'selected';
                                                            } ?>>Tidak Sesuai</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>E. PERLENGKAPAN KENDARAAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Ban Cadangan
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="bcadangan" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['bcadangan'] == 'Ada dan Laik') {
                                                                echo 'selected';
                                                            } ?>>Ada dan Laik</option>
                                    <option class="option" <?php if ($data['bcadangan'] == 'Tidak Laik') {
                                                                echo 'selected';
                                                            } ?>>Tidak Laik</option>
                                    <option class="option" <?php if ($data['bcadangan'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Segitiga Pengaman
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="spengaman" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['spengaman'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['spengaman'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Dongkrak
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="dongkrak" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['dongkrak'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['dongkrak'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Pembuka Roda
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="proda" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['proda'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['proda'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Lampu Senter
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="lsenter" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['lsenter'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['lsenter'] == 'Tidak Berfungsi') {
                                                                echo 'selected';
                                                            } ?>>Tidak Berfungsi</option>
                                    <option class="option" <?php if ($data['lsenter'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>F. TANGGAP DARURAT</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Pintu Darurat
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="pdarurat" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['pdarurat'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['pdarurat'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Jendela Darurat
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="jdarurat" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['jdarurat'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['jdarurat'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Alat Pemukul/Pemecah Kaca
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="pkaca" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['pkaca'] == 'Ada') {
                                                                echo 'selected';
                                                            } ?>>Ada</option>
                                    <option class="option" <?php if ($data['pkaca'] == 'Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak ada</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
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