<!-- Page Content -->
<div class="content">
	<div class="block block-bordered" id="add-employee-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">Add new employee</h3>
			<div class="block-options">
				<button type="button" title="Toggle content" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
			</div>
		</div>
		<div class="block-content">
			<form id="add-employee-form" method="post">
				<div class="row items-push-2x">
					<div class="form-group col-md-6">
						<label>First name</label>
						<input type="text" name="first_name" class="form-control first_name" required>
					</div>
					<div class="form-group col-md-6">
						<label>Last name</label>
						<input type="text" name="last_name" class="form-control last_name" required>
					</div>
					<div class="form-group col-md-6">
						<label>Email</label>
						<input type="email" name="email" class="form-control email" required>
					</div>
					<div class="form-group col-md-6">
						<label>Location of employ</label>
						<select name="location_id"  class="form-control location_id" required>
							<option value="">Select a location</option>
							<?php if(isset($locations) && !empty($locations)):?>
								<?php foreach($locations as $location): ?>
									<option value="<?= $location['location_id']?>"><?= $location['location_name']?></option>
								<?php endforeach; ?>
							<?php endif;?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Employee role</label>
						<select name="role"  class="form-control role" required>
							<option value="">Select an employee role</option>
							<option value="location manager">Location manager</option>
							<option value="personnel">Personnel</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>From date</label>
						<input type="date" name="from_date" class="form-control from_date"  required>
					</div>
					<div class="form-group col-md-6">
						<label>To date</label>
						<input type="date" name="to_date" min="<?= $this->time->get_now('Y-m-d');?>" class="form-control to_date" required>
					</div>
					<div class="form-group col-md-6 d-flex align-items-baseline flex-column">
						<input type="submit" value="Add employee" class="btn btn-primary mt-auto">
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Table block -->
	<div class="block block-bordered" id="list-employees-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">Employee records</h3>
			<div class="block-options">
				<button type="button" title="Toggle content" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
			</div>
		</div>
		<div class="block-content">
			<table class="table table-bordered table-striped table-vcenter dataTable employees-table">
				<thead class="thead-dark">
					<th>Full name</th>
					<th>Email</th>
					<th>Location</th>
					<th>Role</th>
					<th>From date</th>
					<th>End date</th>
					<th>Status</th>
					<th>Actions</th>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-- END Page Content -->
