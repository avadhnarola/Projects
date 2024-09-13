<?php

include_once 'header.php';

if(!isset($_SESSION['admin_id'])){
    header("location:index.php");
}


if(isset($_GET['u_id'])){
    $id=$_GET['u_id'];
    $u_data = mysqli_query($conn,"select * from slider where id='$id'");
    $u_data=mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $discription = $_POST['discription'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");

    if(isset($_GET['u_id'])){

        mysqli_query($conn,"update slider set title='$title',discription='$discription',image='$image' where id='$id'");

    }
    else{
    mysqli_query($conn, "insert into slider(title,discription,image) values('$title','$discription','$image')");
    }
    header("location:addSlider.php");
}
?>


<div class="" style="margin:auto; width: 500px;  box-shadow:0px 0px 15px #8D918D; border-radius:5px">
    <div style="margin:20px 0px 0px 0px">
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title"
                        name="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Discription</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Discription"
                        name="discription">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group form-control">
                        <input type="file" id="exampleInputFile" name="image">

                    </div>
                </div>
                <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once 'footer.php';
?>