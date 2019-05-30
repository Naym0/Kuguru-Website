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
			{ data: 'employee_email' },
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
		$('input[name=to_date]').prop('min', _this.val());
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
			_this[0].reset();
			datatable.ajax.reload();
			datatable.columns.adjust().draw();
			const notificationIcon = res.ok
				? 'fa fa-info mt-10'
				: 'fa fa-warning mt-10';
			const notificationType = res.ok ? 'success' : 'danger';
			notify(notificationIcon, notificationType, res.msg);
		});
	});
});
