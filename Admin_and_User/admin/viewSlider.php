<?php

ob_start();
include_once 'header.php';
if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}


$data = mysqli_query($conn, query: "select * from slider");

if (isset($_GET['d_id'])) {
    $id = $_GET['d_id'];
    mysqli_query($conn, "delete from slider where id='$id'");
    header("location:viewSlider.php");
}



?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">View Slider</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Manage Slider</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><img src="images/<?php echo $row['image']; ?>" alt="" height="55px"
                                                    Width="80px"></td>
                                            <td>
                                                <a href="addSlider.php?u_id=<?php echo $row['id']; ?>" ><i class="fa-regular fa-pen-to-square" style="color:green;"></i></a>
                                                
                                                <a href="viewSlider.php?d_id=<?php echo $row['id']; ?>"><i class="fa-regular fa-trash-can" style="color:red; margin-left:8px;"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php include_once 'footer.php' ?>