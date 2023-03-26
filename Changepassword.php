<?php
session_start();
include "../koneksi.php";
$page = 'cpass';
if (empty($_SESSION['username']) || $_SESSION['username'] == '') {
    header("Location: $host");
    die();
}
if (isset($_POST['submit'])) {
    $id_user = $_SESSION['idusers'];
    $passl = md5($_POST['passl']);
    $passb = md5($_POST['passb']);

    $sql = "SELECT * FROM users WHERE password='$passl'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {

        $query = "UPDATE users set password='$passb' where idusers='$id_user' ";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            header("location: ../logout.php");
        } else {
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='../home.php'>Kembali Ke Form</a>";
        }
    } else {
        echo "<script> 
    alert('Password tidak sesuai'); 
		</script>";
    }
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

    <link href="../form-style/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../form-style/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="../form-style/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../form-style/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="../form-style/css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/my.css">

</head>

<body class=" p-3">
    <?php include './navbar.php'; ?>

    <div class=" bg-white">
        <!-- <div class="wrapper wrapper--w680 p-2"> -->
        <div>
            <div class="card card-1">
                <div class="card-body">
                    <h3 class="title">UBAH PASSWORD</h3>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="PASSWORD LAMA" name="passl" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="PASSWORD BARU" name="passb" required>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div style=" margin-left:20px;">
                                Halaman akan langsung logout ketika ubah password berhasil dilakukan!!!
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button name="submit" class="btn btn--radius btn--green" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                </svg>
                                KIRIM
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="../form-style/vendor/jquery/jquery.min.js"></script>
    <script src="../form-style/vendor/select2/select2.min.js"></script>
    <script src="../form-style/vendor/datepicker/moment.min.js"></script>
    <script src="../form-style/vendor/datepicker/daterangepicker.js"></script>
    <script src="../form-style/js/global.js"></script>
</body>

</html>