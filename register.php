<?php 
session_start();
require_once 'config/dbConfig.php';
if(!empty($_SESSION['id'])) {
    header("Location: index.php");
}
$msg = "";
if(isset($_POST['register'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    if(empty($email)){
        $msg =  "<div class='alert alert-danger text-center'>Email is required</div>";
     }elseif(empty($password)){
        $msg =  "<div class='alert alert-danger text-center'>Password is required <i class='fa fa-times'></i></div>";
     }elseif($password == $confirmPassword && $email == $email){
        $isEmailtaken = "SELECT * FROM members WHERE email = '$email'";
        $result = mysqli_query($conn, $isEmailtaken);

       if(mysqli_num_rows($result) > 0){
        $msg = "<div class='alert alert-danger'>Email already exist</div>";
       }else {
        $sql = "INSERT INTO members(email, password, city, gender)VALUES('$email', '$password', '$city', '$gender')";
        $query = mysqli_query($conn, $sql);
        if($query){
            echo '<script>alert("Signup Successful")</script>';
            echo '<script>window.location.href = "login.php"</script>';
            exit();
        }else {
            $msg = "<div class='text-center alert alert-danger'>Something went wrong!<i class='fa fa-times'></div>";
        }
        
      
       }
    }else {
        $msg = "<div class='alert alert-danger text-center'>Password do not match <i class='fa fa-times ml-auto'></i></div>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Clef's Ecommerce</title>
    <link rel="shortcut icon" href="assets/images/faviconhome.png?=<?php echo time();?>">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/quophi.css">
</head>
<body style="background-image: url('assets/images/first.jpg')">
<section class="container mt-5 signup-container">
    <div class="row justify-content-center">
        <div class="col-md-6 signup-form">
            <center><i class="fa fa-user mt-2"></i></center>
            <h3 class="text-center mt-3">Sign Up</h3>
            <p class="text-center">become a trusted customer and win amazing gifts.</p>
            <hr>
            <?php echo $msg?>
            <form class="form" action="register.php" method="POST">
            <div class="form-group mt-3">
                <input type="email" name="email" placeholder="Email"  class="form-control"> 
            </div>
            <div class="form-group mt-3">
                <input type="password" name="password" placeholder="Password" class="form-control"> 
            </div>
            <div class="form-group mt-3">
                <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control"> 
            </div>
            <div class="d-flex select-option mt-3">
                <div class="form-group">
                    <select name="city" class="form-control">
                       <option value="">----- Choose City -----</option>
                       <option value="Accra">Accra</option>
                       <option value="Bawjiase">Bawjiase</option>
                       <option value="Ho">Ho</option>
                       <option value="Kasoa">Kasoa</option>
                       <option value="Koforidua">Koforidua</option>
                       <option value="Kumasi">Kumasi</option>
                       <option value="Tamale">Tamale</option>
                       <option value="Tarkoradi">Takoradi</option>
                       <option value="Techiman">Techiman</option>
                       <option value="Tema">Tema</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="gender" class="form-control">
                       <option value="">---- Gender ----</option>
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="checkbox" name="remember-me"> Remember me? 
            </div>
            <div class="form-group mt-2">
                <button class="btn btn-danger d-block" type="submit" name="register">Register</button>
            </div>
            
        </form>
        <br>
        <p class="text-center"><a href="login.php" class="text-decoration-none btn btn-outline-danger font-weight-bold">Already a member?Login</strong></a></p>
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
