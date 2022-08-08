<?php
require_once '../config/dbConfig.php';
require_once 'controller/authController.php';
?>
<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-center text-uppercase">Registered Users</h5>
    <p class="text-center">this is the overall countdown and details of all registered users on our platform.</p>
    <?php
    echo '<div class="mt-2 text-center">'.$msg.'</div>';
?>
    <form action="print/printone.php" method="POST">
        <div class="input-group justify-content-center text-center">
            <button type="submit" name="print_one" class="btn btn-danger ml-2"><i
                    class="fas fa-download mr-2"></i>PRINT LIST</button>
        </div>
    </form>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Username</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM users";
                            $query = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_array($query)){
                                    ?>
                        <tr>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['city'];?></td>
                            <td><?php echo $row['password'];?></td>
                            <td class="text-center">
                              <button class="btn btn-danger" onclick="removeData(<?php echo $row['id']?>)">Delete User</button>
                                </div>
                                        </td>
                                        <script>
                                function removeData(id) {
                                    if (confirm("Are you sure that you want this user deleted?")) {
                                        window.location.href = 'delete-user.php?del_id='+id+'';
                                    }
                                }
                                </script>
                               
                        </tr>
                        <?php
                                }
                            }
                        ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php';
?>

</body>

</html>