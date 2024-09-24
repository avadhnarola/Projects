<?php

$offerData3 = mysqli_query($conn, "select * from offers limit 3");
$offerData6 = mysqli_query($conn, "select * from offers ORDER BY o_id DESC LIMIT 3");
$themeData = mysqli_query($conn, "select * from abouttheme ORDER BY a_id DESC LIMIT 1");


?>

<?php include_once 'f-header.php'; ?>

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
			<div class="right-image hidden-xs"><img src="admin/images/<?php echo $row['a_image']; ?>" alt="image"
					style="width:100%; height:100%;"></div>
		<?php } ?>
	</div>
</section>

<?php include_once "f-footer.php"; ?>