<?php
include "../koneksi.php";
$page = 'rampcheck';
if (isset($_POST['submit'])) {
    // $id_user = $_SESSION['idusers'];
    // DATA PEMERIKSAAN
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

    // UNSUR ADMINISTRASI
    $kuji = $_POST['kuji'];
    $kpreguler = $_POST['kpreguler'];
    $kpcadangan = $_POST['kpcadangan'];
    $spengemudi = $_POST['spengemudi'];

    // UNSUR TEKNIS UTAMA
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

    // if ($ldekat == 'Tidak menyala(kanan)') {
    //     $ldekat = 1;
    // } elseif ($ldekat == 'Tidak menyala(kiri)') {
    //     $ldekat = 1;
    // }
    // if ($ldekat == 'Tidak menyala(kanan)') {
    //     $ljauh = 1;
    // } elseif ($ljauh == 'Tidak menyala(kiri)') {
    //     $ljauh = 1;
    // }

    $query = "INSERT INTO `dpemeriksaan`(`name`, `tanggal`, `lokasi`, `nlokasi`, `umur`, `npo`, `nstuk`, `nkendaraan`, `ntkendaraan`, `jtrayek`, `trayek`) 
    VALUES ('$name','$tanggal','$lokasi','$nlokasi','$umur','$npo','$nstuk','$nkendaraan','$ntkendaraan','$jtrayek','$trayek')";
    $sql = mysqli_query($conn, $query);

    $sql4 = "SELECT * FROM dpemeriksaan WHERE tanggal='$tanggal'";
    $result = mysqli_query($conn, $sql4);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['iddpemeriksaan'];

        $query1 = "INSERT INTO `uadministrasi`(`iddpemeriksaan`, `kuji`, `kpreguler`, `kpcadangan`, `spengemudi`) 
        VALUES ('$id','$kuji','$kpreguler','$kpcadangan','$spengemudi')";
        $sql1 = mysqli_query($conn, $query1);

        $query2 = "INSERT INTO `uteknisu`(`iddpemeriksaan`, `ldekat`, `ljauh`, `ldepan`, `lbelakang`, `lrem`, `lmundur`, `rutama`, `rparkir`, `kdepan`, `kbdepan`, `kbbelakang`, `skpengemudi`) 
        VALUES ('$id','$ldekat','$ljauh','$ldepan','$lbelakang','$lrem','$lmundur','$rutama','$rparkir','$kdepan','$kbdepan','$kbbelakang','$skpengemudi')";
        $sql2 = mysqli_query($conn, $query2);

        $query3 = "INSERT INTO `uteknisp`(`iddpemeriksaan`, `pkecepatan`, `lsdepan`, `lsbelakang`, `kspion`, `kwiper`, `klakson`, `jtduduk`, `bcadangan`, `spengaman`, `dongkrak`, `proda`, `lsenter`, `pdarurat`, `jdarurat`, `pkaca`) 
        VALUES ('$id','$pkecepatan','$lsdepan','$lsbelakang','$kspion','$kwiper','$klakson','$jtduduk','$bcadangan','$spengaman','$dongkrak','$proda','$lsenter','$pdarurat','$jdarurat','$pkaca')";
        $sql3 = mysqli_query($conn, $query3);
        if ($sql) {
            echo "<script> alert('Data berhasil disimpan.'); </script>";
            header("Location: validate.php?iddpemeriksaan=$id");
        } else {
            echo "<script> alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); </script>";
        }
    } else {
        echo "<script>alert('Terjadi Kesalahan!!!')</script>";
    }
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
    <link rel="stylesheet" href="../css/my.css">
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="../form-style/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="../form-style/vendor/date-picker/css/datepicker.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="../form-style/css/style.css">

</head>

