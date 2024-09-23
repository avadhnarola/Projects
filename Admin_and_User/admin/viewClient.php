<?php

ob_start();
include_once 'header.php';
if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}


$data = mysqli_query($conn, query: "select * from client");

if (isset($_GET['d_id'])) {
    $id = $_GET['d_id'];
    mysqli_query($conn, "delete from client where c_id='$id'");
    header("location:viewClient.php");
}



?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Client</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">View Client</li>
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
                            <h3 class="card-title">Manage Client</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                            <td><?php echo $row['c_id']; ?></td>

                                            <td><img src="images/<?php echo $row['c_image']; ?>" alt="" height="55px"
                                                    Width="80px"></td>
                                            <td>
                                                <a href="addClient.php?u_id=<?php echo $row['c_id']; ?>"><i
                                                        class="fa-regular fa-pen-to-square" style="color:green;"></i></a>

                                                <a href="viewClient.php?d_id=<?php echo $row['c_id']; ?>"><i
                                                        class="fa-regular fa-trash-can"
                                                        style="color:red; margin-left:8px;"></i></a>
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