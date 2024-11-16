<?php
include_once 'db.php';
ob_start();
include_once 'header.php';



// if(isset($_SESSION['admin_id'])){
//     header("location:dashboard.php");
// }

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "product-image/$image");

    mysqli_query($conn, "insert into product(name,amount,image) values('$name','$amount','$image')");
    header("location:add-Product.php");
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
                                <h3 class="text-center">Product Form</h3>

                                <div class="form-group mt-2">
                                    <label for="donationinput3" class="sr-only mb-1 mt-4">Name</label>
                                    <input type="text" name="name" id="donationinput3" class="form-control"
                                        placeholder="Name.." required>
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only  mb-1 mt-4">Amount</label>
                                    <input type="text" name="amount" id="donationinput4" class="form-control"
                                        placeholder="Amount" required>
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4" class="sr-only  mb-1 mt-4">Product Image</label>
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