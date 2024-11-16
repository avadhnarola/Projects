<?php
include_once 'header.php';
include_once 'db.php';

if (!isset($_SESSION['admin_id'])) {

    header("location:index.php");
    exit;
}

$product_data = mysqli_query($conn, "select * from product");
?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Product Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php while ($row = mysqli_fetch_assoc($product_data)) { ?>
                                <td><span><?php echo $row['p_id']; ?></span></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['amount']; ?>.00</td>
                                <td><img src="../admin/product-image/<?php echo $row['image']; ?>"
                                        class="img-fluid product-thumbnail" alt="product image" height="30px;"
                                        width="30px;"></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="add-product.php?u_id=<?php echo $row['p_id']; ?>"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="view-product.php?d_id=<?php echo $row['p_id']; ?>"><i
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