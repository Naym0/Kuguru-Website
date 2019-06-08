<!-- Page Content -->
<div class="content">
	<!-- Table block -->
	<div class="block block-bordered" id="list-orders-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">Orders</h3>
			<div class="block-options">
				<button type="button" title="Toggle content" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
			</div>
		</div>
		<div class="block-content">
			<table class="table table-bordered table-striped table-vcenter dataTable orders-table">
				<thead class="thead-dark">
					<th>order id</th>
					<th>Pick up date</th>
					<th>Units</th>
					<th>Created at</th>
					<th>Processed at</th>
					<th>Processed by</th>
					<th>Status</th>
					<th>Actions</th>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-- END Page Content -->

<!-- Order details modal -->
<div class="modal fade in show" id="order-details-modal" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="block block-themed block-transparent mb-0">
				<div class="block-header bg-primary-dark">
					<h3 class="block-title">ORDER DETAILS: <span class="text-info order_id_title"></span></h3>
					<div class="block-options">
						<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
							<i class="si si-close"></i>
						</button>
					</div>
				</div>
				<div class="block-content">
					<div class="row">
						<div class="col-md-6">
							<p class="lead">
								Status:
								<span class="text-info status text-uppercase"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="">
								Customer:
								<span class="text-info customer_email"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="">
								Pickup location:
								<span class="text-info location_name"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="">
								Product units:
								<span class="text-info product_units"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="">
								Created on:
								<span class="text-info created_at"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="">
								Processed on:
								<span class="text-info processed_at"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="">
								Processed by:
								<span class="text-info employee_last_name"></span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">
					<i class="si si-close mr-5"></i>Close
				</button>
			</div>
		</div>
	</div>
</div>
<!--END Order details modal -->
