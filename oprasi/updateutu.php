<?php
include "../../koneksi.php";
$page = 'rampcheck';
if (isset($_POST['submit'])) {
    // $id_user = $_SESSION['idusers'];
    $id = $_GET['iduteknisu'];

    // UNSUR TEKNIS PENUNJANG
    $ldekat = $_POST['ldekat'];
    $ljauh = $_POST['ljauh'];
    $ldepan = $_POST['ldepan'];
    $lbelakang = $_POST['lbelakang'];
    $lrem = $_POST['lrem'];
    $lmundur = $_POST['lmundur'];
    $rutama = $_POST['rutama'];
    $rparkir = $_POST['rparkir'];
    $kdepan = $_POST['kdepan'];
    $kbdepan = $_POST['kbdepan'];
    $kbbelakang = $_POST['kbbelakang'];
    $skpengemudi = $_POST['skpengemudi'];


    $query1 = "UPDATE `uteknisu` SET `ldekat`='$ldekat',`ljauh`='$ljauh',`ldepan`='$ldepan',
    `lbelakang`='$lbelakang',`lrem`='$lrem',`lmundur`='$lmundur',`rutama`='$rutama',
    `rparkir`='$rparkir',`kdepan`='$kdepan',`kbdepan`='$kbdepan',`kbbelakang`='$kbbelakang',
    `skpengemudi`='$skpengemudi' WHERE iduteknisu=$id";
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
            $id = $_GET['iduteknisu'];
            $result = mysqli_query($conn, "SELECT * FROM uteknisu WHERE iduteknisu=$id");
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <div class=" card-body">
                    <a class="btn btn-secondary mb-3" href="../utu.php">
                        <i class="zmdi zmdi-long-arrow-return"></i>
                        Kembali
                    </a>
                    <h4>2. UNSUR TEKNIS UTAMA</h4>
                    <h5>A. SISTEM PENERANGAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Lampu(Dekat)
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="ldekat" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['ldekat'] == 'Semua menyala') {
                                                                echo 'selected';
                                                            } ?>>Semua menyala</option>
                                    <option class="option" <?php if ($data['ldekat'] == 'Tidak menyala(kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kanan)</option>
                                    <option class="option" <?php if ($data['ldekat'] == 'Tidak menyala(kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Lampu(Jauh)
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="ljauh" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['ljauh'] == 'Semua menyala') {
                                                                echo 'selected';
                                                            } ?>>Semua menyala</option>
                                    <option class="option" <?php if ($data['ljauh'] == 'Tidak menyala(kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kanan)</option>
                                    <option class="option" <?php if ($data['ljauh'] == 'Tidak menyala(kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Lampu(Depan)
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="ldepan" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['ldepan'] == 'Semua menyala') {
                                                                echo 'selected';
                                                            } ?>>Semua menyala</option>
                                    <option class="option" <?php if ($data['ldepan'] == 'Tidak menyala(kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kanan)</option>
                                    <option class="option" <?php if ($data['ldepan'] == 'Tidak menyala(kiri)') {
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
                                <select name="lbelakang" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['lbelakang'] == 'Semua menyala') {
                                                                echo 'selected';
                                                            } ?>>Semua menyala</option>
                                    <option class="option" <?php if ($data['lbelakang'] == 'Tidak menyala(kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kanan)</option>
                                    <option class="option" <?php if ($data['lbelakang'] == 'Tidak menyala(kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Lampu Rem
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="lrem" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['lrem'] == 'Semua menyala') {
                                                                echo 'selected';
                                                            } ?>>Semua menyala</option>
                                    <option class="option" <?php if ($data['lrem'] == 'Tidak menyala(kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kanan)</option>
                                    <option class="option" <?php if ($data['lrem'] == 'Tidak menyala(kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Lampu Mundur
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="lmundur" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['lmundur'] == 'Semua menyala') {
                                                                echo 'selected';
                                                            } ?>>Semua menyala</option>
                                    <option class="option" <?php if ($data['lmundur'] == 'Tidak menyala(kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kanan)</option>
                                    <option class="option" <?php if ($data['lmundur'] == 'Tidak menyala(kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak menyala(kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>B. SISTEM PENGEREMAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Kondisi Rem Utama
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="rutama" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['rutama'] == 'Berfungsi') {
                                                                echo 'selected';
                                                            } ?>>Berfungsi</option>
                                    <option class="option" <?php if ($data['rutama'] == 'Tidak Berfungsi') {
                                                                echo 'selected';
                                                            } ?>>Tidak Berfungsi</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Kondisi Rem Parkir
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="rparkir" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['rparkir'] == 'Berfungsi') {
                                                                echo 'selected';
                                                            } ?>>Berfungsi</option>
                                    <option class="option" <?php if ($data['rparkir'] == 'Tidak Berfungsi') {
                                                                echo 'selected';
                                                            } ?>>Tidak Berfungsi</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>C. BADAN KENDARAAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Kondisi Kaca Depan
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="kdepan" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['kdepan'] == 'Baik') {
                                                                echo 'selected';
                                                            } ?>>Baik</option>
                                    <option class="option" <?php if ($data['kdepan'] == 'Buruk') {
                                                                echo 'selected';
                                                            } ?>>Buruk</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>D. BAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Kondisi BAN Depan
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="kbdepan" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['kbdepan'] == 'Semua Laik') {
                                                                echo 'selected';
                                                            } ?>>Semua Laik</option>
                                    <option class="option" <?php if ($data['kbdepan'] == 'Tidak Laik(Kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak Laik(Kanan)</option>
                                    <option class="option" <?php if ($data['kbdepan'] == 'Tidak Laik(Kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak Laik(Kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Kondisi BAN Belakang
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="kbbelakang" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['kbbelakang'] == 'Semua Laik') {
                                                                echo 'selected';
                                                            } ?>>Semua Laik</option>
                                    <option class="option" <?php if ($data['kbbelakang'] == 'Tidak Laik(Kanan)') {
                                                                echo 'selected';
                                                            } ?>>Tidak Laik(Kanan)</option>
                                    <option class="option" <?php if ($data['kbbelakang'] == 'Tidak Laik(Kiri)') {
                                                                echo 'selected';
                                                            } ?>>Tidak Laik(Kiri)</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <h5>E. PERLENGKAPAN</h5>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Sabuk Keselamatan Pengemudi
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="skpengemudi" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['skpengemudi'] == 'Ada dan fungsi') {
                                                                echo 'selected';
                                                            } ?>>Ada dan fungsi</option>
                                    <option class="option" <?php if ($data['skpengemudi'] == 'Tidak fungsi/Tidak ada') {
                                                                echo 'selected';
                                                            } ?>>Tidak fungsi/Tidak ada</option>
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