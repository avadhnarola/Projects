<?php

ob_start();
include_once 'header.php';

if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}



if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $u_data = mysqli_query($conn, "select * from saying where s_id='$id'");
    $u_data = mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {

    $title = $_POST['s_title'];
    $feedbacker = $_POST['s_feedbacker'];
    $place = $_POST['s_place'];
    
    

    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update saying set s_title='$title',s_feedbacker='$feedbacker',s_place='$place' where s_id='$id'");

    } else {
        mysqli_query($conn, "insert into saying(s_title,s_feedbacker,s_place) values('$title','$feedbacker','$place')");
    }
    // header("location:addSaying.php");
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Saying Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Saying Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Manage Saying</h3>
                        </div>
                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" >FeedBack</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Feedback" name="s_title" value="<?php echo @$u_data['s_title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" >Feedbacker</label>
                                    <input required type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Name" name="s_feedbacker" value="<?php echo @$u_data['s_feedbacker']; ?>">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1" >Place</label>
                                    <input required type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Place" name="s_place" value="<?php echo @$u_data['s_place']; ?>">
                                </div>
                               
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once 'footer.php';
?>