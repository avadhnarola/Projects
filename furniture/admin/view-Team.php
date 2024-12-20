<?php
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
    exit;
}

// Delete operation
if (isset($_GET['d_id'])) {
    $delete_id = $_GET['d_id'];
    mysqli_query($conn, "DELETE FROM team WHERE t_id = '$delete_id'");
}

// Fetch team data with proper JOIN
$team_data = mysqli_query($conn, "SELECT team.t_id, team.name, designation.name AS designation, team.description, team.image FROM team INNER JOIN designation ON team.designation = designation.d_id");
?>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Team Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Member Id</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php while ($row = mysqli_fetch_assoc($team_data)) { ?>
                            <tr>
                                <td><?php echo $row['t_id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['designation']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <img src="../admin/team-images/<?php echo $row['image']; ?>"
                                        class="img-fluid product-thumbnail" alt="team image" height="30" width="30">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="add-Team.php?u_id=<?php echo $row['t_id']; ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="view-Team.php?d_id=<?php echo $row['t_id']; ?>">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
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