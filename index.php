<?php 
require 'config/dbConfig.php';
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
    <title>Home - Clef's Ecommerce</title>
    <link rel="shortcut icon" href="assets/images/faviconhome.png?=<?php echo time();?>">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="dist/aos.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="assets/css/main.css?v=<?php echo time();?>">
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
            <form action="index.php" method="POST">
              <button class="btn btn-outline-light" type="submit" name="register">Register</button>
            </form>
          </div>
        </div>
      </nav>
    
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner space-above">
          <div class="carousel-item active">
            <img src="assets/images/phone_slider.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="text-uppercase"></strong>Amazing Discounts</strong></h3>
              <p>Get outstanding discounts and affordable pricing on our products.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/kick_slider.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="text-uppercase"><strong>Looking For Sneaker?</strong></h2>
              <p>Quophi's Inc brings you nothing but the best sneakers to suit your brand.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/ladies.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class=""><strong></strong></h3>
              <p class=""></p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  
    <!-- Displaying Phones From Database  Starts Here--->
    <div class="container-fluid d-flex flex-row mt-5" id="phones">
    <?php 
        $sql = "SELECT * FROM phones LIMIT 4";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_array($query)){
                ?>
                 <div class="col-6 col-lg-4 col-xl-3 d-block text-center" data-aos="slide-up" data-aos-delay="100" data-aos-duration="1000" id="phoneOverlay">
        <form action="index.php?action=add&id=<?php echo $row['id']?>" method="POST" enctype="multi-part/form-data">
        <p class="" id="status"><?php echo $row['status'];?></p>
            <img class="img-fluid brands" src="upload/<?php echo $row['image'];?>">
            <p class="mt-2"><?php echo substr($row['phoneDescription'], 0, 30)?>...</p>
            <h5><?php echo $row['phoneName'];?></h5>
            <h5 class="text-danger"><strong>&#8373; <?php echo number_format($row['price'], 2);?></strong></h5>
            <input type="hidden" name="hidden_name" value="<?php echo $row['phoneName'];?>">
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

         <!-- Displaying Laptops From Database  Starts Here--->
         <div class="container-fluid d-flex flex-row mt-5" id="phones">
    <?php 
        $sql = "SELECT * FROM shirts LIMIT 4";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_array($query)){
                ?>
                 <div class="col-6 col-lg-4 col-xl-3 d-block text-center" data-aos="fade-in" data-aos-delay="100" data-aos-duration="1000" id="phoneOverlay">
        <form action="index.php?action=add&id=<?php echo $row['id']?>" method="POST" enctype="multi-part/form-data">
        <p class="" id="status"><?php echo $row['status'];?></p>
            <img class="img-fluid brands" src="upload/<?php echo $row['image'];?>">
            <p class="mt-2"><?php echo substr($row['shirtDescription'], 0, 30)?>...</p>
            <h5><?php echo $row['shirtName'];?></h5>
            <h5 class="text-danger"><strong>&#8373; <?php echo number_format($row['price'], 2);?></strong></h5>
            <input type="hidden" name="hidden_name" value="<?php echo $row['shirtName'];?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
            <div class="d-block">
                <a href="shirt_details.php?id=<?php echo $row['id'];?>" class="btn btn-outline-danger mt-2">View
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

          <!-- Displaying All Items From Database  Starts Here--->

   <!-- Displaying Laptops From Database  Starts Here--->
   <div class="container-fluid d-flex flex-row mt-5" id="phones">
    <?php 
        $sql = "SELECT * FROM laptops LIMIT 4";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_array($query)){
                ?>
                 <div class="col-6 col-lg-4 col-xl-3 d-block text-center" data-aos="slide-up" data-aos-delay="200" data-aos-duration="3000" id="phoneOverlay">
        <form action="index.php?action=add&id=<?php echo $row['id']?>" method="POST" enctype="multi-part/form-data">
        <p class="" id="status"><?php echo $row['status'];?></p>
            <img class="img-fluid brands" src="upload/<?php echo $row['image'];?>">
            <p class="mt-2"><?php echo substr($row['laptopDescription'], 0, 30)?>...</p>
            <h5><?php echo $row['laptopName'];?></h5>
            <h5 class="text-danger"><strong>&#8373; <?php echo number_format($row['price'], 2);?></strong></h5>
            <input type="hidden" name="hidden_name" value="<?php echo $row['laptopName'];?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
            <div class="d-block">
                <a href="laptop_details.php?id=<?php echo $row['id'];?>" class="btn btn-outline-danger mt-2">View
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


  
    <div class="container-fluid d-flex flex-row mt-5" id="phones">
    <?php 
        $sql = "SELECT * FROM allcategories LIMIT 4";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_array($query)){
                ?>
                 <div class="col-6 col-xl-3 d-block text-center" data-aos="slide-up" data-aos-delay="200" data-aos-duration="2000" id="phoneOverlay">
                 <h3 class="text-center">Featured Products</h3>
      <p class="text-center">enjoy unimaginable discounts on our products</p>
        <form action="index.php?action=add&id=<?php echo $row['id']?>" method="POST" enctype="multi-part/form-data">
        <p class="" id="status"><?php echo $row['status'];?></p>
            <img class="img-fluid brands" src="upload/<?php echo $row['image'];?>">
            <p class="mt-2"><?php echo substr($row['categoryDescription'], 0, 30)?>...</p>
            <h5><?php echo $row['categoryName'];?></h5>
            <h5 class="text-danger"><strong>&#8373; <?php echo number_format($row['price'], 2);?></strong></h5>
            <input type="hidden" name="hidden_name" value="<?php echo $row['categoryName'];?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
            <div class="d-block">
                <a href="allcategories_details.php?id=<?php echo $row['id'];?>" class="btn btn-outline-danger mt-2">View
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
  <!--Displaying All Items From Database Ends Here -->


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
              <li><a href="register.html">Register</a></li>
              <li><a href="login.html">Login</a></li>
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
<!---Additional Files ---->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/aos.js"></script>
<script>
AOS.init({
});
</script>
</script>
</body>
</html>