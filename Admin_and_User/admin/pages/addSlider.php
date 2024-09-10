<?php

include_once '../db.php';
include_once '../header.php';
// include_once 'dist.php';
 
if (isset($_POST['submit'])) {

    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");

    mysqli_query($conn, "insert into slider(image) values('$image')");
    header("location:slider.php");
}
?>

<form method="post" enctype="multipart/form-data" >
    <table style="margin:auto">
        <tr>
            <td>Image : </td>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Submit</button></td>
        </tr>
    </table>
</form>

<?php
include '../footer.php';
?>