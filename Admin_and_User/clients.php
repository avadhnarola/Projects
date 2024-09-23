<?php
include_once 'db.php';

$clientData = mysqli_query($conn, "select * from client limit 12");
?>

<?php include_once 'f-header.php'; ?>

<section class="page-heading wow fadeIn" data-wow-duration="1.5s"
	style="background-image: url(files/images/01-heading.jpg)">
	<div class="container">
		<div class="page-name">
			<h1>Our Clients</h1>
			<span>Lovely layout of heading</span>
		</div>
	</div>
</section>

<section class="call-to-action-1">
	<div class="container">
		<h4>Around 2,100 new user this month on YOM</h4>
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

<?php include_once 'f-footer.php'; ?>