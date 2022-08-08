<?php 
session_start();
require_once '../config/dbConfig.php';
$id = $_GET['del_id'];
$sql = "DELETE FROM users WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
if($query){
    echo '<script>alert("User deleted successfully")</script>';
    echo '<script>window.location = "users.php"</script>';
}else {
    echo '<script>alert("User failed to be deleted")</script>';
    echo '<script>window.location = "users.php"</script>';
}
?>