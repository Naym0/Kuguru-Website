$(document).ready(() => {
	// ? datatable
	const datatable = $('.employees-table').DataTable({
		ajax: {
			type: 'GET',
			url: `${baseURL}/dashboard/get_employees_json`,
			dataSrc: ''
		},
		autoWidth: false,
		columns: [
			{ data: 'full_name' },
			{ data: 'email' },
			{ data: 'location_name' },
			{ data: 'role' },
			{ data: 'from_date' },
			{ data: 'end_date' },
			{ data: 'status' },
			{ data: 'actions' }
		],
		columnDefs: [{ targets: [7], searchable: false, orderable: false }],
		scrollX: true
	});

	$(window).resize(() => {
		datatable.columns.adjust().draw();
	});

	// ? set to date constraint
	$('input[name=from_date]').on('change', event => {
		const _this = $(event.target);
		$('input[name=end_date]').datepicker(
			'setStartDate',
			_this.datepicker('getDate')
		);
	});

	// ? datepicker
	$('.datepicker').datepicker({
		format: 'dd-MM-yyyy',
		autoclose: true,
		clearBtn: true
	});

	// ? add employee
	$('#add-employee-form').submit(event => {
		event.preventDefault();
		const _this = $(event.target);
		const dataTarget = `${baseURL}dashboard/add_employee`;
		const dataToSend = _this.serializeArray();
		Codebase.blocks('#add-employee-block', 'state_loading');
		ajaxComm(dataTarget, dataToSend, 'json').done(res => {
			Codebase.blocks('#add-employee-block', 'state_normal');
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
	$('.employees-table').on('click', '.btn-edit', event => {
		const _this = $(event.target);
		const tr = _this.closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		// Fill form with details
		Object.keys(rowData).forEach(fieldName => {
			$('#edit-employee-form')
				.find(`.${fieldName}`)
				.val(rowData[fieldName]);
		});

		// ? Change date formats
		$('#edit-employee-form')
			.find(`.datepicker`)
			.each((index, el) => {
				const currentDate = $(el).val();
				const dateparts = currentDate.split('-');
				$(el).datepicker(
					'update',
					new Date(dateparts[0], dateparts[1] - 1, dateparts[2])
				);
			});
		// display modal
		$('#edit-employee-modal').modal({ backdrop: 'static' });
	});

	// ? on modal close reset form
	$('#edit-employee-modal').on('hide.bs.modal', () => {
		$('#edit-employee-form')[0].reset();
	});

	// ? edit form submit
	$('#edit-employee-form').submit(event => {
		event.preventDefault();
		const _this = $(event.target);
		const dataTarget = `${baseURL}dashboard/edit_employee`;
		const dataToSend = _this.serializeArray();
		Codebase.blocks('#edit-employee-block', 'state_loading');
		ajaxComm(dataTarget, dataToSend, 'json').done(res => {
			Codebase.blocks('#edit-employee-block', 'state_normal');
			if (res.ok) {
				_this[0].reset();
				datatable.ajax.reload();
				datatable.columns.adjust().draw();
				// ? close edit modal
				$('#edit-employee-modal').modal('hide');
			}
			const notificationIcon = res.ok
				? 'fa fa-info mt-10'
				: 'fa fa-warning mt-10';
			const notificationType = res.ok ? 'success' : 'danger';
			notify(notificationIcon, notificationType, res.msg);
		});
	});

	// ?  suspend employee
	$('.employees-table').on('click', '.btn-suspend', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const userId = rowData.user_id;

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
				text: 'Employee will not access the system',
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
						`${baseURL}dashboard/suspend_employee`,
						{ user_id: userId },
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

	// ?  unsuspend employee
	$('.employees-table').on('click', '.btn-unsuspend', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const userId = rowData.user_id;

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
				text: 'Employee will have access to the system',
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
						`${baseURL}dashboard/unsuspend_employee`,
						{ user_id: userId },
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
