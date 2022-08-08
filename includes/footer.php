<!--Footer Section Starts Here --->
<footer class="container-fluid footer bg-dark mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="text-white mt-3">Pages</h5>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="phones.php">Phones</a></li>
                    <li><a href="laptops.php">Laptops</a></li>
                    <li><a href="shopping-cart.php">Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-white mt-3">Top Categories</h5>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="phones.php">Phones</a></li>
                    <li><a href="laptops.php">Laptops</a></li>
                    <li><a href="shopping-cart.php">Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-white mt-3">Find Us</h5>
                <ul class="menu">
                    <li class="text-light">Clef's Zone Inc.</li>
                    <li class="text-light">Kasoa - Bawjiase</li>
                    <li class="text-light">Central Region, Ghana</li>
                    <li class="text-light">+233 547 998 061</li>
                    <li class="text-light">quophiclef@gmail.com</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-white mt-3">Get The News</h5>
                 <p class="text-light">Don't miss any of our news on our products</p>
                     <div class="form-group">
                     <div class="d-flex">
                         <input type="text" name="email" required="" placeholder="Email" class="form-control">
                         <button type="submit" class="form-control btn btn-light border" name="subscribe">Subscribe</button>
                     </div>
                 </div>
                 <h5 class="text-white mt-3">Get In Touch</h5>
                 <ul class="menu">
                 <li><i class="fa fa-facebook"></i></li>
                 <li><i class="fa fa-instagram"></i></li>
                 <li><i class="fa fa-twitter"></i></li> 
                </ul>
            </div>
        </div>
    </div>
</footer>
<!---- Footer Section Ends Here ----> 

   <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

</body>
</html>