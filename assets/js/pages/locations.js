$(document).ready(() => {
	// ? masked inputs
	$('.mask-phone-number').mask('0799999999');

	// ?  datatable
	const datatable = $('.locations-table').DataTable({
		ajax: {
			type: 'GET',
			url: `${baseURL}/dashboard/get_locations_json`,
			dataSrc: ''
		},
		autoWidth: false,
		columns: [
			{ data: 'location_name' },
			{ data: 'phone_number' },
			{ data: 'email' },
			{ data: 'status' },
			{ data: 'actions' }
		],
		columnDefs: [{ targets: [4], searchable: false, orderable: false }],
		scrollX: true
	});

	$(window).resize(() => {
		datatable.columns.adjust().draw();
	});

	// ?  add location
	$('#add-location-form').submit(event => {
		event.preventDefault();
		const _this = $(event.target);
		const dataTarget = `${baseURL}dashboard/add_location`;
		const dataToSend = _this.serializeArray();
		Codebase.blocks('#add-location-block', 'state_loading');
		ajaxComm(dataTarget, dataToSend, 'json').done(res => {
			Codebase.blocks('#add-location-block', 'state_normal');
			if (res.ok) {
				_this[0].reset();
				datatable.ajax.reload();
				datatable.columns.adjust().draw();
			}
			const notificationIcon = res.ok
				? 'fa fa-info mt-10'
				: 'fa fa-warning mt-10';
			const notificationType = res.ok ? 'success' : 'danger';
			notify(notificationIcon, notificationType, res.msg);
		});
	});

	// ? edit employe modal event
	$('.locations-table').on('click', '.btn-edit', event => {
		const _this = $(event.target);
		const tr = _this.closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		// Fill form with details
		Object.keys(rowData).forEach(fieldName => {
			$('#edit-location-form')
				.find(`.${fieldName}`)
				.val(rowData[fieldName]);
		});

		// display modal
		$('#edit-location-modal').modal({ backdrop: 'static' });
	});

	// ? on modal close reset form
	$('#edit-location-modal').on('hide.bs.modal', () => {
		$('#edit-location-form')[0].reset();
	});

	// ? save edit
	$('#edit-location-form').submit(event => {
		event.preventDefault();
		const _this = $(event.target);
		const dataTarget = `${baseURL}dashboard/edit_location`;
		const dataToSend = _this.serializeArray();
		Codebase.blocks('#edit-location-block', 'state_loading');
		ajaxComm(dataTarget, dataToSend, 'json').done(res => {
			Codebase.blocks('#edit-location-block', 'state_normal');
			if (res.ok) {
				_this[0].reset();
				datatable.ajax.reload();
				datatable.columns.adjust().draw();
				// ? close edit modal
				$('#edit-location-modal').modal('hide');
			}
			const notificationIcon = res.ok
				? 'fa fa-info mt-10'
				: 'fa fa-warning mt-10';
			const notificationType = res.ok ? 'success' : 'danger';
			notify(notificationIcon, notificationType, res.msg);
		});
	});

	// ? suspend location
	$('.locations-table').on('click', '.btn-suspend', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const locationId = rowData.location_id;

		// ? Get confirmation
		const toast = swal.mixin({
			buttonsStyling: false,
			customClass: {
				confirmButton: 'btn btn-lg btn-alt-success m-5',
				cancelButton: 'btn btn-lg btn-alt-danger m-5',
				input: 'form-control'
			}
		});
		toast
			.fire({
				title: 'Are you sure?',
				text: "Customers won't make orders to this location",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d26a5c',
				confirmButtonText: "Yes, I'm sure",
				html: false,
				preConfirm: () => {
					return new Promise(resolve => {
						setTimeout(() => {
							resolve();
						}, 50);
					});
				}
			})
			.then(result => {
				if (result.value) {
					ajaxComm(
						`${baseURL}dashboard/suspend_location`,
						{ location_id: locationId },
						'json'
					).done(res => {
						if (res.ok) {
							datatable.ajax.reload();
							datatable.columns.adjust().draw();
						}
						const notificationIcon = res.ok
							? 'fa fa-info mt-10'
							: 'fa fa-warning mt-10';
						const notificationType = res.ok ? 'success' : 'danger';
						notify(notificationIcon, notificationType, res.msg);
					});
				}
			});
	});

	// ? suspend location
	$('.locations-table').on('click', '.btn-unsuspend', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const locationId = rowData.location_id;

		// ? Get confirmation
		const toast = swal.mixin({
			buttonsStyling: false,
			customClass: {
				confirmButton: 'btn btn-lg btn-alt-success m-5',
				cancelButton: 'btn btn-lg btn-alt-danger m-5',
				input: 'form-control'
			}
		});
		toast
			.fire({
				title: 'Are you sure?',
				text: 'Customers will make orders to this location',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d26a5c',
				confirmButtonText: "Yes, I'm sure",
				html: false,
				preConfirm: () => {
					return new Promise(resolve => {
						setTimeout(() => {
							resolve();
						}, 50);
					});
				}
			})
			.then(result => {
				if (result.value) {
					ajaxComm(
						`${baseURL}dashboard/unsuspend_location`,
						{ location_id: locationId },
						'json'
					).done(res => {
						if (res.ok) {
							datatable.ajax.reload();
							datatable.columns.adjust().draw();
						}
						const notificationIcon = res.ok
							? 'fa fa-info mt-10'
							: 'fa fa-warning mt-10';
						const notificationType = res.ok ? 'success' : 'danger';
						notify(notificationIcon, notificationType, res.msg);
					});
				}
			});
	});
});
