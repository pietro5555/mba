@push('script')
<script>
   $(document).ready( function () {
			$('#mytable').DataTable( {
					responsive: true,
					"oLanguage": {
                      "sSearch": "Buscar"
                }
			});
		});

   $(document).ready( function () {
			$('#mytable2').DataTable( {
					responsive: true,
					"oLanguage": {
                      "sSearch": "Buscar"
                }
			});
		});

    $(document).ready( function () {
			$('#mytable3').DataTable( {
					responsive: true,
					"oLanguage": {
                      "sSearch": "Buscar"
                }
			});
		});
</script>
@endpush