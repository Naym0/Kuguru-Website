<!-- Page Content -->
<div class="content">
	<div class="block block-bordered" id="new-order-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">Make new Softa product order - <small class="text-danger">Prices to be discussed on collection</small></h3>
		</div>
		<div class="block-content">
			<form id="new-order-form" method="post">
				<div class="row items-push-2x">
					<div class="form-group col-md-6">
						<label>Number of crates</label>
						<input type="number" min='1' name="product_units" class="form-control product_units" required>
					</div>
					<div class="form-group col-md-6">
						<label>Pickup location</label>
						<select name="pickup_location" class="form-control location_id" required>
							<option value="">Select a location</option>
							<?php if (isset($locations) && !empty($locations)) : ?>
								<?php foreach ($locations as $location) : ?>
									<option value="<?= $location['location_id'] ?>"><?= $location['location_name'] ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Collection date</label>
						<input type="text" onkeypress="return false;" autocomplete="off" name="collection_date" class="form-control datepicker collection_date" placeholder="dd-MM-yyyy" required>
					</div>
					<div class="form-group col-md-6 d-flex align-items-baseline flex-column">
						<input type="submit" value="Submit new order" class="btn btn-primary mt-auto">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END Page Content -->
