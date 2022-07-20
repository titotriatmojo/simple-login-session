<?php 

session_start();
include 'config.php';
error_reporting(0);
 

 
if (isset($_SESSION['username'])) {
    header("Location: primary_page.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = ($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: primary_page.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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
    <title>Simple login Session</title>
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
                  <div class="input-group form-group">
                    <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                  </div>
                  <div class="input-group form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                  </div>
                  <div class="input-group mt-3">
                    <button name="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Sign-In</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light">Belum Punya Akun? <a href="register.php" class="text-primary">Buat Akun</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
 
    
</body>
</html>