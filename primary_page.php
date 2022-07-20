<?php 
 
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Halaman Utama</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email mt-5">
                <?php
                    echo '<h1>Selamat Datang, ' , $_SESSION['username']; 
                 ?>
            <div class="input-group pt-3">
                <a href="logout.php" class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">Log-Out</a>
            </div>
        </form>
    </div>
</body>
</html>