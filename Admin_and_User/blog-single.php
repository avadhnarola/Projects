<?php
include_once 'admin/db.php';
$cur_page = $_SESSION['blog_id'];

$all = mysqli_query($conn, "select * from imagedetails");
$all_d = mysqli_num_rows($all);
$comment = mysqli_query($conn, "select * from comment  where ref_id='$cur_page' ORDER BY c_id DESC limit 0,3");


$lastThree = mysqli_query($conn, "select * from imagedetails ORDER BY id_id DESC limit 0,3");

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $message = $_POST['message'];
    $cur_page = $_SESSION['blog_id'];


    mysqli_query($conn, "insert into comment(c_name,c_email,c_title,c_city,ref_id)values('$name','$email','$message','$city','$cur_page')");
    header("location:blog-single.php");
}

if (isset($_GET['blog_id'])) {
    $id = $_GET['blog_id'];

    $data = mysqli_query($conn, "select * from imagedetails where id_id='$id'");
    $row = mysqli_fetch_assoc($data);
    $_SESSION['blog_id'] = $row['id_id'];
    $cur_page = $_SESSION['blog_id'];

}
?>
<?php include_once 'f-header.php' ?>


<section class="page-heading wow fadeIn" data-wow-duration="1.5s"
    style="background-image: url(files/images/01-heading.jpg)">
    <div class="container">
        <div class="page-name">
            <h1>Single Post</h1>
            <span>Lovely layout of heading</span>
        </div>
    </div>
</section>

<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (@$row) { ?>
                    <div class="blog-single-item">
                        <img src="admin/images/<?php echo $row['id_image']; ?>" alt="" class="img-fluid" width="750px"
                            height="519.88px">
                        <div class="blog-single-content">
                            <h3><a href="#"><?php echo $row['id_title']; ?></a></h3>
                            <span><a href="#"><?php echo $row['id_name']; ?></a> / <a
                                    href="#"><?php echo $row['id_date']; ?> / <a
                                        href="#"><?php echo $row['id_category']; ?></a></span>
                            <p><?php echo $row['id_description']; ?> <br><br> <em><i class="fa fa-info"></i>Quis, sequi illo
                                    nobis
                                    velit. Quas minima corporis quis laborum, ex odit natus.</em><br><br>Blanditiis possimus
                                voluptas similique numquam consequatur dolorem labore veritatis quaerat laboriosam, porro
                                tenetur vel exercitationem laborum aperiam repellat expedita ipsum corrupti perspiciatis!
                                Quia necessitatibus totam repudiandae ipsam aut repellendus, aspernatur soluta consectetur
                                aperiam accusantium aliquid beatae nihil magni nulla, similique minus perspiciatis provident
                                qui veritatis dolorum quasi sint. Quam impedit in eos illum sint officiis reiciendis
                                repellendus quia, similique ipsa porro accusantium dolores sunt error, ex, tempora et
                                voluptatibus eveniet. <br><br>Voluptatibus libero laboriosam tempore rerum error non.
                                Perspiciatis deleniti iste a. Illo ipsum, commodi vel necessitatibus assumenda veritatis a
                                velit possimus sint!</p>
                            <div class="share-post">
                                <span>Share on: <a href="#">facebook</a>, <a href="#">twitter</a>, <a href="#">linkedin</a>,
                                    <a href="#">instagram</a></span>
                            </div>
                        </div>

                        <div class="prev-btn col-md-6 col-sm-6 col-xs-6">
                            <?php if ($id > 1) { ?>
                                <a href="blog-single.php?blog_id=<?php echo $id - 1; ?>"><i
                                        class="fa fa-angle-left"></i>Previous</a>
                            <?php } ?>
                        </div>
                        <div class="next-btn col-md-6 col-sm-6 col-xs-6">
                            <?php if ($id <= $all_d) { ?>
                                <a href="blog-single.php?blog_id=<?php echo $id + 1; ?>">Next<i
                                        class="fa fa-angle-right"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="blog-comments">
                    <h2>7 Comments</h2>
                    <?php while ($row = mysqli_fetch_assoc($comment)) { ?>
                        <ul class="coments-content">
                            <li class="first-comment-item">
                                <img src="files/images/01-author-comment.jpg" alt="">
                                <span class="author-title"><a href="#"><?php echo $row['c_name']; ?></a></span>
                                <span class="comment-date">10 May 2015 / <a href="#">Reply</a>
                                </span>
                                <p style="width:683px;"><?php echo $row['c_title']; ?></p>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
                <div class="submit-comment col-sm-12">
                    <h2>Leave A Comment</h2>
                    <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
                        <div class=" col-md-4 col-sm-4 col-xs-6">
                            <input type="text" class="blog-search-field" name="name" placeholder="Your name..."
                                value="">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <input type="email" class="blog-search-field" name="email" placeholder="Your email..."
                                value="">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 my-3">
                            <input type="text" class="subject" name="city" placeholder="City..." value="">
                        </div>
                        <div class=" col-md-4 col-sm-4 col-xs-6">
                            <input type="date" class="blog-search-field subject" name="date" value="">
                        </div>
                        <div class="col-md-8 col-sm-4 col-xs-6">
                            <input type="file" class="blog-search-field" name="image" value="">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <textarea id="message" class="input" name="message" placeholder="Comment..."></textarea>
                        </div>
                        <div class="submit-coment col-md-12">
                            <div class="btn-black">
                                <input type="submit" name="submit" value="Submit" style="color:#fff;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-item">
                    <h2>Search here</h2>
                    <div class="dec-line"></div>
                    <form method="get" id="blog-search" class="blog-search">
                        <input type="text" class="blog-search-field" name="s" placeholder="Type keyword..." value="">
                    </form>
                </div>
                <div class="widget-item">
                    <h2>About Us</h2>
                    <div class="dec-line">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique earum quod iste, natus
                        quaerat facere a rem dolor sit amet, et placeat nemo.</p>
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-instagram" style="font-size:1rem;"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter" style="font-size:1rem;"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-google-plus" style="font-size:1rem;"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-whatsapp" style="font-size:1rem;"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" style="font-size:1rem;"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget-item">
                    <h2>Recent Posts</h2>
                    <div class="dec-line"></div>
                    <?php while ($row = mysqli_fetch_assoc($lastThree)) { ?>
                        <ul class="recent-item">
                            <li class="recent-post-item">
                                <a href="blog-single.php?blog_id=<?php echo $row['id_id']; ?>">
                                    <img src="admin/images/<?php echo $row['id_image']; ?>" alt=""
                                        style="height:70px;width:80px;">
                                    <span class="post-title"><?php echo $row['id_name']; ?></span>
                                </a>
                                <span class="post-info" style="width:200px;"><?php echo $row['id_date']; ?></span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="widget-item">
                    <h2>From Flickr</h2>
                    <div class="dec-line"></div>
                    <div class="flickr-feed">
                        <ul class="flickr-images">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'f-footer.php' ?>