<?php
$conn = mysqli_connect('localhost', 'root', '', 'first-project');

$sliderData = mysqli_query($conn, "select * from slider ORDER BY id DESC LIMIT 3");
$offerData = mysqli_query($conn, "select * from offers ORDER BY o_id DESC LIMIT 3");
$themeData = mysqli_query($conn, "select * from abouttheme ORDER BY a_id DESC LIMIT 1");
$photoData = mysqli_query($conn, "select * from recentphoto ORDER BY rp_id DESC LIMIT 9");
$sayData = mysqli_query($conn, "select * from saying ORDER BY s_id DESC LIMIT 9");
$imgData = mysqli_query($conn, "select * from imagedetails ORDER BY id_id DESC LIMIT 3");


// while($row=mysqli_fetch_assoc($data)){

// 	// echo "<pre>";
// 	// print_r($row);
// }


// die();


?>


<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title>YOM- Multipurpose HTML Theme</title>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="files/css/bootstrap.css">
	<link rel="stylesheet" href="files/css/animate.css">
	<link rel="stylesheet" href="files/css/simple-line-icons.css">
	<link rel="stylesheet" href="files/css/font-awesome.min.css">
	<link rel="stylesheet" href="files/css/style.css">
	<link rel="stylesheet" href="files/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

</head>

