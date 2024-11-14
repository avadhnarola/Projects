<?php

include_once 'db.php';

if(isset($_SESSION["admin_id"])){
    header("location:dashboard.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "select * from admin where email='$email' AND password='$password'");
    $cnt = mysqli_num_rows($data);

    $row = mysqli_fetch_assoc($data);

    if ($cnt == 1) {

        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_email'] = $row['email'];
        header("location:dashboard.php");
    } else {
        header("location:index.php");
    }

}


?>




<link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="assets/css/demo.css" />
<div class="mt-5">
    <div class="col-xl-4 m-auto">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-center align-items-center">
                <h3 class="mb-0 ">Admin Login</>

            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Full Name</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="email"
                            placeholder="xyz@gmail.com" />
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-company">Password</label>
                        <input type="password" class="form-control" id="basic-default-company" name="password"
                            placeholder="........" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>