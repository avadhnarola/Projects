<?php include_once 'admin/db.php';
include_once 'f-header.php';

$comment = mysqli_query($conn, "select * from comment ORDER BY c_id DESC limit 0,9");
$clientData = mysqli_query($conn, "select * from client limit 0,6");

?>

<section class="page-heading wow fadeIn" data-wow-duration="1.5s"
	style="background-image: url(files/images/01-heading.jpg)">
	<div class="container">
		<div class="page-name">
			<h1>About Us</h1>
			<span>Lovely layout of heading</span>
		</div>
	</div>
</section>

<section class="call-to-action-1">
	<div class="container">
		<h4>Why people are Using Yom Template</h4>
		<p class="col-md-10 col-md-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat quod
			voluptate consequuntur ad quasi, dolores obcaecati ex aliquid, dolor provident accusamus omnis dolorum
			ipsam. Voluptatem ipsum expedita, corporis facilis laborum asperiores nostrum! Amet porro numquam ratione
			temporibus quia dolorem sint lorem voluptates quasi mollitia.</p>
		<div class="buttons">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="border-btn"><a href="#">Learn More</a></div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="btn-black"><a href="#" style="display:flex; justify-content:center;">Buy This Theme</a>
				</div>
			</div>
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
							<div class="testimonials-post" style="height:250px">
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

<section class="team">
	<div class="container">
		<div class="section-heading">
			<h2 style="color:#272727;font-weight: 600;letter-spacing: 1px;">Meet The Team</h2>
			<div class="section-dec"></div>
		</div>
		<div class="col-md-4">
			<div class="team-member">
				<img src="files/images/01-team.jpg" alt="" height="350px" width="350px">
				<div class="team-content">
					<h3>Robert Imeri</h3>
					<span>Webdesigner</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt quis ullam explicabo facere
						numquam architecto.</p>
				</div>
				<div class="social-icons">
					<ul>
						<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-rss"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="team-member">
				<img src="files/images/02-team.jpg" alt="" height="350px" width="350px">
				<div class="team-content">
					<h3>Elizabeth Tharp</h3>
					<span>Manager</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt quis ullam explicabo facere
						numquam architecto.</p>
				</div>
				<div class="social-icons">
					<ul>
						<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-rss"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="team-member">
				<img src="files/images/03-team.jpg" alt="" height="350px" width="350px">
				<div class="team-content">
					<h3>Loretta Johnson</h3>
					<span>Marketing Agent</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt quis ullam explicabo facere
						numquam architecto.</p>
				</div>
				<div class="social-icons">
					<ul>
						<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-rss"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="clients">
	<div class="container">
		<div class="section-heading">
			<h2 style="color:#272727;font-weight:bold;">Our Clients</h2>
			<div class="section-dec"></div>
		</div>
		<?php while ($row = mysqli_fetch_assoc($clientData)) { ?>
			<div class="col-md-2 col-sm-4 col-xs-12">
				<div class="client-item">
					<a href="#"><img src="admin/images/<?php echo $row['c_image']; ?>" alt="" style="padding:0;"></a>
				</div>

			</div>
		<?php } ?>
</section>

<?php
include_once 'f-footer.php';

?>


<?php while ($row = mysqli_fetch_assoc($comment)) { ?>
	<ul class="coments-content">
		<li class="first-comment-item">
			<img src="files/images/01-author-comment.jpg" alt="">
			<span class="author-title"><a href="#"><?php echo $row['c_name']; ?></a></span>
			<span class="comment-date">10 May 2015 / <a href="#">Reply</a>
			</span>
			<p><?php echo $row['c_title']; ?></p>
		</li>
	</ul>
<?php } ?>