<body>



	<div class="sidebar-menu-container" id="sidebar-menu-container">

		<div class="sidebar-menu-push">

			<div class="sidebar-menu-overlay"></div>

			<div class="sidebar-menu-inner">

				<header class="site-header">
					<div id="main-header" class="main-header header-sticky">
						<div class="inner-header clearfix">
							<div class="logo">
								<a href="index-2.html">YOM</a>
							</div>
							<div class="header-right-toggle pull-right hidden-md hidden-lg">
								<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
							</div>
							<nav class="main-navigation pull-right hidden-xs hidden-sm">
								<ul>
									<li><a href="index-2.html">Home</a></li>
									<li><a href="#" class="has-submenu">Pages</a>
										<ul class="sub-menu">
											<li><a href="services.html">Services</a></li>
											<li><a href="clients.html">Clients</a></li>
										</ul>
									</li>
									<li><a href="#" class="has-submenu">Blog</a>
										<ul class="sub-menu">
											<li><a href="blog.html">Blog Classic</a></li>
											<li><a href="blog-grid.html">Blog Grid</a></li>
											<li><a href="blog-single.html">Single Post</a></li>
										</ul>
									</li>
									<li><a href="about.html">About</a></li>
									<li><a href="#" class="has-submenu">Work</a>
										<ul class="sub-menu">
											<li><a href="work-3columns.html">Three Columns</a></li>
											<li><a href="work-4columns.html">Four Columns</a></li>
											<li><a href="single-project.html">Single Project</a></li>
										</ul>
									</li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</header>

				<div class="slider">
					<div class="fullwidthbanner-container">
						<div class="fullwidthbanner">
							<ul>
								<?php
								while ($row = mysqli_fetch_assoc($sliderData)) {
									?>
									<li class="first-slide" data-transition="fade" data-slotamount="10"
										data-masterspeed="300" >

										<img src="admin/images/<?php echo $row['image'] ?>" data-fullwidthcentering="on"
											alt="slide" style="background-size:cover;">
										<div class="tp-caption first-line lft tp-resizeme start" data-x="center"
											data-hoffset="0" data-y="250" data-speed="1000" data-start="200"
											data-easing="Power4.easeOut" data-splitin="none" data-splitout="none"
											data-elementdelay="0" data-endelementdelay="0"><?php echo $row['title'] ?></div>
										<div class="tp-caption second-line lfb tp-resizeme start" data-x="center"
											data-hoffset="0" data-y="340" data-speed="1000" data-start="800"
											data-easing="Power4.easeOut" data-splitin="none" data-splitout="none"
											data-elementdelay="0" data-endelementdelay="0">
											<?php echo $row['description']; ?>
										</div>
										<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center"
											data-hoffset="0" data-y="510" data-speed="1000" data-start="2200"
											data-easing="Power4.easeOut" data-splitin="none" data-splitout="none"
											data-elementdelay="0" data-endelementdelay="0"><a href="#"
												class="btn btn-slider">Discover More</a></div>
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
								<div class="btn-black"><a href="#"  style="display:flex;justify-content:center">Buy This Theme</a></div>
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
							<div class="right-image hidden-xs"><img src="admin/images/<?php echo $row['a_image']; ?>" alt=""
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
												<img alt="portfolio" src="admin/images/<?php echo $row['rp_image']; ?>"
													height="196px">
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
									<?php while ($row = mysqli_fetch_assoc($sayData)) { ?>
										<div class="item">
											<div class="testimonials-post" style="height:200px">
												<span class="fa fa-quote-left"></span>
												<p>“ <?php echo $row['s_title'] ?>”</p>
												<h6><?php echo $row['s_feedbacker']; ?> -
													<em><?php echo $row['s_place']; ?></em>
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
							<h2
								style="color:#272727;text-transform: uppercase;font-size: 24px;font-weight: 600;letter-spacing: 1px;">
								Latest Posts</h2>
							<div class="section-dec"></div>
						</div>
						<div class="blog-item" >
							<?php while ($row = mysqli_fetch_assoc($imgData)) { ?>
								<div class="col-md-4">
									<a href="#"><img src="admin/images/<?php echo $row['id_image'];?>" alt="" height="200px"></a>
									<h3><a href="#"><?php echo $row['id_title'];?></a></h3>
									<span><a href="#"><?php echo $row['id_name'];?></a> / <a href="#"><?php echo $row['id_date'];?></a> / <a
											href="#"><?php echo $row['id_category'];?></a></span>
									<p><?php echo $row['id_description'];?></p>
									<div class="read-more">
										<a href="blog-single.html">Read more</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
				<footer class="footer">
					<div class="three spacing"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<h1>
									<a href="index.html">
										YOM
									</a>
								</h1>
								<p>©2015 Yom. All rights reserved.</p>
								<div class="spacing"></div>
								<ul class="socials">
									<li>
										<a href="http://facebook.com">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="http://twitter.com">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="http://dribbble.com">
											<i class="fa fa-dribbble"></i>
										</a>
									</li>
									<li>
										<a href="http://tumblr.com">
											<i class="fa fa-tumblr"></i>
										</a>
									</li>
								</ul>
								<div class="spacing"></div>
							</div>
							<div class="col-md-3">
								<div class="spacing"></div>
								<div class="links">
									<h4>Some pages</h4>
									<ul>
										<li><a href="#">Home</a></li>
										<li><a href="#">View some works here</a></li>
										<li><a href="#">Follow our blog</a></li>
										<li><a href="#">Contact us</a></li>
										<li><a href="#">Our services</a></li>
									</ul>
								</div>
								<div class="spacing"></div>
							</div>
							<div class="col-md-3">
								<div class="spacing"></div>
								<div class="links">
									<h4>Recent posts</h4>
									<ul>
										<li><a href="#">Hello World!</a></li>
										<li><a href="#">This is the post title here</a></li>
										<li><a href="#">Our happy day</a></li>
										<li><a href="#">The first works done</a></li>
										<li><a href="#">The cats and dogs</a></li>
									</ul>
								</div>
								<div class="spacing"></div>
							</div>
							<div class="col-md-3">
								<div class="spacing"></div>
								<h4>Email updats</h4>
								<p>We want to share our latest trends, news and insights with you.</p>
								<form>
									<input class="email-address" placeholder="Your email address" type="text">
									<input class="button boxed small" type="submit">
								</form>
								<div class="spacing"></div>
							</div>
						</div>
					</div>
					<div class="two spacing"></div>
				</footer>

				<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

			</div>

		</div>

		<nav class="sidebar-menu slide-from-left">
			<div class="nano">
				<div class="content">
					<nav class="responsive-menu">
						<ul>
							<li><a href="index-2.html">Home</a></li>
							<li class="menu-item-has-children"><a href="#">Pages</a>
								<ul class="sub-menu">
									<li><a href="services.html">Services</a></li>
									<li><a href="clients.html">Clients</a></li>
								</ul>
							</li>
							<li class="menu-item-has-children"><a href="#">Blog</a>
								<ul class="sub-menu">
									<li><a href="blog.html">Blog Classic</a></li>
									<li><a href="blog-grid.html">Blog Grid</a></li>
									<li><a href="blog-single.html">Single Post</a></li>
								</ul>
							</li>
							<li><a href="about.html">About</a></li>
							<li class="menu-item-has-children"><a href="#">Works</a>
								<ul class="sub-menu">
									<li><a href="work-3columns.html">Three Columns</a></li>
									<li><a href="work-4columns.html">Four Columns</a></li>
									<li><a href="single-project.html">Single Project</a></li>
								</ul>
							</li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</nav>

	</div>




	<script type="text/javascript" src="files/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="files/js/bootstrap.min.js"></script>
	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
	<script src="files/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="files/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	<script type="text/javascript" src="files/js/plugins.js"></script>
	<script type="text/javascript" src="files/js/custom.js"></script>

</body>

</html>