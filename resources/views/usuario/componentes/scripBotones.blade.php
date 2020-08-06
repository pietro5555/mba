@push('script')
<script>
	$(document).ready(function () {
		$('#mytable').DataTable({
			dom: 'flBrtip',
			responsive: true,
			buttons: [
				'csv', 'pdf'
			]
		});
	});
</script>
@endpush