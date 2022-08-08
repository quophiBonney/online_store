<?php 
session_start();
if(!empty($_SESSION['id'])) {
  header("Location: index.php");
}
require_once 'config/dbConfig.php';
$msg= "";
if(isset($_POST["login"])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM members WHERE email = '$email' AND password = '$password'");
    $row = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query) > 0){
        if($password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }else {
            $msg = "<div class='alert alert-danger text-center'>Something went wrong<i class='fa fa-times float-right'></i></div>";
        }
    }else {
        $msg = "<div class='alert alert-danger text-center'>Wrong password<i class='fa fa-times float-right'></i></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Clef's Ecommerce</title>
    <link rel="shortcut icon" href="assets/images/faviconhome.png?=<?php echo time();?>">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/quophi.css?v=<?php echo time()?>">
</head>
<body style="background-image: url('assets/images/first.jpg')">
<section class="container mt-5 signup-container">
    <div class="row justify-content-center">
        <div class="col-md-5 signup-form">
            <h3 class="text-center mt-3">Login Into Your Account</h3>
            <p class="text-center">you are warmly welcome back cherish customer</p>
            <form class="form" action="" method="POST">
                <div class="form-group">
                    <a href="https://www.gmail.com" class="btn btn-danger form-control redirectBtn"><i class="fa fa-google mt-2"></i>&nbsp;Login With Google</a>
                </div>
                <div class="form-group mt-2">
                    <a href="https://www.facebook.com" class="btn btn-primary form-control redirectBtn"><i class="fa fa-facebook mt-2"></i>&nbsp;Login With Facebook</a>
                </div>
                <div class="form-group mt">
                    <h5 class="text-center or-text"><span class="line">-</span> OR <span class="line">-</span></h5>
                </div>
                <?php echo $msg ?>
            <div class="form-group mt-3">
                <input type="email" name="email" placeholder="Email" required="" class="form-control"> 
            </div>
            <div class="form-group mt-3">
                <input type="password" name="password" placeholder="Password" required="" class="form-control"> 
            </div>
            
                <a href="forgot.php" class="text-decoration-none text-danger"><strong>forgot password?</strong></a> 
            
            <div class="form-group mt-2">
                <button class="btn btn-primary d-block" type="submit" name="login">Login</button>
            </div>
            
        </form>
        <br>
        <p class="text-center"><a href="register.php" class="text-decoration-none btn btn-outline-danger font-weight-bold">Not yet a member? Register</strong></a></p>
        </div>
    </div>
</section>
<script>
    let signupContainer = document.querySelector(".signup-container");
    window.addEventListener("load", () => {
        setTimeout(() => {
            signupContainer.classList.add("active");
        }, 500);
    });
</script>

</body>
</html>
