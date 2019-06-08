<!-- Page Content -->
<div class="content">
	<div class="block block-bordered" id="add-location-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">Add new location</h3>
			<div class="block-options">
				<button type="button" title="Toggle content" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
			</div>
		</div>
		<div class="block-content">
			<form id="add-location-form" method="post">
				<div class="row items-push-2x">
					<div class="form-group col-md-6">
						<label>Location name</label>
						<input type="text" name="location_name" class="form-control location_name" required>
					</div>
					<div class="form-group col-md-6">
						<label>Cell contact</label>
						<input type="text" name="phone_number" placeholder="07xxxxxxxx" class="form-control phone_number mask-phone-number" required>
					</div>
					<div class="form-group col-md-6">
						<label>Email contact</label>
						<input type="email" name="email" class="form-control email" required>
					</div>
					<div class="form-group col-md-6 d-flex align-items-baseline flex-column">
						<input type="submit" value="Add location" class="btn btn-primary mt-auto">
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Table block -->
	<div class="block block-bordered" id="list-locations-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">Location records</h3>
			<div class="block-options">
				<button type="button" title="Toggle content" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
			</div>
		</div>
		<div class="block-content">
			<table class="table table-bordered table-striped table-vcenter dataTable locations-table">
				<thead class="thead-dark">
					<th>Location name</th>
					<th>Cell contact</th>
					<th>Email contact</th>
					<th>Status</th>
					<th>Actions</th>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-- END Page Content -->

<!-- Edit location modal -->
<div class="modal" id="edit-location-modal" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<form method="post" id="edit-location-form">
				<div class="block block-themed block-transparent mb-0" id="edit-location-block">
					<div class="block-header bg-primary-dark">
						<h3 class="block-title">Edit location</h3>
						<div class="block-options">
							<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
								<i class="si si-close"></i>
							</button>
						</div>
					</div>
					<div class="block-content">
						<input type="hidden" name="location_id" class="location_id">
						<div class="row items-push-2x">
							<div class="form-group col-md-6">
								<label>Location name</label>
								<input type="text" name="location_name" class="form-control location_name" required>
							</div>
							<div class="form-group col-md-6">
								<label>Cell contact</label>
								<input type="text" name="phone_number" placeholder="07xxxxxxxx" class="form-control phone_number mask-phone-number" required>
							</div>
							<div class="form-group col-md-6">
								<label>Email contact</label>
								<input type="email" name="email" class="form-control email" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" value="Submit changes" class="btn btn-primary">Submit changes</button>
					<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">
						<i class="si si-close mr-5"></i>Cancel changes
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END Edit location modal -->
