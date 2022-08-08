<?php 
require_once '../config/dbConfig.php';
$msg = "";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

   if($password == $password && $email == $email){
       $isAdminNameTaken = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
       $result = mysqli_query($conn, $isAdminNameTaken);
    
       if(mysqli_num_rows($result) > 0){
          header("Location: index.php");
       }elseif(empty($password)) {
        $msg = "<div class='alert alert-danger text-center'>Password is required<i class='fa fa-times float-right'></i></div>";
       }elseif(empty($email)){
        $msg = "<div class='alert alert-danger text-center'>Email is required<i class='fa fa-times float-right'></i></div>";   
       }else {
        $msg = "<div class='alert alert-danger text-center'>Something went wrong<i class='fa fa-times float-right'></i></div>";
       }
   }else {
     $msg = "<div class='alert alert-danger text-center'>Invalid email or password<i class='fa fa-times float-right'></div>";
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">

<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/style.css?=<?php echo time();?>" rel="stylesheet">


</head>
<body class="register-section">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 card shadow" id="register-form">
        <h4 class="text-center text-primary mt-2">Login into your account</h4>
            <form action="login.php" method="POST">
            <div class="form-group">
                 <button type="submit" name="login_with_facebook" class="form-control btn fbBtnLogin"><i class="fa fa-facebook mr-5"></i>With <strong>Facebook</strong></button>
             </div>
             <div class="form-group">
                 <button type="submit" name="login_with_gmail" class="form-control btn border linkedinBtnLogin"><i class="fa fa-linkedin mr-5"></i>With <strong>Linkedin</strong></button>
             </div>
             <div class="form-group">
                 <button type="submit" name="login_with_gmail" class="form-control btn btn-primary googleBtnLogin"><i class="fa fa-google-plus mr-5"></i>With <strong>Google</strong></button>
             </div>
            </form>
             <p class="text-center or-text">Or With Email</p>
            <form action="login.php" method="POST">
                <?php echo $msg; ?>
               <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control">
               </div>
               <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
               </div>
               <div class="form-group">
                <input type="checkbox" name="remember-me">&nbsp;Remember me?
               </div>
               <div class="form-group">
                <button type="submit" name="login" class="form-control btnLogin btn btn-primary">Login</button>
               </div>
                   <a class="float-left text-dark" href="register.php">Not yet a member?</a>
                   <a class="float-right text-danger" href="forgotpassword.php">Forgot password?</a>
               </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>