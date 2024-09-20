<?php

ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}



if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from imagedetails where id_id='$id'");
    $u_data = mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");

    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update imagedetails set id_title='$title',id_name='$name',id_date='$date',id_category='$category',id_description='$description',id_image='$image' where id_id='$id'");

    } else {
        mysqli_query($conn, "insert into imagedetails(id_title,id_name,id_date,id_category,id_description,id_image) values('$title','$name','$date','$category','$description','$image')");
    }
    header("location:addLatestPosts.php");
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Image Details Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Image Details Form</li>
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
                            <h3 class="card-title">Manage Image Details</h3>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Title" name="title" value="<?php echo @$u_data['id_title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Name" name="name" value="<?php echo @$u_data['id_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Date" name="date" value="<?php echo @$u_data['id_date']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">category</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter category" name="category" value="<?php echo @$u_data['id_category']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Discription</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Discription" name="description"
                                        value="<?php echo @$u_data['id_description']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group form-control">
                                        <input type="file" id="exampleInputFile" name="image"
                                            value="<?php echo @$u_data['id_image']; ?>">

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