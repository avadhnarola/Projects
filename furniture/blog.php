<?php
include_once 'header.php';
$blog_data = mysqli_query($conn, "select * from blog ORDER BY b_id DESC");
$testimonials = mysqli_query($conn, "SELECT team.t_id, team.name, designation.name AS designation, team.description, team.image FROM team INNER JOIN designation ON team.designation = designation.d_id");



?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Blog</h1>
					<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
						vulputate velit imperdiet dolor tempor tristique.</p>
					<p><a href="shop.php" class="btn btn-secondary me-2">Shop Now</a><a href="#"
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



<!-- Start Blog Section -->
<div class="blog-section">
	<div class="container">

		<div class="row">
			<?php while ($row = mysqli_fetch_assoc($blog_data)) {
				// Convert date from database format to desired format
				$formattedDate = date("M d, Y", strtotime($row['date']));
				?>
				<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-5">
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