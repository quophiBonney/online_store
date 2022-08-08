<?php 
session_start();
require_once 'config/dbConfig.php';
if(isset($_POST["addtocart"])){
if($_SESSION["shopping-cart"]){
$item_array_id = array_column($_SESSION["shopping-cart"], "item_id");
if(!in_array($_GET["id"], $item_array_id)){
$count = count($_SESSION["shopping-cart"]);
$itemArray = array(
'item_id' => $_GET['id'],
'item_name' => $_POST['hidden_name'],
'item_price' => $_POST['hidden_price'],
'item_quantity' => $_POST['quantity']
);
$_SESSION["shopping-cart"][$count] = $itemArray;
echo '<script>alert("Item added to cart")</script>';
echo '<script>window.location = "shopping_cart.php"</script>';
}else {
echo '<script>alert("Item already added to shopping cart")</script>';
echo '<script>window.location = "shopping_cart.php"</script>';
}
}else {
$itemArray = array(
'item_id' => $_GET['id'],
'item_name' => $_POST['hidden_name'],
'item_price' => $_POST['hidden_price'],
'item_quantity' => $_POST['quantity']
);
$_SESSION["shopping-cart"][0] = $itemArray;
echo '<script>alert("Item added to cart")</script>';
echo '<script>window.location = "shopping_cart.php"</script>';
}
}
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
    <title>Shirt Details - Clef's Ecommerce</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/main.css">
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
            <form action="shirt_details.php" method="POST" class="d-flex" role="search">
              <button class="btn btn-outline-light" type="submit" name="register">Register</button>
            </form>
          </div>
        </div>
      </nav>
    
      <div class="carousel-inner space-above">
          <div class="carousel-item active">
            <img src="assets/images/bannerladies1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="text-uppercase"></strong>Quality Shirts</strong></h3>
              <p>never lose gap in your fashion brand and lifestyle.</p>
            </div>
          </div>
        </div>

      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 card">
          <?php
            $id = $_GET['id']; 
            $sql = "SELECT * FROM shirts WHERE id = '$id'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
              while($row = mysqli_fetch_assoc($query)){
                ?>
                
                <center><img class="img-fluid mt-2" src="upload/<?php echo $row['image'];?>"></center>
                <div class="justify-content-center d-flex mt-5">
                <div class="col-3 col-xl-3">
                <center><img class="img-fluid" src="upload/<?php echo $row['image'];?>">
                </div>
                <div class="col-3 col-xl-3">
                <center><img class="img-fluid" src="upload/<?php echo $row['imageTwo'];?>">
                </div>
                <div class="col-3 col-xl-3">
                <center><img class="img-fluid" src="upload/<?php echo $row['imageThree'];?>">
                </div>
              </div>
                <?php
              }
            }
            ?>
            <br>
          </div>
          <div class="col-md-6 mt-5">
            <?php
            $id = $_GET['id']; 
            $sql = "SELECT * FROM shirts WHERE id = '$id'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
              while($row = mysqli_fetch_assoc($query)){
                ?>
                   <form action="shirt_details.php?action=add&id=<?php echo $row['id']?>" method="POST" enctype="multi-part/form-data">
                <h5><?php echo $row['shirtName']?></h5>
                <p><?php echo $row['shirtDescription'];?></p>
                <h5><strong>Price: &#8373;<?php echo number_format($row['price'], 2);?></strong></h5>
              <p class="text-success mt-2"><?php echo $row['status'];?></p>
              <div class="d-flex">
              <i class="fa fa-minus form-control" id="minus"></i>
              <input type="number" name="quantity" value="1" class="form-control quantityField">
              <i class="fa fa-plus form-control" id="plus"></i>
              </div>
              <div class="form-group">
                <select name="buyingMode" class="form-control mt-3 buyingMode">
                <option value="">Choose an option</option>
                  <option value="online">Online</option>
                  <option value="store">Store Price</option>
                </select>
              </div>
                <button type="submit" name="addtocart" class="btn btn-danger mt-3">Add To Cart</button>
                <?php 
              }
            }
            ?>
            </div>
         </div>
        </div>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h3 class="text-center">Featured Products</h3>
      <p class="text-center">enjoy amazing discounts on our products.</p>
      <hr class="bg-dark">
    </div>
    <!---- *** Featured Products & Items Starts Here *** ---->
    <div class="col-6 col-xl-3 text-center">
        <a href="laptops.php"><img class="img-fluid" src="assets/images/infinix-note-10-644-.jpg" style="width: 200px; height: 200px"></a>
        <!--- Star Rating Starts ---->
        <p class="mt-2"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star"></i></p>
        <!---- Star Rating Ends Here ---->
    </div>
    <div class="col-6 col-xl-3 text-center">
        <a href="phones.php"><img class="img-fluid" src="assets/images/promax.jpg" style="width: 200px; height: 200px"></a>
        <!--- Star Rating Starts ---->
        <p class="mt-2"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i></p>
        <!---- Star Rating Ends Here ---->
    </div>
    <div class="col-6 col-xl-3 text-center">
        <a href="shirts.php"><img class="img-fluid" src="assets/images/f5.jpg" style="width: 200px; height: 200px"></a>
        <!--- Star Rating Starts ---->
        <p class="mt-2"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
        <!---- Star Rating Ends Here ---->
    </div>
    <div class="col-6 col-xl-3 text-center">
        <a href="shirts.php"><img class="img-fluid" src="assets/images/laptop1.jpg" style="width: 200px; height: 200px"></a>
        <!--- Star Rating Starts ---->
        <p class="mt-2"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i></p>
        <!---- Star Rating Ends Here ---->
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
              <li><a href="register.php">Register</a></li>
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