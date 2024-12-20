<?php

ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}

if (isset($_GET['u_id'])) {
    $update_id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from service where s_id='$update_id'");
    $u_data = mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "service-images/$image");

    if (isset($_GET['u_id'])) {
        $update_id = $_GET['u_id'];
        mysqli_query($conn, "update service set title='$title', description = '$description', image = '$image' where s_id = '$update_id'");
        header("location:add-Services.php");
    } else {
        mysqli_query($conn, "insert into service(title,description,image) values('$title','$description','$image')");
        header("location:add-Services.php");
    }
}
?>
<div class="content-wrapper">
    <div class="mt-5">
        <div class="col-xl-6 col-md-12 m-auto mt-5">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h3 class="text-center">Services Form</h3>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only mb-1 mt-4">Title</label>
                                    <input type="text" name="title" id="donationinput4" class="form-control"
                                           placeholder="Title" required value="<?php echo @$u_data['title']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only mb-1 mt-4">Description</label>
                                    <input type="text" name="description" id="donationinput4" class="form-control"
                                           placeholder="Description" required value="<?php echo @$u_data['description']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only mb-1 mt-4">Services Image</label>
                                    <input type="file" name="image" id="donationinput4" class="form-control" required>
                                </div>

                                <div class="center d-flex mt-5" style="justify-content: center">
                                    <button type="submit" name="submit" class="btn btn-outline-primary mt-1">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
