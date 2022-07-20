<?php

$server = "localhost";
$user = "root";
$pass= "";
$database = "login-session";

$conn = mysqli_connect($server, $user, $pass, $database);
mysqli_select_db ($conn, 'login-session',);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>