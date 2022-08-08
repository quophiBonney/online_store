<?php 
session_start();
require_once '../config/dbConfig.php';
$msg = "";
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $image = $_FILES['image'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $folder = "img_upload/". $filename;
    print_r($image);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if(empty($username)){
        $msg  = "<div class='alert alert-danger text-center'>Username is required<i class='fa fa-times float-right'></i></div>";
    }elseif(empty($email)){
        $msg = "<div class='alert alert-danger text-center'>Email is required<i class='fa fa-times float-right'></i></div>";
    }elseif(empty($password)){
        $msg = "<div class='alert alert-danger text-center'>Password field can't be empty<i class='fa fa-times float-right'></i></div>";
    }elseif(empty($cpassword)){
        $msg = "<div class='alert alert-danger text-center'>Confirm password need to be filled<i class='fa fa-times float-right'></i></div>";
    }else if(empty($image)){
        $msg = "<div class='alert alert-danger text-center'>Please choose your profile picture</div>";
    }elseif($password == $cpassword && $username == $username){
        $isAdminnameTaken = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($conn, $isAdminnameTaken);
        if(mysqli_num_rows($result) > 0){
                $msg = "<div class='alert alert-danger text-center'>Username already exist!<i class='fa fa-times float-right'></i></div>";
        }else {
            $sql = "INSERT INTO admin(username, email, image, password)VALUES('$username', '$email', '$filename', '$password')";
            $query = mysqli_query($conn, $sql);
            if($query && move_uploaded_file($tmp_name, $folder)){
                echo '<script>alert("Signup successful")</script>';
                echo '<script>window.location = "login.php"</script>';
            }else {
                $msg = "<div class='alert alert-danger text-center'>Something went wrong! Try again</div>";
            }
        }
    }else {
        $msg = "<div class='alert alert-danger text-center'>Password do not match<i class='fa fa-times float-right'></i></div>";
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

    <title>Admin - Register</title>

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
                <form action="register.php" method="POST" enctype="multipart/form-data">
                    <h4 class="text-center text-primary mt-2">Admin Signup</h4>
                    <p class="text-center text-primary">kindly fill the form below to finish signing up as an admin</p>
                    <?php echo $msg;?>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" placeholder="Choose your image" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="register"
                            class="form-control btnRegister btn btn-primary">Register</button>
                    </div>

                    <a class="float-right text-danger" href="login.php">Already a member?</a>

                </form>
            </div>
        </div>
    </div>
    </div>


</body>

</html>