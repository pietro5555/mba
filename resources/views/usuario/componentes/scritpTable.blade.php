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

        function editNote($id) {
       // var id  = $(event).data("id");
        var id = $id;
        var route = $("#"+$id).attr('data-route');
        console.log('Hola',id);
        $('#titleError').text('');
        $('#descriptionError').text('');

        $.ajax({
        url: route,
        type: 'GET',
        success: function(response) {
           console.log(response);
                $("#note_id").val(response.note_id);
                $("#title").val(response.title);
                $("#description").val(response.content);
                $("#modal-edit-note").modal('show');
        }
        });
    }
    function showNote($id) {
       // var id  = $(event).data("id");
        var id = $id;
        var route = $("#"+$id).attr('data-route');
        $.ajax({
        url: route,
        type: 'GET',
        success: function(response) {
           console.log(response);
                $("#note_id_show").val(response.note_id);
                $("#title_show").val(response.title);
                $("#description_show").val(response.content);
                $("#modal-show-note").modal('show');
        }
        });
    }

    function deleteNote($id){
            var route = "/admin/user/note/delete/"+$id;
            $.ajax({
                url:route,
                type:'GET',
                success:function(response){
                    $("#msj-error-ajax").css('display', 'none');
                    $("#msj-success-text").html("La nota ha sido eliminada con éxito");
                    $("#msj-success-ajax").css('display', 'block');
                    $("#anotaciones_section").html(response);
                }
            });
        }
</script>
@endpush
