<?php

ob_start();
include_once 'header.php';
if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}


$data = mysqli_query($conn, query: "select * from recentphoto");

if (isset($_GET['d_id'])) {
    $id = $_GET['d_id'];
    mysqli_query($conn, "delete from recentphoto where rp_id='$id'");
    header("location:viewAboutTheme.php");
}

$limit = 6;
$total_data = mysqli_query($conn, "select * from recentphoto");
$total_record = mysqli_num_rows($total_data);

$t_page = ceil($total_record / $limit);

if (isset($_GET['page_no'])) {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$start = ($page_no - 1) * $limit;

$res = mysqli_query($conn, "select * from recentphoto limit $start, $limit");
?>



?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Recent Theme</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">View Recent Images</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Manage Recent Images</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                            <td><?php echo $row['rp_id']; ?></td>
                                            <td><?php echo $row['rp_title']; ?></td>
                                            <td><?php echo $row['rp_description']; ?></td>
                                            <td><img src="images/<?php echo $row['rp_image']; ?> " alt="Image" height="55px"
                                                    Width="80px"></td>
                                            <td>
                                                <a href="addRecentPhotos.php?u_id=<?php echo $row['rp_id']; ?>"><i
                                                        class="fa-regular fa-pen-to-square" style="color:green;"></i></a>

                                                <a href="viewRecentPhotos.php?d_id=<?php echo $row['rp_id']; ?>"><i
                                                        class="fa-regular fa-trash-can"
                                                        style="color:red; margin-left:8px;"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example page m-auto">
                                <ul class="pagination mt-5">
                                    <?php if ($page_no > 1) { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="addWork.php?page_no=<?php echo $page_no - 1; ?>"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php for ($i = 1; $i <= $t_page; $i++) { ?>
                                        <li class="page-item <?php if ($i == $page_no)
                                            echo 'active'; ?>">
                                            <a class="page-link" href="addWork.php?page_no=<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($page_no < $t_page) { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="addWork.php?page_no=<?php echo $page_no + 1; ?>"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php include_once 'footer.php' ?>