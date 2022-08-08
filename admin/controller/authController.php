<!-- ****** Backend For Add New Laptop ****** -->
<?php 
$msg = "";
if(isset($_POST['addLaptop'])){
    $laptopName = $_POST['laptopName'];
    $image = $_FILES['image'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $folder = "../upload/". $filename;
    $imageTwo = $_FILES['imageTwo'];
    $tmp_nameTwo = $_FILES['imageTwo']['tmp_name'];
    $filenameTwo = $_FILES['imageTwo']['name'];
    $folderTwo = "../upload/". $filenameTwo;
    $imageThree = $_FILES['imageThree'];
    $tmp_nameThree = $_FILES['imageThree']['tmp_name'];
    $filenameThree = $_FILES['imageThree']['name'];
    $folderThree = "../upload/". $filenameThree;
    $laptopDescription = $_POST['laptopDescription'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    if($laptopName == $laptopName && $price == $price){
        $isLaptopTaken = "SELECT * FROM laptops WHERE price = '$price'";
        $result = mysqli_query($conn, $isLaptopTaken);
        if(mysqli_num_rows($result) > 0) {
            $msg = "<div class='alert alert-danger'>Laptop already exist in table</div>";
        }else {
            $sql = "INSERT INTO laptops(laptopName, image, imageTwo, imageThree, laptopDescription, price, status)VALUES('$laptopName', '$filename', '$filenameTwo', '$filenameThree', '$laptopDescription', '$price', '$status')";
            $query = mysqli_query($conn, $sql);

            if($query && move_uploaded_file($tmp_name, $folder) && move_uploaded_file($tmp_nameTwo, $folderTwo) && move_uploaded_file($tmp_nameThree, $folderThree)){
            echo '<script>alert("Laptop added successfully")</script>';
            echo '<script>window.location = "insert-laptop.php"</script>';
            exit(0);
            }else {
                $msg = "<div class='alert alert-danger'>Something went wrong! Try again please</div>";
            }
        }
    }else {
        $msg = "<div class='alert alert-danger'>Table do not accept duplicate record</div>";
    }
}
?>
<!-- ****** Backend For Add New Phone ****** -->
<?php 
$msg = "";
if(isset($_POST['addPhone'])){
    $phoneName = $_POST['phoneName'];
    $image = $_FILES['image'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $folder = "../upload/". $filename;
    $imageTwo = $_FILES['imageTwo'];
    $tmp_nameTwo = $_FILES['imageTwo']['tmp_name'];
    $filenameTwo = $_FILES['imageTwo']['name'];
    $folderTwo = "../upload/". $filenameTwo;
    $imageThree = $_FILES['imageThree'];
    $tmp_nameThree = $_FILES['imageThree']['tmp_name'];
    $filenameThree = $_FILES['imageThree']['name'];
    $folderThree = "../upload/". $filenameThree;
    $phoneDescription = $_POST['phoneDescription'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    if($phoneName == $phoneName && $price == $price){
        $isPhoneTaken = "SELECT * FROM phones WHERE price = '$price'";
        $result = mysqli_query($conn, $isPhoneTaken);
        if(mysqli_num_rows($result) > 0) {
            $msg = "<div class='alert alert-danger'>Phone already exist in table</div>";
        }else {
            $sql = "INSERT INTO phones(phoneName, image, imageTwo, imageThree, phoneDescription, price, status)VALUES('$phoneName', '$filename', '$filenameTwo', '$filenameThree', '$phoneDescription', '$price', '$status')";
            $query = mysqli_query($conn, $sql);

            if($query && move_uploaded_file($tmp_name, $folder) && move_uploaded_file($tmp_nameTwo, $folderTwo) && move_uploaded_file($tmp_nameThree, $folderThree)){
            echo '<script>alert("Phone added successfully")</script>';
            echo '<script>window.location = "insert-phone.php"</script>';
            exit(0);
            }else {
                $msg = "<div class='alert alert-danger'>Something went wrong! Try again please</div>";
            }
        }
    }else {
        $msg = "<div class='alert alert-danger'>Table do not accept duplicate record</div>";
    }
}
?>
<!-- ****** Backend For Adding New Shirt ****** -->
<?php 
$msg = "";
if(isset($_POST['addCategory'])){
    $categoryName = $_POST['categoryName'];
    $image = $_FILES['image'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $folder = "../upload/". $filename;
    $imageTwo = $_FILES['imageTwo'];
    $tmp_nameTwo = $_FILES['imageTwo']['tmp_name'];
    $filenameTwo = $_FILES['imageTwo']['name'];
    $folderTwo = "../upload/". $filenameTwo;
    $imageThree = $_FILES['imageThree'];
    $tmp_nameThree = $_FILES['imageThree']['tmp_name'];
    $filenameThree = $_FILES['imageThree']['name'];
    $folderThree = "../upload/". $filenameThree;
    $categoryDescription = $_POST['categoryDescription'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    if($categoryName == $categoryName && $price == $price){
        $isCategoryTaken = "SELECT * FROM allcategories WHERE price = '$price'";
        $result = mysqli_query($conn, $isCategoryTaken);
        if(mysqli_num_rows($result) > 0) {
            $msg = "<div class='alert alert-danger'>Shirt already exist in table</div>";
        }else {
            $sql = "INSERT INTO shirts(catgoryName, image, imageTwo, imageThree, categoryDescription, price, discount)VALUES('$categoryName', '$filename', '$filenameTwo', '$filenameThree', '$categoryDescription', '$price', '$discount')";
            $query = mysqli_query($conn, $sql);

            if($query && move_uploaded_file($tmp_name, $folder) && move_uploaded_file($tmp_nameTwo, $folderTwo) && move_uploaded_file($tmp_nameThree, $folderThree)){
            echo '<script>alert("Product added successfully")</script>';
            echo '<script>window.location = "all-categories.php"</script>';
            exit(0);
            }else {
                $msg = "<div class='alert alert-danger'>Something went wrong! Try again please</div>";
            }
        }
    }else {
        $msg = "<div class='alert alert-danger'>Table do not accept duplicate record</div>";
    }
}
?>
<!-- ****** Backend For Adding New Shirt ****** -->
<?php 
$msg = "";
if(isset($_POST['addShirt'])){
    $shirtName = $_POST['shirtName'];
    $image = $_FILES['image'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $folder = "../upload/". $filename;
    $imageTwo = $_FILES['imageTwo'];
    $tmp_nameTwo = $_FILES['imageTwo']['tmp_name'];
    $filenameTwo = $_FILES['imageTwo']['name'];
    $folderTwo = "../upload/". $filenameTwo;
    $imageThree = $_FILES['imageThree'];
    $tmp_nameThree = $_FILES['imageThree']['tmp_name'];
    $filenameThree = $_FILES['imageThree']['name'];
    $folderThree = "../upload/". $filenameThree;
    $shirtDescription = $_POST['shirtDescription'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    if($shirtName == $shirtName && $price == $price){
        $isShirtTaken = "SELECT * FROM shirts WHERE price = '$price'";
        $result = mysqli_query($conn, $isShirtTaken);
        if(mysqli_num_rows($result) > 0) {
            $msg = "<div class='alert alert-danger'>Shirt already exist in table</div>";
        }else {
            $sql = "INSERT INTO shirts(shirtName, image, imageTwo, imageThree, shirtDescription, price, status)VALUES('$shirtName', '$filename', '$filenameTwo', '$filenameThree', '$shirtDescription','$price', '$status')";
            $query = mysqli_query($conn, $sql);

            if($query && move_uploaded_file($tmp_name, $folder) && move_uploaded_file($tmp_nameTwo, $folderTwo) && move_uploaded_file($tmp_nameThree, $folderThree)){
            echo '<script>alert("Shirt added successfully")</script>';
            echo '<script>window.location = "insert-shirt.php"</script>';
            exit(0);
            }else {
                $msg = "<div class='alert alert-danger'>Something went wrong! Try again please</div>";
            }
        }
    }else {
        $msg = "<div class='alert alert-danger'>Table do not accept duplicate record</div>";
    }
}
?>