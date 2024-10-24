<?php

ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}



if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from work where w_id='$id'");
    $u_data = mysqli_fetch_assoc($u_data);
}


if (isset($_POST['submit'])) {

    $class = $_POST['w_class'];
    $title = $_POST['w_title'];
    $subtitle = $_POST['w_subtitle'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");



    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update work set w_class='$class',w_title='$title',w_subtitle='$subtitle',w_image='$image' where w_id='$id'");

    } else {
        mysqli_query($conn, "insert into work(w_class,w_title,w_subtitle,w_image) values('$class','$title','$subtitle','$image')");
    }
    // header("location:addCategory.php");
}
$data = mysqli_query($conn, query: "select * from work");

if (isset($_GET['d_id'])) {
    $id = $_GET['d_id'];
    mysqli_query($conn, "delete from work where c_id='$id'");
    header("location:addWork.php");
}



?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Work Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Work Form</li>
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
                            <h3 class="card-title">Manage Work</h3>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Title" name="w_title"
                                        value="<?php echo @$u_data['w_title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Discription</label>
                                    <input required type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Discription" name="w_subtitle"
                                        value="<?php echo @$u_data['w_subtitle']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Class Name</label>
                                    <select name="w_class" id="" class="form-control">
                                        <option value="rooms">Rooms</option>
                                        <option value="swimming">Swimming</option>
                                        <option value="bathroom">Bathroom</option>
                                        <option value="children play area">Children Play Area</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group form-control">
                                        <input required type="file" id="exampleInputFile" name="image"
                                            value="<?php echo @$u_data['w_image']; ?>">

                                    </div>
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
                            <h3 class="card-title">View Work</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>SubTitle</th>
                                        <th>Class Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                            <td><?php echo $row['w_id']; ?></td>
                                            <td><?php echo $row['w_title']; ?></td>
                                            <td><?php echo $row['w_subtitle']; ?></td>
                                            <td><?php echo $row['w_class']; ?></td>
                                            <td><img src="images/<?php echo $row['w_image']; ?>" height="80px" width="100px" alt=""></td>
                                            <td>
                                                <a href="addWork.php?u_id=<?php echo $row['w_id']; ?>"><i
                                                        class="fa-regular fa-pen-to-square" style="color:green;"></i></a>

                                                <a href="addWork.php?d_id=<?php echo $row['w_id']; ?>"><i
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