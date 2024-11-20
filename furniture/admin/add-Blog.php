<?php
include_once 'db.php';
ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}

if (isset($_GET['u_id'])) {
    $update_id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from blog where b_id='$update_id'");
    $u_data = mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "blog-images/$image");

    if (isset($_GET['u_id'])) {
        $update_id = $_GET['u_id'];
        mysqli_query($conn, "update blog set name = '$name', title = '$title', image = '$image', date = '$date' where b_id = '$update_id'");
        header("location:add-Blog.php");
    } else {
        mysqli_query($conn, "insert into blog(name, title, image, date) values('$name', '$title', '$image', '$date')");
        header("location:add-Blog.php");
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
                                <h3 class="text-center">Blog Form</h3>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only mb-1 mt-4">Title</label>
                                    <input type="text" name="title" id="donationinput4" class="form-control"
                                           placeholder="Title" required value="<?php echo @$u_data['title']; ?>">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="donationinput3" class="sr-only mb-1 mt-4">Name</label>
                                    <input type="text" name="name" id="donationinput3" class="form-control"
                                           placeholder="Name.." required value="<?php echo @$u_data['name']; ?>">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="donationinput3" class="sr-only mb-1 mt-4">Date</label>
                                    <input type="date" name="date" id="donationinput3" class="form-control"
                                           placeholder="Date.." required 
                                           value="<?php echo isset($u_data['date']) ? $u_data['date'] : date('Y-m-d'); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only mb-1 mt-4">Blog Image</label>
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
