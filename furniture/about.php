<?php
include_once 'header.php';
$service_data = mysqli_query($conn, "select * from service limit 0,4");
// $team_data = mysqli_query($conn, "select * from team limit 0,4");
$team_data = mysqli_query($conn, "SELECT team.t_id, team.name, designation.name AS designation, team.description, team.image FROM team INNER JOIN designation ON team.designation = designation.d_id limit 0,4");

?>
<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>About Us</h1>
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
		<div class="row justify-content-between align-items-center">
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

<!-- Start Team Section -->
<div class="untree_co-section">
	<div class="container">

		<div class="container mt-5 text-center mb-5">
			<h3 class="section-title">Our Team</h3>
			<div class="d-flex justify-content-center" style="margin-top:-10px;">
				<hr width="100px" class="text-center">
			</div>
		</div>

		<div class="row">

			<!-- Start Column 1 -->
			<?php while ($row = mysqli_fetch_assoc($team_data)) { ?>
				<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
					<img src="admin/team-images/<?php echo $row['image']; ?>" class="img-fluid mb-5">
					<h3 clas><a href="#"><span class=""><?php echo $row['name']; ?></span></a></h3>
					<span class="d-block position mb-4"><?php echo $row['designation']; ?></span>
					<p><?php echo $row['description']; ?></p>
					<p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a>
					</p>
				</div>
			<?php } ?>
			<!-- End Column 1 -->

			<!-- Start Column 2 -->
			<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
				<img src="images/person_2.jpg" class="img-fluid mb-5">

				<h3 clas><a href="#"><span class="">Jeremy</span> Walker</a></h3>
				<span class="d-block position mb-4">CEO, Founder, Atty.</span>
				<p>Separated they live in.
					Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
				</p>
				<p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a>
				</p>

			</div>
			<!-- End Column 2 -->

			<!-- Start Column 3 -->
			<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
				<img src="images/person_3.jpg" class="img-fluid mb-5">
				<h3 clas><a href="#"><span class="">Patrik</span> White</a></h3>
				<span class="d-block position mb-4">CEO, Founder, Atty.</span>
				<p>Separated they live in.
					Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
				</p>
				<p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a>
				</p>
			</div>
			<!-- End Column 3 -->

			<!-- Start Column 4 -->
			<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
				<img src="images/person_4.jpg" class="img-fluid mb-5">

				<h3 clas><a href="#"><span class="">Kathryn</span> Ryan</a></h3>
				<span class="d-block position mb-4">CEO, Founder, Atty.</span>
				<p>Separated they live in.
					Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
				</p>
				<p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a>
				</p>


			</div>
			<!-- End Column 4 -->



		</div>
	</div>
</div>
<!-- End Team Section -->



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

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
												quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
												velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
												tristique senectus et netus et malesuada fames ac turpis egestas.
												Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Maria Jones</h3>
											<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- END item -->

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
												quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
												velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
												tristique senectus et netus et malesuada fames ac turpis egestas.
												Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Maria Jones</h3>
											<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- END item -->

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
												quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
												velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
												tristique senectus et netus et malesuada fames ac turpis egestas.
												Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Maria Jones</h3>
											<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- END item -->

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