<?php include_once('f-header.php'); ?>

<?php

$data = mysqli_query($conn, "select * from work");


?>

<section class="page-heading wow fadeIn" data-wow-duration="1.5s"
    style="background-image: url(files/images/01-heading.jpg)">
    <div class="container">
        <div class="page-name">
            <h1>Latest Photos</h1>
            <span>Lovely layout of heading</span>
        </div>
    </div>
</section>

<section class="portfolio on-portfolio">
    <div class="container">

        <div class="col-sm-12 text-center">
            <div id="projects-filter">
                <?php $row = mysqli_fetch_assoc($data); ?>
                <a href="#" data-filter="*" class="active">Show All</a>
                <a href="#" data-filter=".<?php echo $row['w_class']; ?>"><?php echo $row['w_class']; ?></a>
                <a href="#" data-filter=".<?php echo $row['w_class']; ?>"><?php echo $row['w_class']; ?></a>
                <a href="#" data-filter=".<?php echo $row['w_class']; ?>"><?php echo $row['w_class']; ?></a>
                <a href="#" data-filter=".<?php echo $row['w_class']; ?>"><?php echo $row['w_class']; ?></a>
            </div>
        </div>
        <?php $data = mysqli_query($conn, "select * from work");
        while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="row">
                <div class="row" id="portfolio-grid">
                    <div class="item col-md-4 col-sm-6 col-xs-12 <?php echo $row['w_class']; ?>">
                        <figure>
                            <img alt="1-image" src="admin/images/<?php echo $row['w_image']; ?>">
                            <figcaption>
                                <h3><?php echo $row['w_title']; ?></h3>
                                <p><?php echo $row['w_subtitle']; ?></p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-12">
            <div class="portfolio-page-nav text-center">
                <ul>
                    <li><a href="#" class="current">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php include_once('f-footer.php'); ?>