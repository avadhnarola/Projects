<?php

include_once 'header.php';
ob_start();

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}


if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from slider where id='$id'");
    $u_data = mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");

    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update slider set title='$title',description='$description',image='$image' where id='$id'");

    } else {
        mysqli_query($conn, "insert into slider(title,description,image) values('$title','$description','$image')");
    }
    header("location:addSlider.php");
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Slider Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Discription</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Discription" name="description">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group form-control">
                                        <input type="file" id="exampleInputFile" name="image">

                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once 'footer.php';
?>