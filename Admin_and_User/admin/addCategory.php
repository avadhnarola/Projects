<?php

ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}



if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from category where c_id='$id'");
    $u_data = mysqli_fetch_assoc($u_data);
}


if (isset($_POST['submit'])) {

    $name = $_POST['c_name'];



    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update category set c_name='$name' where c_id='$id'");

    } else {
        mysqli_query($conn, "insert into category(c_name) values('$name')");
    }
    // header("location:addCategory.php");
}
$data = mysqli_query($conn, query: "select * from category");

if (isset($_GET['d_id'])) {
    $id = $_GET['d_id'];
    mysqli_query($conn, "delete from category where c_id='$id'");
    header("location:addCategory.php");
}



?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Category Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Category Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Manage Category</h3>
                        </div>
                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Category" name="c_name"
                                        value="<?php echo @$u_data['c_name']; ?>">
                                </div>

                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">View Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                            <td><?php echo $row['c_id']; ?></td>
                                            <td><?php echo $row['c_name']; ?></td>
                                            <td>
                                                <a href="addCategory.php?u_id=<?php echo $row['c_id']; ?>"><i
                                                        class="fa-regular fa-pen-to-square" style="color:green;"></i></a>

                                                <a href="addCategory.php?d_id=<?php echo $row['c_id']; ?>"><i
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

<?php
include_once 'footer.php';
?>