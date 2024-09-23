<?php
include_once "db.php";

$data = mysqli_query($conn, "select * from imagedetails");
?>

<?php include_once 'f-header.php'; ?>

<section class="page-heading wow fadeIn" data-wow-duration="1.5s"
    style="background-image: url(files/images/01-heading.jpg)">
    <div class="container">
        <div class="page-name">
            <h1>Our Blog</h1>
            <span>Lovely layout of heading</span>
        </div>
    </div>
</section>

<section class="on-blog-grid">
    <div class="container">
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <div class="col-md-4">
                    <div class="blog-item">
                        <a href="blog-single.php"><img src="admin/images/<?php echo $row['id_image']; ?>" alt="" style="height:360px"></a>
                        <h3><a href="blog-single.php"><?php echo $row['id_title']; ?></a></h3>
                        <span><a href="#"><?php echo $row['id_name']; ?></a> / <a href="#"><?php echo $row['id_date']; ?></a> / <a
                                href="#"><?php echo $row['id_category']; ?></a></span>
                        <p><?php echo $row['id_description']; ?></p>
                        <div class="read-more">
                            <a href="blog-single.php">Read more</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
      
            <div class="col-md-12">
                <div class="blog-page-nav text-center">
                    <ul>
                        <li><a href="#" class="current">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'f-footer.php'; ?>