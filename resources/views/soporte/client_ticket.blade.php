@extends('layouts.dashboardnew')

@push('script')
   <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready( function () {
    $('#mytable').DataTable( {
            responsive: true,
            "oLanguage": {
              "sSearch": "Buscar"
        }
    });
});
</script>
<script>
        function editarTicket($id){
			var route = $("#"+$id).attr('data-route');
 			$.ajax({
	            url:route,
	            type:'GET',
	            success:function(response){
	                $("#ticket_id").val(response.id);
                    $("#tipo option[value="+response.tipo+"]").attr("selected", true);
	                $("#titulo").val(response.titulo);
                 	CKEDITOR.instances["comentario"].setData(response.comentario);
	                $("#modal-ticket-edit").modal("show");
	            }
	        });
		}
        function showTicket($id){
			var route = $("#"+$id).attr('data-route');
 			$.ajax({
	            url:route,
	            type:'GET',
	            success:function(response){
	                $("#ticket_id").val(response.id);
                    $("#tipo_edit").val(response.tipo);
	                $("#titulo_edit").val(response.titulo);
                 	CKEDITOR.instances["comentario_edit"].setData(response.comentario);
                     $("#archivo_edit").val(response.archivo);
	                $("#modal-ticket-show").modal("show");
	            }
	        });
		}
    </script>

@endpush

@section('content')
<div class="col-md-12">
        @if (Session::has('msj-exitoso'))
        <div class="alert alert-success">
            <strong>{{ Session::get('msj-exitoso') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (Session::has('msj-erroneo'))
        <div class="alert alert-danger">
            <strong>{{ Session::get('msj-erroneo') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <br><br><br>
        <div class="col-md-12 ticket-box"><h4 class="white">Mis tickets</h4></div><br><br><br>
        <div style="float:right;">
                <a href="{{route('soporte.tickets')}}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Crear ticket</a>
                <a href="{{route('soporte.academy')}}" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Volver al menú</a>
        </div>

        <div class="box" style="margin-top: 100px; border-radius:10px!important; background:#2f343a!important;">
            <div class="box-body">
                @if(!$tickets->isEmpty())
                <table  id="mytable" class="table" style="width: 100%!important;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Tipo Ticket</th>
                            <th>Título</th>
                            <th>Soporte</th>
                            <th>Estado</th>
                            <th>Opción</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                    <td class="text-center white">{{$ticket->id}}</td>
                                    <td class="text-center white">{{date('d/m/Y', strtotime($ticket->fecha))}}</td>
                                    @if($ticket->tipo == 'General')
                                    <td class="text-center white">Consulta General</td>
                                    @else
                                    <td class="text-center white">{{$ticket->tipo}}</td>
                                    @endif
                                    <td class="text-center white">{{$ticket->titulo}}</td>
                                    <td class="text-center white">{{$ticket->soporte}}</td>
                                    <td class="text-center white">{{$ticket->status}}</td>
                                    <td class="text-center white">
                                        <a href="javascript:void(0)" data-route="{{ route('admin.soporte.ticket.edit', $ticket->id) }}" id="{{$ticket->id}}" onclick="editarTicket(this.id);" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-success" data-route="{{ route('admin.soporte.ticket.edit', $ticket->id) }}" id="{{$ticket->id}}" onclick="showTicket(this.id);"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('admin.soporte.delete.ticket', $ticket->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                @else
                <h3 class="white">Usted no posee tickets generados.</h3>
                @endif
    </div>
    </div>
    </div>
    @if(!$tickets->isEmpty())
    @include('soporte.components.modal_edit_ticket')
    @include('soporte.components.modal_show_ticket')
    @endif
    @endsection
