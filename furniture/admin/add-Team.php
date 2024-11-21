<?php
include_once 'db.php';
ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}

if (isset($_GET['u_id'])) {
    $update_id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from team where t_id='$update_id'");
    $u_data = mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "team-images/$image");

    if (isset($_GET['u_id'])) {
        $update_id = $_GET['u_id'];
        mysqli_query($conn, "update team set name = '$name', designation = '$designation',description = '$description', image = '$image' where t_id = '$update_id'");
        header("location:add-Team.php");
    } else {
        mysqli_query($conn, "insert into team(name, designation,description, image) values('$name', '$designation','$description' ,'$image')");
        header("location:add-Team.php");
    }
}
$desigData = mysqli_query($conn, "select * from designation");
?>
<div class="content-wrapper">
    <div class="mt-5">
        <div class="col-xl-6 col-md-12 m-auto mt-5">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h3 class="text-center">Team Form</h3>

                                <div class="form-group mt-2">
                                    <label for="donationinput3" class="sr-only mb-1 mt-4">Name</label>
                                    <input type="text" name="name" id="donationinput3" class="form-control"
                                        placeholder="Name.." required value="<?php echo @$u_data['name']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only mb-1 mt-4">Designation</label>
                                    <select name="designation" id="" class="form-control" required>
                                        <option value="" disabled>Select Designation</option>
                                        <?php while ($row = mysqli_fetch_assoc($desigData)) { ?>
                                            <option value="<?php echo $row['d_id']; ?>" <?php if (@$u_data['designation'] == $row['d_id']) {
                                                   echo "selected"; // Select the current category if it matches
                                               } ?>>
                                                <?php echo $row['name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only mb-1 mt-4">Description</label>
                                    <input type="text" name="description" id="donationinput4" class="form-control"
                                        placeholder="Description" required
                                        value="<?php echo @$u_data['description']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only mb-1 mt-4">Team Image</label>
                                    <input type="file" name="image" id="donationinput4" class="form-control" required>
                                </div>

                                <div class="center d-flex mt-5" style="justify-content: center">
                                    <button type="submit" name="submit"
                                        class="btn btn-outline-primary mt-1">Submit</button>
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