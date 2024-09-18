<?php

ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}



if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from abouttheme where a_id='$id'");
    $u_data = mysqli_fetch_assoc($u_data);
    // print_r($u_data);
    // die();
}

if (isset($_POST['submit'])) {

    $title = $_POST['a_title'];
    $subtitle = $_POST['a_subtitle'];
    $description = $_POST['a_description'];
    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"images/$img");
   


    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update abouttheme set a_title='$title',a_subtitle='$subtitle',a_description='$description',a_image='$img' where a_id='$id'");

    } else {
        mysqli_query($conn, "insert into abouttheme(a_title,a_subtitle,a_description,a_image) values('$title','$subtitle','$description','$img')");
    }
    header("location:addAboutTheme.php");
}
?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Theme Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Theme Form</li>
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
                            <h3 class="card-title">Manage Theme</h3>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" >Title</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Title" name="a_title" value="<?php echo @$u_data['a_title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" >Sub Title</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Title" name="a_subtitle" value="<?php echo @$u_data['a_subtitle']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" >Discription</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Discription" name="a_description" value="<?php echo @$u_data['a_description']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group form-control">
                                        <input type="file" id="exampleInputFile" name="image" value="<?php echo @$u_data['a_image']; ?>">

                                    </div>
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