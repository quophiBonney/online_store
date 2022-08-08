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
    <h5 class="m-0 font-weight-bold text-center text-uppercase">Phones List</h5>
    <p class="text-center">this is the full of the list of all added phones.</p>
    <?php
echo '<div class="mt-2 text-center">'.$msg.'</div>';
?>
    <form action="print/printone.php" method="POST">
        <div class="input-group justify-content-center text-center">

            <a href="#" class="d-none d-sm-inline-block btn btn-primary" data-toggle="modal"
                data-target="#addPhone"><i class="fas fa-download fa-sm text-white-50 mr-2"></i>Add New
                Phone</a>
            <button type="submit" name="print_one" class="btn btn-danger ml-2"><i
                    class="fas fa-download mr-2"></i>PRINT LIST</button>
        </div>
    </form>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM phones";
                    $query = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_array($query)){
                            ?>
                <tr>
                    <td><?php echo $row['phoneName'];?></td>
                    <td><img class="img-responsive phones" src="../upload/<?php echo $row['image'];?>"></td>
                    <td><?php echo substr($row['phoneDescription'], 0, 50);?>.....</td>
                    <td>&#8373;<?php echo number_format($row['price'], 2);?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td>
                        <div class="d-flex">
                            <form action="edit-data.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                <button class="btn btn-success"><i class="fa fa-edit text-light"></i></button>
                            </form>
                            <button class="btn btn-danger" onclick="removeData(<?php echo $row['id']?>)"><i
                                    class="fa fa-trash text-light"></i></button>
                        </div>
                    </td>
                    <script>
                    function removeData(id) {
                        if (confirm("Are you sure you want to remove item?")) {
                            window.location.href =
                                'delete-phone.php?del_id=' + id + '';
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

<!-- Primary One Admission Entries -->
<div class="modal fade" id="addPhone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h5 class="text-center p-3">Add New Phone</h5>
                    <form action="insert-phone.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="phoneName" placeholder="Phone Name" required=""
                                class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="file" name="imageTwo" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="file" name="imageThree" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phoneDescription" placeholder="Description" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" placeholder="Price" class="form-control"
                                required="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="status" placeholder="New"
                                class="form-control" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="addPhone" class="form-control btn btn-primary">Add New
                                Phone</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php';
?>

</body>

</html>