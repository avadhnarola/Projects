<?php
include_once 'db.php';
include_once 'header.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"product-image/$image");

    mysqli_query($conn,"insert into product(name,amount,image) values('$name','$amount','$image')");
    header("location:add-Product.php");
}
?>

<div class="mt-5">
    <div class="col-xl-6 col-md-12 m-auto mt-5">
        <div class="card">
            <div class="card-content">
                <div class="card-body">

                    <form class="form" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <h1 class="text-center">Product Form</h1>

                            <div class="form-group my-2">
                                <label for="donationinput3" class="sr-only mb-2">Name</label>
                                <input type="text" name="name" id="donationinput3" class="form-control"
                                    placeholder="Name.." required>
                            </div>

                            <div class="form-group">
                                <label for="donationinput4" class="sr-only  mb-2 mt-3">Amount</label>
                                <input type="text" name="amount" id="donationinput4" class="form-control"
                                    placeholder="Amount"  required>
                            </div>

                            <div class="form-group">
                                <label for="donationinput4" class="sr-only  mb-2 mt-3">Product Image</label>
                                <input type="file" name="image" id="donationinput4" class="form-control"
                                    required>
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