<body>


    <div class="wrapper">
        <?php include './navbar.php'; ?>
        <form method="POST" id="wizard">
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <h3>DATA PEMERIKSAAN</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Hari/Tanggal
                        </label>
                        <div class="form-holder">
                            <i class="bi bi-calendar-check-fill"></i>
                            <input name="tanggal" type="date" class="form-control datepicker-here" required>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Nama Pengemudi
                        </label>
                        <div class="form-holder">
                            <i class="bi bi-person-fill"></i>
                            <input type="text" class="form-control" name="name" required>
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
                            <input name="umur" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Nama Lokasi
                        </label>
                        <div class="form-holder">
                            <i class="bi bi-pin-map-fill"></i>
                            <input name="nlokasi" type="text" class="form-control" required>
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
                            <select name="lokasi" id="" class="form-control" required>
                                <option class="option">Terminal</option>
                                <option class="option">Pool</option>
                                <option class="option">Lainya</option>
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
                            <input name="npo" type="text" class="form-control" required>
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
                            <input name="nkendaraan" type="text" class="form-control" id="nkendaraan" required>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Nomor Stuk
                        </label>
                        <div class="form-holder">
                            <i class="bi bi-postcard-fill"></i>
                            <input name="nstuk" type="text" class="form-control" required>
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
                                <option class="option">Reguler</option>
                                <option class="option">Cadangan</option>
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
                                <option class="option">AKAP</option>
                                <option class="option">AKDP</option>
                                <option class="option">PARIWISA</option>
                                <option class="option">MPU</option>
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
                            <input name="trayek" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>

            </section>

            <!-- SECTION 2 -->
            <h4></h4>
            <section>
                <h4>1. UNSUR ADMINISTRASI</h4>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Kartu Uji/STUK
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <select name="kuji" id="" class="form-control" required>
                                <option class="option">Ada, berlaku</option>
                                <option class="option">Tidak berlaku</option>
                                <option class="option">Tida ada</option>
                                <option class="option">Tida sesuai fisik</option>
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
                                <option class="option">Ada, berlaku</option>
                                <option class="option">Tidak berlaku</option>
                                <option class="option">Tida ada</option>
                                <option class="option">Tida sesuai fisik</option>
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
                                <option class="option">Ada, berlaku</option>
                                <option class="option">Tidak berlaku</option>
                                <option class="option">Tida ada</option>
                                <option class="option">Tida sesuai fisik</option>
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
                                <option class="option">A(Umum)</option>
                                <option class="option">B1(Umum)</option>
                                <option class="option">B2(Umum)</option>
                                <option class="option">Sim tidak sesuai</option>
                            </select>
                            <i class="zmdi zmdi-chevron-down"></i>
                        </div>
                    </div>
                </div>
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
                                <option class="option">Semua menyala</option>
                                <option class="option">Tidak menyala(kanan)</option>
                                <option class="option">Tidak menyala(kiri)</option>
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
                                <option class="option">Semua menyala</option>
                                <option class="option">Tidak menyala(kanan)</option>
                                <option class="option">Tidak menyala(kiri)</option>
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
                                <option class="option">Semua menyala</option>
                                <option class="option">Tidak menyala(kanan)</option>
                                <option class="option">Tidak menyala(kiri)</option>
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
                                <option class="option">Semua menyala</option>
                                <option class="option">Tidak menyala(kanan)</option>
                                <option class="option">Tidak menyala(kiri)</option>
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
                                <option class="option">Semua menyala</option>
                                <option class="option">Tidak menyala(kanan)</option>
                                <option class="option">Tidak menyala(kiri)</option>
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
                                <option class="option">Semua menyala</option>
                                <option class="option">Tidak menyala(kanan)</option>
                                <option class="option">Tidak menyala(kiri)</option>
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
                                <option class="option">Berfungsi</option>
                                <option class="option">Tidak Berfungsi</option>
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
                                <option class="option">Berfungsi</option>
                                <option class="option">Tidak Berfungsi</option>
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
                                <option class="option">Baik</option>
                                <option class="option">Buruk</option>
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
                                <option class="option">Semua Laik</option>
                                <option class="option">Tidak Laik(Kanan)</option>
                                <option class="option">Tidak Laik(Kiri)</option>
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
                                <option class="option">Semua Laik</option>
                                <option class="option">Tidak Laik(Kanan)</option>
                                <option class="option">Tidak Laik(Kiri)</option>
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
                                <option class="option">Ada dan fungsi</option>
                                <option class="option">Tidak fungsi/Tidak ada</option>
                            </select>
                            <i class="zmdi zmdi-chevron-down"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 3 -->
            <h4></h4>
            <section>
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
                                <option class="option">Ada dan fungsi</option>
                                <option class="option">Tidak berfungsi</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Semua menyala</option>
                                <option class="option">Tidak menyala(kanan)</option>
                                <option class="option">Tidak menyala(kiri)</option>
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
                                <option class="option">Semua menyala</option>
                                <option class="option">Tidak menyala(kanan)</option>
                                <option class="option">Tidak menyala(kiri)</option>
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
                                <option class="option">Ada dan sesuai</option>
                                <option class="option">Tidak sesuai</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak berfungsi</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak berfungsi</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Sesuai</option>
                                <option class="option">Tidak Sesuai</option>
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
                                <option class="option">Ada dan Laik</option>
                                <option class="option">Tidak Laik</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak Berfungsi</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak ada</option>
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
                                <option class="option">Ada</option>
                                <option class="option">Tidak ada</option>
                            </select>
                            <i class="zmdi zmdi-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <div class="btnfc">
                    <button name="submit" class=" btnf">SIMPAN</button>
                </div>
            </section>

        </form>
    </div>

    <script src="../form-style/js/jquery-3.3.1.min.js"></script>

    <!-- JQUERY STEP -->
    <script src="../form-style/js/jquery.steps.js"></script>

    <!-- DATE-PICKER -->
    <script src="../form-style/vendor/date-picker/js/datepicker.js"></script>
    <script src="../form-style/vendor/date-picker/js/datepicker.en.js"></script>

    <script src="../form-style/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Template created and distributed by Colorlib -->
</body>

</html>