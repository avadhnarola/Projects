<?php
include_once 'db.php';
$offerData3 = mysqli_query($conn, "select * from offers limit 3");
$offerData6 = mysqli_query($conn, "select * from offers ORDER BY o_id DESC LIMIT 3");
$themeData = mysqli_query($conn, "select * from abouttheme ORDER BY a_id DESC LIMIT 1");


?>

<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title>Our Services</title>


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
								<a href="index.php">YOM</a>
							</div>
							<div class="header-right-toggle pull-right hidden-md hidden-lg">
								<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
							</div>
							<nav class="main-navigation pull-right hidden-xs hidden-sm">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="#" class="has-submenu">Pages</a>
										<ul class="sub-menu">
											<li><a href="services.php">Services</a></li>
											<li><a href="clients.php">Clients</a></li>
										</ul>
									</li>
									<li><a href="#" class="has-submenu">Blog</a>
										<ul class="sub-menu">
											<li><a href="blog.php">Blog Classic</a></li>
											<li><a href="blog-grid.php">Blog Grid</a></li>
											<li><a href="blog-single.php">Single Post</a></li>
										</ul>
									</li>
									<li><a href="about.php">About</a></li>
									<li><a href="#" class="has-submenu">Work</a>
										<ul class="sub-menu">
											<li><a href="work-3columns.php">Three Columns</a></li>
											<li><a href="work-4columns.php">Four Columns</a></li>
											<li><a href="single-project.php">Single Project</a></li>
										</ul>
									</li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</header>

				<section class="page-heading wow fadeIn" data-wow-duration="1.5s"
					style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Our Services</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>

				<section class="services on-services green">
					<div class="container">
						<div class="row">
							<div class="section-heading">
								<h2>What We Offer</h2>
								<div class="section-dec"></div>
							</div>
							<?php while ($row = mysqli_fetch_assoc($offerData3)) { ?>
								<div class="service-item col-md-4 ">
									<span><i class="<?php echo $row['o_icon']; ?>"></i></span>
									<div class="tittle">
										<h3><?php echo $row['o_title']; ?></h3>
									</div>
									<p><?php echo $row['o_description']; ?></p>
								</div>
							<?php } ?>
						</div>
						<div class="container">
							<div class="row">
								<?php while ($row = mysqli_fetch_assoc($offerData6)) { ?>
									<div class="service-item col-md-4">
										<span><i class="<?php echo $row['o_icon']; ?>"></i></span>
										<div class="tittle">
											<h3><?php echo $row['o_title']; ?></h3>
										</div>
										<p><?php echo $row['o_description']; ?></p>
									</div>
								<?php } ?>
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
								<p><em><?php echo $row['a_subtitle']; ?></em><br><br><?php echo $row['a_description']; ?>
								</p>
							</div>
							<div class="right-image hidden-xs"><img src="admin/images/<?php echo $row['a_image']; ?>"
									alt="image" style="width:100%; height:100%;"></div>
						<?php } ?>
					</div>
				</section>

<?php include_once "f-footer.php"; ?>