<?php
session_start();
require_once '../config/dbConfig.php';
error_reporting(0);
    $id = $_GET['del_id'];
    $sql = "DELETE FROM allcategories WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
    echo '<script>alert("Item deleted successfully")</script>';
    echo '<script>window.location = "all-categories.php"</script>';
    }else {
        echo '<script>alert("Failed to delete item")</script>';
        echo '<script>window.location = "all-categories.php"</script>';
    }


?>