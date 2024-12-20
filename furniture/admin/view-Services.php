<?php
include_once 'header.php';


if (!isset($_SESSION['admin_id'])) {

    header("location:index.php");
    exit;
}

if(isset($_GET['d_id'])){
    $delete_id = $_GET['d_id'];

    mysqli_query($conn,"delete from service where s_id = '$delete_id'");
}

$service_data = mysqli_query($conn, "select * from service");
?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Services Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Services Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php while ($row = mysqli_fetch_assoc($service_data)) { ?>
                                <td><span><?php echo $row['s_id']; ?></span></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><img src="../admin/service-images/<?php echo $row['image']; ?>"
                                        class="img-fluid product-thumbnail" alt="service image" height="30px;"
                                        width="30px;"></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="add-Services.php?u_id=<?php echo $row['s_id']; ?>"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="view-Services.php?d_id=<?php echo $row['s_id']; ?>"><i
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



<?php
include_once 'footer.php';
?>