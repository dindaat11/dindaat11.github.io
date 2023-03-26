<?php
include "../koneksi.php";

$id = $_GET['iddpemeriksaan'];

$sql = "SELECT * FROM dpemeriksaan 
INNER JOIN uadministrasi ON dpemeriksaan.iddpemeriksaan = uadministrasi.iddpemeriksaan 
INNER JOIN uteknisp ON dpemeriksaan.iddpemeriksaan = uteknisp.iddpemeriksaan 
INNER JOIN uteknisu ON dpemeriksaan.iddpemeriksaan = uteknisu.iddpemeriksaan WHERE dpemeriksaan.iddpemeriksaan ='$id'";

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    // DATA PEMERIKSAAN
    $name = $row['name'];
    $tanggal = $row['tanggal'];
    $lokasi = $row['lokasi'];
    $nlokasi = $row['nlokasi'];
    $umur = $row['umur'];
    $npo = $row['npo'];
    $nkendaraan = $row['nkendaraan'];
    $ntkendaraan = $row['ntkendaraan'];
    $jtrayek = $row['jtrayek'];
    $trayek = $row['trayek'];

    // UNSUR ADMINISTRASI
    $kuji = $row['kuji'];
    $kpreguler = $row['kpreguler'];
    $kpcadangan = $row['kpcadangan'];
    $spengemudi = $row['spengemudi'];

    // UNSUR TEKNIS UTAMA
    $ldekat = $row['ldekat'];
    $ljauh = $row['ljauh'];
    $ldepan = $row['ldepan'];
    $lbelakang = $row['lbelakang'];
    $lrem = $row['lrem'];
    $lmundur = $row['lmundur'];
    $rutama = $row['rutama'];
    $rparkir = $row['rparkir'];
    $kdepan = $row['kdepan'];
    $kbdepan = $row['kbdepan'];
    $kbbelakang = $row['kbbelakang'];
    $skpengemudi = $row['skpengemudi'];


    // UNSUR TEKNIS PENUNJANG
    $pkecepatan = $row['pkecepatan'];
    $lsdepan = $row['lsdepan'];
    $lsbelakang = $row['lsbelakang'];
    $kspion = $row['kspion'];
    $kwiper = $row['kwiper'];
    $klakson = $row['klakson'];
    $jtduduk = $row['jtduduk'];
    $bcadangan = $row['bcadangan'];
    $spengaman = $row['spengaman'];
    $dongkrak = $row['dongkrak'];
    $proda = $row['proda'];
    $lsenter = $row['lsenter'];
    $pdarurat = $row['pdarurat'];
    $jdarurat = $row['jdarurat'];
    $pkaca = $row['pkaca'];
} else {
    echo "<script>alert('Data tidak ditemukan!')</script>";
}

// UNSUR ADMINISTRASI

if ($kuji == 'Ada, berlaku') {
    $kuji = 1;
}
if ($kpreguler == 'Ada, berlaku') {
    $kpreguler = 1;
}
if ($kpcadangan == 'Ada, berlaku') {
    $kpcadangan = 1;
}
if ($spengemudi == 'A(Umum)') {
    $spengemudi = 1;
} elseif ($spengemudi == 'B(Umum)') {
    $spengemudi = 1;
} elseif ($spengemudi == 'C(Umum)') {
    $spengemudi = 1;
}

// UNSUR TEKNIS UTAMA
if ($ldekat == 'Semua menyala') {
    $ldekat = 1;
}
if ($ljauh == 'Semua menyala') {
    $ljauh = 1;
}
if ($ldepan == 'Semua menyala') {
    $ldepan = 1;
}
if ($lbelakang == 'Semua menyala') {
    $lbelakang = 1;
}
if ($lrem == 'Semua menyala') {
    $lrem = 1;
}
if ($lmundur == 'Semua menyala') {
    $lmundur = 1;
}
if ($rutama == 'Berfungsi') {
    $rutama = 1;
}
if ($rparkir == 'Berfungsi') {
    $rparkir = 1;
}
if ($kdepan == 'Baik') {
    $kdepan = 1;
}
if ($kbdepan == 'Semua Laik') {
    $kbdepan = 1;
}
if ($kbbelakang == 'Semua Laik') {
    $kbbelakang = 1;
}
if ($skpengemudi == 'Ada dan fungsi') {
    $skpengemudi = 1;
}

// UNSUR TEKNIS PENUNJANG
if ($pkecepatan == 'Ada dan fungsi') {
    $pkecepatan = 1;
}
if ($lsdepan == 'Semua menyala') {
    $lsdepan = 1;
}
if ($lsbelakang == 'Semua menyala') {
    $lsbelakang = 1;
}
if ($kspion == 'Ada dan sesuai') {
    $kspion = 1;
}
if ($kwiper == 'Ada') {
    $kwiper = 1;
}
if ($klakson == 'Ada') {
    $klakson = 1;
}
if ($jtduduk == 'Sesuai') {
    $jtduduk = 1;
}
if ($bcadangan == 'Ada dan Laik') {
    $bcadangan = 1;
}
if ($spengaman == 'Ada') {
    $spengaman = 1;
}
if ($dongkrak == 'Ada') {
    $dongkrak = 1;
}
if ($proda == 'Ada') {
    $proda = 1;
}
if ($lsenter == 'Ada') {
    $lsenter = 1;
}
if ($pdarurat == 'Ada') {
    $pdarurat = 1;
}
if ($jdarurat == 'Ada') {
    $jdarurat = 1;
}
if ($pkaca == 'Ada') {
    $pkaca = 1;
}

// Membuat array dengan berbagai tipe data
$data = array($kuji, $kpreguler, $kpcadangan, $spengemudi, $ldekat, $ljauh, $ldepan, $lbelakang, $lrem, $lmundur, $rutama, $rparkir, $kdepan, $kbdepan, $kbbelakang, $skpengemudi, $pkecepatan, $lsdepan, $lsbelakang, $kspion, $kwiper, $klakson, $jtduduk, $bcadangan, $spengaman, $dongkrak, $proda, $lsenter, $pdarurat, $jdarurat, $pkaca);

// Menghitung jumlah data array tipe integer saja
$jumlah_data_sesuai = 0;
foreach ($data as $elemen) {
    if (is_int($elemen)) {
        $jumlah_data_sesuai++;
    }
}

if ($jumlah_data_sesuai > 16) {
    $validate = "LAIK JALAN !";
    $validateT = "Kendaraan di ijinkan untuk beroperasi";
    $jmlh = $jumlah_data_sesuai;
} else {
    $validate = "TIDAK LAIK JALAN !!!";
    $validateT = "Kendaraan tidak di ijinkan untuk beroperasi";
    $jmlh = $jumlah_data_sesuai;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/my.css">

</head>

<body class=" p-3">

    <?php include './navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <?php if ($validate == 'TIDAK LAIK JALAN !!!') { ?>
                    <div class="payment">
                        <div class="payment_headerT">
                            <div class="checkT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                                    <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                </svg>
                            </div>
                        </div>
                        <div class="contenV1">
                            <h1><?php echo $validate; ?></h1>
                            <p><?php echo $validateT; ?></p>
                            <a href="./rampcheck.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                Kembali
                            </a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="payment">
                        <div class="payment_header">
                            <div class="check">
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg>
                            </div>
                        </div>
                        <div class="contenV">
                            <h1><?php echo $validate; ?></h1>
                            <p><?php echo $validateT; ?></p>
                            <a href="./rampcheck.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                Kembali
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>