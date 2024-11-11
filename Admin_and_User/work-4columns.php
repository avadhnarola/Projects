<?php include_once('f-header.php'); ?>

<?php

$data = mysqli_query($conn, "select * from work");
$classes = mysqli_query($conn, "select distinct w_class from work");

$limit = 8;
$total_data = mysqli_query($conn, "select * from work");
$total_record = mysqli_num_rows($total_data);

$t_page = ceil($total_record / $limit);

if (isset($_GET['page_no'])) {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$start = ($page_no - 1) * $limit;

$res = mysqli_query($conn, "select * from work limit $start, $limit");


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

                <?php while ($row = mysqli_fetch_assoc($classes)) { ?>
                    <a href="#" data-filter=".<?php echo $row['w_class']; ?>"><?php echo $row['w_class']; ?></a>
                <?php }
                ?>


            </div>
        </div>
        <?php $data = mysqli_query($conn, "select * from work"); ?>
        <div class="row">
            <div class="row" id="portfolio-grid">
                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <div class="item col-md-3 col-sm-6 col-xs-12 <?php echo $row['w_class']; ?>">
                        <figure>
                            <img alt="1-image" src="admin/images/<?php echo $row['w_image']; ?>" height="180px"
                                width="270px">
                            <figcaption>
                                <h3><?php echo $row['w_title']; ?></h3>
                                <p><?php echo $row['w_subtitle']; ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-12" style="display:flex; justify-content:center;">
            <nav aria-label="Page navigation example page">
                <ul class="pagination mt-5">
                    <?php if ($page_no > 1) { ?>
                        <li class="page-item">
                            <a class="page-link" href="work-4columns.php?page_no=<?php echo $page_no - 1; ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php for ($i = 1; $i <= $t_page; $i++) { ?>
                        <li class="page-item <?php if ($i == $page_no)
                            echo 'active'; ?>">
                            <a class="page-link" href="work-4columns.php?page_no=<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($page_no < $t_page) { ?>
                        <li class="page-item">
                            <a class="page-link" href="work-4columns.php?page_no=<?php echo $page_no + 1; ?>"
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</section>
<?php include_once('f-footer.php'); ?>