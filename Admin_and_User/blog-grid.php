<?php



$limit = 6;
$total_data = mysqli_query($conn, "select * from imagedetails");
$total_record = mysqli_num_rows($total_data);

$t_page = ceil($total_record / $limit);
if (isset($_GET['page_no'])) {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$start = ($page_no - 1) * $limit;
$data = mysqli_query($conn, "select * from imagedetails limit $start,$limit");
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
                        <a href="blog-single.php"><img src="admin/images/<?php echo $row['id_image']; ?>" alt=""
                                style="height:202px; width:360px;"></a>
                        <h3><a href="blog-single.php"><?php echo $row['id_title']; ?></a></h3>
                        <span><a href="#"><?php echo $row['id_name']; ?></a> / <a
                                href="#"><?php echo $row['id_date']; ?></a> / <a
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
                        <?php if ($page_no > 1) { ?>
                            <li>
                                <a href="blog-grid.php?page_no=<?php echo $page_no - 1 ?>" class="current"
                                    aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $t_page; $i++) { ?>
                            <li <?php if ($i == $page_no)
                                echo 'active'; ?>>
                                <a href="blog-grid.php?page_no=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($page_no < $t_page) { ?>
                            <li>
                                <a href="blog-grid.php?page_no=<?php echo $page_no + 1; ?>">
                                    <span>&raquo;</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'f-footer.php'; ?>