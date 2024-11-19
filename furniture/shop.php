<?php
include_once 'header.php';
include_once 'admin/db.php';

$product_data = mysqli_query($conn, "select * from product");


?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Shop Now</h1>
					<p class="mb-4">Get 50% discount on every product</p>
					<p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="shop.php"
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


<div class="container mt-5 text-center ">
	<h3>New Products</h3>
	<div class="d-flex justify-content-center" style="margin-top:-10px;">
		<hr width="100px" class="text-center">
	</div>
</div>
<div class="untree_co-section product-section before-footer-section">
	<div class="container">
		<div class="row">
			<?php while ($row = mysqli_fetch_assoc($product_data)) { ?>
				<!-- Start Column 1 -->
				<div class="col-12 col-md-4 col-lg-3 mb-5">
					<a class="product-item" href="#">
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
		</div>
	</div>
</div>


<?php
include_once 'footer.php';

?>