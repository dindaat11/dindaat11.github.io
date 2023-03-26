<?php
error_reporting(0);
session_start();

$host = "http://localhost/_Rampcheck/";

$DBhost = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "db_rcheck";

$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// if (empty($_SESSION['username']) || $_SESSION['username'] == '') {
//     header("Location:$host");
//     die();
// }
