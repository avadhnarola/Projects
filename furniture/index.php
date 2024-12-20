<?php
include_once 'admin/db.php';
include_once 'header.php';

$product_data = mysqli_query($conn, "select * from product ORDER BY p_id DESC limit 0,3");
$blog_data = mysqli_query($conn, "select * from blog ORDER BY b_id DESC limit 0,3");
$service_data = mysqli_query($conn, "select * from service limit 0,4");
$testimonials = mysqli_query($conn, "SELECT team.t_id, team.name, designation.name AS designation, team.description, team.image FROM team INNER JOIN designation ON team.designation = designation.d_id");




?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
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

<!-- Start Product Section -->
<div class="product-section">
	<div class="container">
		<div class="row">

			<!-- Start Column 1 -->
			<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
				<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
				<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
					velit imperdiet dolor tempor tristique. </p>
				<p><a href="shop.html" class="btn">Explore</a></p>
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

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6">
				<h2 class="section-title">Why Choose Us</h2>
				<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit
					imperdiet dolor tempor tristique.</p>
				<div class="row my-5">
					<?php while ($row = mysqli_fetch_assoc($service_data)) { ?>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="admin/service-images/<?php echo $row['image']; ?>" alt="Image"
										class="imf-fluid" style="height:36px; width:38px;">
								</div>
								<h3><?php echo $row['title']; ?></h3>
								<p><?php echo $row['description']; ?></p>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>

			<div class="col-lg-5">
				<div class="img-wrap">
					<img src="admin/blog-images/pexels-fotoaibe-1571460.jpg" alt="Image" class="img-fluid"
						style="width:451px; height: 516px;">
				</div>
			</div>

		</div>
	</div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-7 mb-5 mb-lg-0">
				<div class="imgs-grid">
					<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
					<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
					<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
				</div>
			</div>
			<div class="col-lg-5 ps-lg-5">
				<h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
				<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam
					ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant
					morbi tristique senectus et netus et malesuada</p>

				<ul class="list-unstyled custom-list my-4">
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
				</ul>
				<p><a herf="#" class="btn">Explore</a></p>
			</div>
		</div>
	</div>
</div>
<!-- End We Help Section -->

<!-- Start Popular Product -->
<div class="popular-product">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/product-1.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Nordic Chair</h3>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/product-2.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Kruzo Aero Chair</h3>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/product-3.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Ergonomic Chair</h3>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- End Popular Product -->

<!-- Start Testimonial Slider -->
<div class="testimonial-section">
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

<!-- Start Blog Section -->
<div class="blog-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-6">
				<h2 class="section-title">Recent Blog</h2>
			</div>
			<div class="col-md-6 text-start text-md-end">
				<a href="#" class="more">View All Posts</a>
			</div>
		</div>

		<div class="row">
			<?php while ($row = mysqli_fetch_assoc($blog_data)) {
				// Convert date from database format to desired format
				$formattedDate = date("M d, Y", strtotime($row['date']));
				?>
				<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="admin/blog-images/<?php echo $row['image']; ?>"
								alt="Image" class="img-fluid" style="height: 246px; width: 356px;"></a>
						<div class="post-content-entry">
							<h3><a href="#"><?php echo $row['title']; ?></a></h3>
							<div class="meta">
								<span>by <a href="#"><?php echo $row['name']; ?></a></span>
								<span>on <a href="#"><?php echo $formattedDate; ?></a></span>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>
</div>
<!-- End Blog Section -->

<?php
include_once 'footer.php';

?>