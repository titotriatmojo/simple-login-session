<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username ,fullname , email, password)
                    VALUES ('$username', '$fullname', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $fullname = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script> 
    <title>Register</title>
</head>
<body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <span class="iconify" data-icon="emojione:waving-hand" data-width="64" data-height="64"></span>
                </div>
                <h4>Halo! Selamat Datang</h4>
                <h6 class="font-weight-light">Sign-in untuk melanjutkan.</h6>
                <form class="pt-3" action="" method="POST" class="login-email">
                  <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
                <div class="input-group form-group">
                <input type="text" class="form-control form-control-lg"  placeholder="Nama" name="fullname" value="<?php echo $fullname; ?>" required>
                </div>
                <div class="input-group form-group">
                <input type="text" class="form-control form-control-lg"  placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="input-group form-group">
                <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group form-group">
                <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-group form-group">
                <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <div class="input-group form-group">
                <button name="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                </div>
                <div class="text-center mt-4 font-weight-light">Belum Punya Akun? <a href="index.php" class="text-primary">Sign-In</a>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
</body>
</html>