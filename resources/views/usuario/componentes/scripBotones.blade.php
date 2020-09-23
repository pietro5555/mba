@push('script')
<script>
	$(document).ready(function () {
		$('#mytable').DataTable({
			dom: 'flBrtip',
			responsive: true,
			"oLanguage": {
                      "sSearch": "Buscar"
                },
			buttons: [
				'csv', 'pdf'
			]
		});
	});

	$(document).ready(function () {
		$('#mytable2').DataTable({
			dom: 'flBrtip',
			responsive: true,
			"oLanguage": {
                      "sSearch": "Buscar"
                },
			buttons: [
				'csv', 'pdf'
			]
		});
	});

	$(document).ready(function () {
		$('#mytable3').DataTable({
			dom: 'flBrtip',
			responsive: true,
			"oLanguage": {
                      "sSearch": "Buscar"
                },
			buttons: [
				'csv', 'pdf'
			]
		});
	});
</script>
@endpush