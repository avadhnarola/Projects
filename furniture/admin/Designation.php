<?php
include_once 'db.php';
ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}

if (isset($_GET['u_id'])) {
    $update_id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "SELECT * FROM designation WHERE d_id='$update_id'");
    $u_data = mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {
    $designation = $_POST['name'];

    if (isset($_GET['u_id'])) {
        $update_id = $_GET['u_id'];
        mysqli_query($conn, "UPDATE designation SET name = '$designation' WHERE d_id = '$update_id'");
        header("location:designation.php");
    } else {
        mysqli_query($conn, "INSERT INTO designation(name) VALUES('$designation')");
        header("location:designation.php");
    }
}

if (isset($_GET['d_id'])) {
    $delete_id = $_GET['d_id'];
    mysqli_query($conn, "DELETE FROM designation WHERE d_id = '$delete_id'");
}

$designation_data = mysqli_query($conn, "SELECT * FROM designation");
?>
<div class="content-wrapper">
    <div class="container mt-5">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h3 class="text-center">Designation Form</h3>

                                    <div class="form-group mt-2">
                                        <label for="donationinput3" class="sr-only mb-1 mt-4">Name</label>
                                        <input type="text" name="name" id="donationinput3" class="form-control"
                                            placeholder="Designation.." required value="<?php echo @$u_data['name']; ?>">
                                    </div>

                                    <div class="center d-flex mt-5" style="justify-content: center">
                                        <button type="submit" name="submit"
                                            class="btn btn-outline-primary mt-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Designation Table</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Designation Id</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php while ($row = mysqli_fetch_assoc($designation_data)) { ?>
                                    <tr>
                                        <td><?php echo $row['d_id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="designation.php?u_id=<?php echo $row['d_id']; ?>"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="designation.php?d_id=<?php echo $row['d_id']; ?>"><i
                                                            class="bx bx-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>
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
</div>
<?php
include_once 'footer.php';
?>
