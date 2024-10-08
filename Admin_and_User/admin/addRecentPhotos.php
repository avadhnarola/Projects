<?php

ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}



if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from recentphoto where rp_id='$id'");
    $u_data = mysqli_fetch_assoc($u_data);
    // print_r($u_data);
    // die();
}

if (isset($_POST['submit'])) {

    $title = $_POST['rp_title'];
    $description = $_POST['rp_description'];
    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"images/$img");
   


    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update recentphoto set rp_title='$title',rp_description='$description',rp_image='$img' where rp_id='$id'");

    } else {
        mysqli_query($conn, "insert into recentphoto(rp_title,rp_description,rp_image) values('$title','$description','$img')");
    }
    header("location:addRecentPhotos.php");
}
?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Recent Images Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Recent Images Form</li>
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
                            <h3 class="card-title">Manage Recent Images</h3>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" >Title</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Title" name="rp_title" value="<?php echo @$u_data['rp_title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" >Discription</label>
                                    <input required type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Discription" name="rp_description" value="<?php echo @$u_data['rp_description']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group form-control">
                                        <input required type="file" id="exampleInputFile" name="image" value="<?php echo @$u_data['rp_image']; ?>">

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