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

	// ? order details modal
	$('.customer-orders-table').on('click', '.btn-view-more', event => {
		const _this = $(event.target);
		const tr = _this.closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		// Fill form with details
		Object.keys(rowData).forEach(fieldName => {
			$('#order-details-modal')
				.find(`.${fieldName}`)
				.text(rowData[fieldName]);
		});
		$('#order-details-modal').modal();
	});

	// ?  cancel order
	$('.customer-orders-table').on('click', '.btn-cancel-order', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const orderId = rowData.order_id;

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
				text: "You can't reverse this action",
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
						`${baseURL}customer/cancel_order`,
						{ order_id: orderId },
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
