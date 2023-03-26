<?php
include "../../koneksi.php";
$page = 'rampcheck';
if (isset($_POST['submit'])) {
    // $id_user = $_SESSION['idusers'];
    // DATA PEMERIKSAAN
    $id = $_GET['iduadministrasi'];

    $kuji = $_POST['kuji'];
    $kpreguler = $_POST['kpreguler'];
    $kpcadangan = $_POST['kpcadangan'];
    $spengemudi = $_POST['spengemudi'];


    $query1 = "UPDATE `uadministrasi` SET `kuji`='$kuji',`kpreguler`='$kpreguler',
    `kpcadangan`='$kpcadangan',`spengemudi`='$spengemudi' WHERE iduadministrasi=$id";
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
            $id = $_GET['iduadministrasi'];
            $result = mysqli_query($conn, "SELECT * FROM uadministrasi WHERE iduadministrasi=$id");
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <div class=" card-body">
                    <a class="btn btn-secondary mb-3" href="../uadm.php">
                        <i class="zmdi zmdi-long-arrow-return"></i>
                        Kembali
                    </a>
                    <h4>1. UNSUR ADMINISTRASI</h4>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Kartu Uji/STUK
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="kuji" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['kuji'] == 'Ada, berlaku') {
                                                                echo 'selected';
                                                            } ?>>Ada, berlaku</option>
                                    <option class="option" <?php if ($data['kuji'] == 'Tidak berlaku') {
                                                                echo 'selected';
                                                            } ?>>Tidak berlaku</option>
                                    <option class="option" <?php if ($data['kuji'] == 'Tida ada') {
                                                                echo 'selected';
                                                            } ?>>Tida ada</option>
                                    <option class="option" <?php if ($data['kuji'] == 'Tida sesuai fisik') {
                                                                echo 'selected';
                                                            } ?>>Tida sesuai fisik</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                KP Reguler
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="kpreguler" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['kpreguler'] == 'Ada, berlaku') {
                                                                echo 'selected';
                                                            } ?>>Ada, berlaku</option>
                                    <option class="option" <?php if ($data['kpreguler'] == 'Tidak berlaku') {
                                                                echo 'selected';
                                                            } ?>>Tidak berlaku</option>
                                    <option class="option" <?php if ($data['kpreguler'] == 'Tida ada') {
                                                                echo 'selected';
                                                            } ?>>Tida ada</option>
                                    <option class="option" <?php if ($data['kpreguler'] == 'Tida sesuai fisik') {
                                                                echo 'selected';
                                                            } ?>>Tida sesuai fisik</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                KP Cadangan(untuk kendaraan cadangan)
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="kpcadangan" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['kpcadangan'] == 'Ada, berlaku') {
                                                                echo 'selected';
                                                            } ?>>Ada, berlaku</option>
                                    <option class="option" <?php if ($data['kpcadangan'] == 'Tidak berlaku') {
                                                                echo 'selected';
                                                            } ?>>Tidak berlaku</option>
                                    <option class="option" <?php if ($data['kpcadangan'] == 'Tida ada') {
                                                                echo 'selected';
                                                            } ?>>Tida ada</option>
                                    <option class="option" <?php if ($data['kpcadangan'] == 'Tida sesuai fisik') {
                                                                echo 'selected';
                                                            } ?>>Tida sesuai fisik</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                SIM Pengemudi
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="spengemudi" id="" class="form-control" required>
                                    <option class="option" <?php if ($data['spengemudi'] == 'A(Umum)') {
                                                                echo 'selected';
                                                            } ?>>A(Umum)</option>
                                    <option class="option" <?php if ($data['spengemudi'] == 'B1(Umum)') {
                                                                echo 'selected';
                                                            } ?>>B1(Umum)</option>
                                    <option class="option" <?php if ($data['spengemudi'] == 'B2(Umum)') {
                                                                echo 'selected';
                                                            } ?>>B2(Umum)</option>
                                    <option class="option" <?php if ($data['spengemudi'] == 'Sim tidak sesuai') {
                                                                echo 'selected';
                                                            } ?>>Sim tidak sesuai</option>
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