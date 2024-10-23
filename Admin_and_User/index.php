<?php
include_once 'admin/db.php';

$conn = mysqli_connect('localhost', 'root', '', 'first-project');

$sliderData = mysqli_query($conn, "select * from slider ORDER BY id DESC LIMIT 3");
$offerData = mysqli_query($conn, "select * from offers order by o_id limit 0,3");
$themeData = mysqli_query($conn, "select * from abouttheme ORDER BY a_id DESC LIMIT 1");
$photoData = mysqli_query($conn, "select * from recentphoto ORDER BY rp_id DESC LIMIT 9");
$comment = mysqli_query($conn, "select * from comment ORDER BY c_id DESC limit 0,9");
$imgData = mysqli_query($conn, "select * from imagedetails ORDER BY id_id DESC LIMIT 0,3");


// while($row=mysqli_fetch_assoc($data)){

// 	// echo "<pre>";
// 	// print_r($row);
// }


// die();


?>
<?php include_once 'f-header.php' ?>

<div class="slider">
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<ul>
				<?php
				while ($row = mysqli_fetch_assoc($sliderData)) {
					?>
					<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">

						<img src="admin/images/<?php echo $row['image'] ?>" data-fullwidthcentering="on" alt="slide"
							style="background-size:cover;">
						<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0"
							data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none"
							data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><?php echo $row['title'] ?>
						</div>
						<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0"
							data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none"
							data-splitout="none" data-elementdelay="0" data-endelementdelay="0">
							<?php echo $row['description']; ?>
						</div>
						<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0"
							data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut"
							data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a
								href="#" class="btn btn-slider">Discover More</a></div>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>



<section class="services green">
	<div class="container">
		<div class="section-heading">
			<h2>What We Offer</h2>
			<div class="section-dec"></div>
		</div>

		<?php while ($row = mysqli_fetch_assoc($offerData)) { ?>
			<div class="service-item col-md-4">
				<span><i class="<?php echo $row['o_icon']; ?>"></i></span>
				<div class="tittle">
					<h3><?php echo $row['o_title']; ?></h3>
				</div>
				<p><?php echo $row['o_description']; ?></p>
			</div>
		<?php } ?>

	</div>
</section>


<section class="call-to-action-1">
	<div class="container">
		<h4>Over 3000 people already downloaded YOM</h4>
		<p class="col-md-10 col-md-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			Quaerat quod voluptate consequuntur ad quasi, dolores obcaecati ex aliquid, dolor provident
			accusamus omnis dolorum ipsam. Voluptatem ipsum expedita, corporis facilis laborum
			asperiores nostrum! Amet porro numquam ratione temporibus quia dolorem sint lorem voluptates
			quasi mollitia.</p>
		<div class="buttons">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="border-btn"><a href="#">Learn More</a></div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="btn-black"><a href="#" style="display:flex;justify-content:center">Buy This
						Theme</a></div>
			</div>
		</div>
	</div>
</section>


<section class="call-to-action-2">
	<div class="container">
		<?php while ($row = mysqli_fetch_assoc($themeData)) { ?>
			<div class="left-text hidden-xs">
				<h4>
					<?php echo $row['a_title']; ?>
				</h4>
				<p><em><?php echo $row['a_subtitle']; ?></em><br><br>
					<?php echo $row['a_description']; ?>
				</p>
			</div>
			<div class="right-image hidden-xs"><img src="admin/images/<?php echo $row['a_image']; ?>" alt="image"
					style="width:100%; height:100%;"></div>
		<?php } ?>
	</div>
</section>

<section class="portfolio">
	<div class="container">
		<div class="section-heading-white">
			<h2>Recent Photos</h2>
			<div class="section-dec"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="owl-portfolio" class="owl-carousel owl-theme">
					<?php while ($row = mysqli_fetch_assoc($photoData)) { ?>
						<div class="item">
							<figure>
								<img alt="portfolio" src="admin/images/<?php echo $row['rp_image']; ?>" height="196px">
								<figcaption>
									<h3><?php echo $row['rp_title']; ?></h3>
									<p><?php echo $row['rp_description']; ?></p>
								</figcaption>
							</figure>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="owl-navigation">
			<a class="btn prev fa fa-angle-left"></a>
			<a class="btn next fa fa-angle-right"></a>
			<a href="#" class="go-to">Go to portfolio</a>
		</div>
	</div>
</section>

<section class="testimonials">
	<div class="container">
		<div class="section-heading">
			<h2>What Others saying</h2>
			<div class="section-dec"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php while ($row = mysqli_fetch_assoc($comment)) { ?>
						<div class="item">
							<div class="testimonials-post" style="height:200px">
								<span class="fa fa-quote-left"></span>
								<p>“ <?php echo $row['c_title'] ?>”</p>
								<h6><?php echo $row['c_name']; ?> -
									<em><?php echo $row['c_city']; ?></em>
								</h6>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="call-to-action-3">
	<div class="container">
		<div class="col-md-12">
			<h4 class="col-md-10 col-sm-8">Read your lastest newsletters, we have an offer for you!</h4>
			<div class="btn-black col-md-2 col-sm-4"><a href="#">Take it now</a></div>
		</div>
	</div>
</section>

<section class="blog-posts">
	<div class="container">
		<div class="section-heading">
			<h2 style="color:#272727;text-transform: uppercase;font-size: 24px;font-weight: 600;letter-spacing: 1px;">
				Latest Posts</h2>
			<div class="section-dec"></div>
		</div>
		<div class="blog-item">
			<?php while ($row = mysqli_fetch_assoc($imgData)) { ?>
				<div class="col-md-4">
					<a href="#"><img src="admin/images/<?php echo $row['id_image']; ?>" alt="" height="200px"></a>
					<h3><a href="#"><?php echo $row['id_title']; ?></a></h3>
					<span><a href="#"><?php echo $row['id_name']; ?></a> / <a href="#"><?php echo date('d F Y', strtotime($row['id_date'])); ?>					</a> /
						<a href="#"><?php echo $row['id_category']; ?></a></span>
					<p><?php echo $row['id_description']; ?></p>
					<div class="read-more">
						<a href="blog-single.html">Read more</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php include_once 'f-footer.php'; ?>