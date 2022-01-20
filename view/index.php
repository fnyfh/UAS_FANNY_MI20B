<?php

include '../controller/Auth.php';
error_reporting(0);
$ctrl = new Auth();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <div class="kotak">
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "salah"){
                echo "<p>Captcha tidak sesuai.</p>";
                }
            }
        ?>
    </div>
    
    <section class="login-dark" style="background: url(&quot;assets/img/blue-galaxy-23.jpg&quot;);">
        <form method="post" action="<?php echo $ctrl->login();?>">
            <?php
            if ($_GET["pesan"] == 'success' && $_GET["frm"] == 'logout') {
            ?>
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda Berhasil Logout.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php
            } else if ($_GET["pesan"] == 'failed' && $_GET["frm"] == 'captcha') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Captcha Salah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            } else if ($_GET["pesan"] == 'failed' && $_GET["frm"] == 'login') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Username dan password salah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="user" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="pass" placeholder="Password"></div>
            <div class="form-group">           
            <td><img src="captcha.php" alt="gambar" /> </td>
            </div>  
            <div class="form-group">  
            <td><input placeholder="isikan captcha" name="code" value="" /></td>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" name="login" type="submit">Log In</button></div>
            <a class="forgot" href="#">Forgot your email or password?</a>
        </form>
    </section>
            

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

