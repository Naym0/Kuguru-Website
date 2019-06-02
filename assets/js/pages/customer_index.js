$(document).ready(() => {
	// ? datatable
	const datatable = $('.customer-orders-table').DataTable({
		ajax: {
			type: 'GET',
			url: `${baseURL}/customer/get_all_orders_json`,
			dataSrc: ''
		},
		initComplete() {
			// ? show table if not empty
			if (datatable.data().any()) {
				$('.customer-orders-table')
					.closest('.block-content')
					.removeClass('d-none');
				datatable.columns.adjust().draw();
				$('.normal-message')
					.removeClass('d-none')
					.siblings()
					.addClass('d-none');
			} else {
				$('.empty-message')
					.removeClass('d-none')
					.siblings()
					.addClass('d-none');
			}
		},
		autoWidth: false,
		columns: [
			{ data: 'order_id_title' },
			{ data: 'location_name' },
			{ data: 'collection_date' },
			{ data: 'product_units' },
			{ data: 'created_at' },
			// { data: 'processed_at' },
			// { data: 'employee_last_name' },
			{ data: 'status' },
			{ data: 'actions' }
		],
		columnDefs: [{ targets: [6], searchable: false, orderable: false }],
		scrollX: true
	});

	$(window).resize(() => {
		datatable.columns.adjust().draw();
	});
});
