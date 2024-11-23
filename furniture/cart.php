<?php
include_once 'header.php';
$product = mysqli_query($conn, "select * from product");
?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Cart</h1>
				</div>
			</div>
			<div class="col-lg-7"></div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section before-footer-section">
	<div class="container">
		<div class="row mb-5">
			<form class="col-md-12" method="post">
				<div class="site-blocks-table">
					<table class="table">
						<thead>
							<tr>
								<th class="product-thumbnail">Image</th>
								<th class="product-name">Product</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Quantity</th>
								<th class="product-total">Total</th>
								<th class="product-remove">Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_assoc($product)) { ?>
								<tr>
									<td class="product-thumbnail">
										<img src="admin/product-image/<?php echo $row['image']; ?>" alt="Image" class="img-fluid" style="height:160px; width:160px;">
									</td>
									<td class="product-name">
										<h2 class="h5 text-black"><?php echo $row['name']; ?></h2>
									</td>
									<td class="product-price" data-price="<?php echo $row['amount']; ?>">$<?php echo $row['amount']; ?></td>
									<td>
										<div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
											<div class="input-group-prepend">
												<button class="btn btn-outline-black decrease" type="button">&minus;</button>
											</div>
											<input type="text" class="form-control text-center quantity" value="1" readonly>
											<div class="input-group-append">
												<button class="btn btn-outline-black increase" type="button">&plus;</button>
											</div>
										</div>
									</td>
									<td class="product-total">$<?php echo $row['amount']; ?></td>
									<td><a href="#" class="btn btn-black btn-sm remove">X</a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</form>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="row mb-5">
					<div class="col-md-6 mb-3 mb-md-0">
						<button class="btn btn-black btn-sm btn-block">Update Cart</button>
					</div>
					<div class="col-md-6">
						<a class="btn btn-outline-black btn-sm btn-block" href="shop.php">Continue Shopping</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label class="text-black h4" for="coupon">Coupon</label>
						<p>Enter your coupon code if you have one.</p>
					</div>
					<div class="col-md-8 mb-3 mb-md-0">
						<input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
					</div>
					<div class="col-md-4">
						<button class="btn btn-black" style="width:180px;">Apply Coupon</button>
					</div>
				</div>
			</div>
			<div class="col-md-6 pl-5">
				<div class="row justify-content-end">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12 text-right border-bottom mb-5">
								<h3 class="text-black h4 text-uppercase">Cart Totals</h3>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<span class="text-black">Subtotal</span>
							</div>
							<div class="col-md-6 text-right">
								<strong class="text-black" id="subtotal">$0.00</strong>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col-md-6">
								<span class="text-black">Total</span>
							</div>
							<div class="col-md-6 text-right">
								<strong class="text-black" id="total">$0.00</strong>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.querySelectorAll('.increase, .decrease').forEach(button => {
		button.addEventListener('click', function () {
			const quantityInput = this.closest('.quantity-container').querySelector('.quantity');
			const productRow = this.closest('tr');
			const priceElement = productRow.querySelector('.product-price');
			const totalElement = productRow.querySelector('.product-total');

			let quantity = parseInt(quantityInput.value);
			const price = parseFloat(priceElement.getAttribute('data-price'));

			if (this.classList.contains('increase')) {
				quantity++;
			} else if (this.classList.contains('decrease')) {
				quantity--;
				if (quantity <= 0) {
					productRow.remove();
					updateCartTotal();
					return;
				}
			}

			quantityInput.value = quantity;
			totalElement.textContent = `$${(quantity * price).toFixed(2)}`;

			updateCartTotal();
		});
	});

	document.querySelectorAll('.remove').forEach(button => {
		button.addEventListener('click', function (e) {
			e.preventDefault();

			// Show confirmation popup
			if (confirm("Are you sure you want to remove this item from your cart?")) {
				const productRow = this.closest('tr');
				productRow.remove();
				updateCartTotal();
			}
		});
	});

	function updateCartTotal() {
		let subtotal = 0;

		document.querySelectorAll('.product-total').forEach(totalElement => {
			const productTotal = parseFloat(totalElement.textContent.replace('$', ''));
			subtotal += productTotal;
		});

		document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
		document.getElementById('total').textContent = `$${subtotal.toFixed(2)}`;
	}
</script>

<?php
include_once 'footer.php';
?>
