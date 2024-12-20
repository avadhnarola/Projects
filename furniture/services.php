<?php
include_once 'header.php';
$service_data = mysqli_query($conn, "select * from service");
$product_data = mysqli_query($conn, "select * from product ORDER BY p_id DESC limit 0,3");
$testimonials = mysqli_query($conn, "SELECT team.t_id, team.name, designation.name AS designation, team.description, team.image FROM team INNER JOIN designation ON team.designation = designation.d_id");



?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Services</h1>
					<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
						vulputate velit imperdiet dolor tempor tristique.</p>
					<p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#"
							class="btn btn-white-outline">Explore</a></p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="hero-img-wrap">
					<img src="images/couch.png" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->



<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
	<div class="container">
		<div class="row my-5">
			<?php while ($row = mysqli_fetch_assoc($service_data)) { ?>
				<div class="col-6 col-md-6 col-lg-3 mb-4">
					<div class="feature">
						<div class="icon">
							<img src="admin/service-images/<?php echo $row['image']; ?>" alt="Image" class="imf-fluid"
								style="height:36px; width:38px;">
						</div>
						<h3><?php echo $row['title']; ?></h3>
						<p><?php echo $row['description']; ?></p>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Product Section -->
<div class="product-section pt-0">
	<div class="container">
		<div class="row">

			<!-- Start Column 1 -->
			<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
				<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
				<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
					velit imperdiet dolor tempor tristique. </p>
				<p><a href="#" class="btn">Explore</a></p>
			</div>
			<!-- End Column 1 -->

			<!-- Start Column 2 -->
			<?php while ($row = mysqli_fetch_assoc($product_data)) { ?>
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
					<a class="product-item" href="cart.php">
						<img src="admin/product-image/<?php echo $row['image']; ?>" class="img-fluid product-thumbnail"
							style="height:261px; width:261px;">
						<h3 class="product-title"><?php echo $row['name']; ?></h3>
						<strong class="product-price">$<?php echo $row['amount']; ?>.00</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
			<?php } ?>
			<!-- End Column 2 -->
		</div>
	</div>
</div>
<!-- End Product Section -->



<!-- Start Testimonial Slider -->
<div class="testimonial-section before-footer-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 mx-auto text-center">
				<h2 class="section-title">Testimonials</h2>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="testimonial-slider-wrap text-center">

					<div id="testimonial-nav">
						<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
						<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
					</div>

					<div class="testimonial-slider">

						<?php while ($row = mysqli_fetch_assoc($testimonials)) { ?>
							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<i>
												<blockquote class="mb-5">
													<p>&ldquo;<?php echo $row['description']; ?>&rdquo;</p>
												</blockquote>
											</i>

											<div class="author-info">
												<div class="author-pic">
													<img src="admin/team-images/<?php echo $row['image']; ?>"
														alt="<?php echo $row['name']; ?>" class="img-fluid">
												</div>
												<h3 class="font-weight-bold"><?php echo $row['name']; ?></h3>
												<span
													class="position d-block mb-3"><?php echo $row['designation']; ?>.</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Testimonial Slider -->



<?php
include_once 'footer.php';

?>