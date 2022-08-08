<?php
require_once 'config/dbConfig.php';
if(isset($_POST['register'])){
  header("Location: register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shirts - Clef's Ecommerce</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="dist/aos.css?v<?php echo time()?>">
    <link rel="stylesheet" href="assets/css/main.css?v<?php echo time()?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbarBackground">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Quophi Clef</a>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
               <a class="nav-link" href="shopping_cart.php">Cart</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="phones.php">Phones</a></li>
                  <li><a class="dropdown-item" href="laptops.php">Laptops</a></li>
                  <li><a class="dropdown-item" href="shirts.php">Shirts</a></li>
                  <li><a class="dropdown-item" href="allitems.php">All Items</a></li>
                  
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <li class="nav-item mb-2"></li>
              <form action="index.php" method="POST" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
              </form>
            </ul>
            <form action="laptops.php" method="POST" class="d-flex" role="search">
              <button class="btn btn-outline-light" type="submit" name="register">Register</button>
            </form>
          </div>
        </div>
      </nav>

      <div class="carousel-inner space-above">
          <div class="carousel-item active">
            <img src="assets/images/phone_slider.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="text-uppercase"></strong>Welcome To Our Shirts World</strong></h3>
              <p>we make all collections and brands of shirts available at your doorstep.</p>
            </div>
          </div>
        </div>
        

    <!-- Displaying Phones From Database  Starts Here--->
    <div class="container-fluid d-flex mt-5" id="phones">
      <?php 
          $sql = "SELECT * FROM shirts";
          $query = mysqli_query($conn, $sql);
          if(mysqli_num_rows($query) > 0) {
              while($row = mysqli_fetch_array($query)){
                  ?>
                   <div class="col-6 col-lg-4 col-xl-3 text-center" data-aos="slide-up" data-aos-delay="100" data-aos-duration="1000" id="phoneOverlay">
          <form action="index.php?action=add&id=<?php echo $row['id']?>" method="POST" enctype="multi-part/form-data">
          <p class="" id="status"><?php echo $row['status'];?></p>
              <img class="img-fluid brands" src="upload/<?php echo $row['image'];?>">
              <p class="mt-2"><?php echo substr($row['shirtDescription'], 0, 30)?>...</p>
              <h5><?php echo $row['shirtName'];?></h5>
              <h5 class="text-danger"><strong>&#8373; <?php echo number_format($row['price'], 2);?></strong></h5>
              <input type="hidden" name="hidden_name" value="<?php echo $row['shirtName'];?>">
              <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
              <div class="d-block">
                  <a href="phone_details.php?id=<?php echo $row['id'];?>" class="btn btn-outline-danger mt-2">View
                      Details</a>
              </div>
              </form>
              <br>
              </div>
              
        
              
      <?php
              }
          }
          ?>
          </div>
    <!--Displaying Phones From Database Ends Here -->

      <section class="container-fluid footer mt-5" id="footerBackground">
        <div class="container">
          <div class="row">
          <div class="col-md-3 mt-5">
            <ul class="menu">
              <h5>Pages</h5>
              <li><a href="index.php">Home</a></li>
              <li><a href="shopping_cart.php">Cart</a></li>
              <li><a href="account.php">My Account</a></li>
              <li><a href="contact.php">Contact</a></li>

              <hr class="bg-white">
              <h5>User Section</h5>
              <li><a href="register.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
            </ul>
          </div>
          <div class="col-md-3 mt-5">
            <ul class="menu">
              <h5>Top Categories</h5>
              <li><a href="phones.php">Phones</a></li>
              <li><a href="laptops.php">Laptops</a></li>
              <li><a href="shirts.php">Shirts</a></li>
              <li><a href="allitems.php">Trending</a></li>
            </ul>
          </div>
          <div class="col-md-3 mt-5">
            <ul class="menu">
              <h5 class="">Find Us</h5>
              <li><strong>Borex Technology Inc.</strong></li>
              <li>Kasoa-Bawjiase, Central Region</li>
              <li>Ghana</li>
              <li><strong>(+233) 547 998 061</strong></li>
              <li>quophiclef@gmail.com</li>
            </ul>
          </div>
          <div class="col-md-3 mt-5">
            <ul class="menu">
              <h5 class="">Get The News</h5>
              <li><a href="#">Don't miss any update.</a></li>
              <div class="d-flex">
                <input type="email" class="form-control">
                <button class="btn btn-light" type="button">Subscribe</button>
              </div>
         
              <hr class="bg-white">
              <h5>Get In Touch</h5>
              <div class="d-flex media-handles">
                <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com"><i class="fa fa-youtube"></i></a></li>
                <li><a href="https://www.whatsapp.com"><i class="fa fa-whatsapp"></i></a></li>
              </div>
            </ul>
          </div>
          </div>
        </div>
      </section>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/aos.js"></script>
<script>
AOS.init();
</script>
</body>
</html>