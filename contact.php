<?php
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
    <title>Contact - Clef's Ecommerce</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbarBackground">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Mimi Clef</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <form action="index.php" method="POST" class="d-flex" role="search">
              <button class="btn btn-outline-light" type="submit">Register</button>
            </form>
          </div>
        </div>
      </nav>
    
      <div class="carousel-inner space-above">
          <div class="carousel-item active">
            <img src="assets/images/phone_slider.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="text-uppercase"></strong>Amazing Discounts</strong></h3>
              <p>Get outstanding discounts and affordable pricing on our phones.</p>
            </div>
          </div>
        </div>
    <!-----**** Mini Testimonial Starts Here *****---->
      <section class="container-fluid mt-5 mini-testimonial">
        <div class="container testimonial-box">
          <div class="row">
            <div class="col-6 col-xl-3 shadow">
              <center><i class="fa fa-heart"></i></center>
              <h5 class="text-center mt-3"><strong>Fast Delivery</strong></h5>
              <p class="text-center">Experience the best and fastest delivery system like no other.
              </p>
            </div>
            <div class="col-6 col-xl-3 shadow">
            <center><i class="fa fa-heart"></i></center>
              <h5 class="text-center mt-3"><strong>Easy Ordering</strong></h5>
              <p class="text-center">Follow simple and clear steps to place your order.
              </p>
            </div>
            <div class="col-6 col-xl-3 shadow">
            <center><i class="fa fa-heart"></i></center>
              <h5 class="text-center mt-3"><strong>Whooping Discounts</strong></h5>
              <p class="text-center">Get unimaginable discounts on any of our products anytime.
              </p>
            </div>
            <div class="col-6 col-xl-3 shadow">
            <center><i class="fa fa-heart"></i></center>
              <h5 class="text-center mt-3"><strong>Good Customer Care</strong></h5>
              <p class="text-center">Treating customers with humility and love is our hallmark.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!----*** Mini Testimonial Ends Here ***---->
<div class="container-fluid mt-5">
  <div class="container">
  <div class="row">
  <div class="col-md-6">
      <h3 class="mt-2">Get In Touch</h3>
      <form action="" method="">
        <div class="form-group">
          <input type="text" name="fullName" placeholder="Full Name" required="" class="form-control">
        </div>
        <div class="form-group mt-4">
          <input type="email" name="email" placeholder="Email" required="" class="form-control">
        </div>
        <div class="form-group mt-4">
          <input type="email" name="body" placeholder="Body" required="" class="form-control">
        </div>
        <div class="form-group mt-4">
          <textarea name="message" required="" class="form-control mt-3" placeholder="Write your message here!"></textarea>
        </div>
        <div class="form-group mt-4">
          <button class="btn btn-primary mt-3" type="submit">Send Message</button>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <center><img class="img-fluid" src="assets/images/final_reply.jpg" alt="message-svg"></center>
      <ul class="menu">
      <li><p class="text-center"><i class="fa fa-phone text-primary"></i> &nbsp; Kasoa - Bawjiase</p></li>
      <li><p class="text-center"><i class="fa fa-phone text-primary"></i> &nbsp; +233 547 998 061</p></li>
      <li><p class="text-center"><i class="fa fa-phone text-primary"></i> &nbsp; quophiclef@gmail.com</p></li>
      </ul>
    </div>
  </div>
  </div>
</div>


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
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
  const miniTestimonial = document.querySelector(".mini-testimonial");
  window.addEventListener("load", () => {
    setTimeout(() => {
      miniTestimonial.classList.add("active");
    }, 500)
  })
</script>
</body>
</html>