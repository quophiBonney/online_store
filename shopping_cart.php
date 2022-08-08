<?php 
session_start();
require_once 'config/dbConfig.php';

if(isset($_GET['action'])){
    if($_GET['action'] == "delete"){
        foreach($_SESSION["shopping-cart"] as $keys => $values){
            if($values["item_id"]){
                unset($_SESSION["shopping-cart"][$keys]);
                echo '<script>alert("All items removed from shopping cart")</script>';
                echo '<script>window.location = "shopping-cart.php"</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Clef's Ecommerce</title>

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
    
      <div id="carouselExampleCaptions">
        <div class="">
          <div class="">
            <img src="assets/images/phone.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid mt-5">
      <div class="table-responsive">
      <table class="table">
          <h4 class="text-center">Shopping Cart Details</h4>
       <tr>
           <th>Item Name</th>
           <th>Quantity</th>
           <th>Price</th>
           <th>Total</th>
           <th class="text-danger">Action</th>
       </tr>
       <?php 
        if(!empty($_SESSION["shopping-cart"])){
            $total = 0;
            foreach($_SESSION["shopping-cart"] as $key => $values){
             ?>
             <tr>
                 <td><?php echo $values['item_name'];?></td>
                 <td><?php echo $values['item_quantity'];?></td>
                 <td><?php echo $values['item_price'];?></td>
                 <td>&#8373;<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                 <td>
                     <div class="d-flex">
                         <button class="form-control w-50 text-danger" onclick="removeData(<?php echo $values['item_id']?>)"><i
                        class="fa fa-trash text-danger"></i>Remove</button>
                        <button class="btnRemove form-control w-50"  onclick="removeItem(<?php echo $values['item_id'];?>)">Buy Item</button>
                        </div>
                <script>
                function removeData(id) {
                    if (confirm("Are you sure you want to remove item from shopping cart?")) {
                        window.location.href = 'delete.php?action=delete&id=<?php echo $values['item_id'];?>';
                    }
                }
                </script>
            </td>
            
             </tr>
             <?php $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
             ?>
             <tr>
                 <td align="right" colspan="3">Total</td> 
                 <td><?php echo number_format($total, 2)?><button class="form-control">Procceed to Buy</button></td>
                 <td><button class="btnRemove btn btn-danger form-control w-50"  onclick="removeItem(<?php echo $values['item_id'];?>)">Remove All</button></td>
                <script>
                function removeItem(id) {
                    if (confirm("Are you sure you want to remove all items from shopping cart?")) {
                        window.location.href = 'remove.php?action=delete&id=<?php echo $values['item_id'];?>';
                    }
                }
                </script>
             </tr>
                <?php
            }
       ?>
      </table>
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
</body>
</html>