$(document).ready(() => {
	// ? datatable
	const datatable = $('.orders-table').DataTable({
		ajax: {
			type: 'GET',
			url: `${baseURL}/employee/get_all_location_orders`,
			dataSrc: ''
		},
		autoWidth: false,
		columns: [
			{ data: 'order_id_title' },
			{ data: 'collection_date' },
			{ data: 'product_units' },
			{ data: 'created_at' },
			{ data: 'processed_at' },
			{ data: 'employee_last_name' },
			{ data: 'status' },
			{ data: 'actions' }
		],
		columnDefs: [{ targets: [4], searchable: false, orderable: false }],
		scrollX: true
	});

	$(window).resize(() => {
		datatable.columns.adjust().draw();
	});
});
