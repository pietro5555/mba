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
<script type="text/javascript">
     function responderTicket($id){
            var route = $("#"+$id).attr('data-route');
            $.ajax({
                url:route,
                type:'GET',
                success:function(response){
                    $("#ticket_id").val(response.id);
                    $("#tipo option[value="+response.tipo+"]").attr("selected", true);
                    $("#titulo").val(response.titulo);
                    CKEDITOR.instances["comentario"].setData(response.comentario);
                    $("#modal-ticket-response").modal("show");
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

        <div class="col-md-12 ticket-box"><h4 class="white">Tickets/Soporte</h4></div>

        <div class="box" style="margin-top: 100px; border-radius:10px!important; background:#2f343a!important;">
            <div class="box-body">
                <div style="float:right;">
                    <a href="{{route('soporte.tickets.solved')}}" class="btn btn-info"><i class="fas fa-ticket-alt"></i> Ver tickets resueltos</a>
                    <a href="{{route('soporte.academy')}}" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Menú de Soporte</a>
                </div>
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
                            @foreach($tickets as $ticket)
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
                                        @if(!is_null($ticket->support))
                                            @if($ticket->support->status == 1)
                                            <a href="javascript:void(0)" class="btn btn-warning">Respondida</a>
                                           <a href="{{ route('admin.soporte.close.ticket', $ticket->id) }}" class="btn btn-danger">Cerrar</a>
                                            @else
                                             <a href="javascript:void(0)" class="btn btn-success" data-route="{{ route('admin.soporte.ticket.edit', $ticket->id) }}" id="{{$ticket->id}}" onclick="responderTicket(this.id);">Comentar</a>
                                             <a href="{{ route('admin.soporte.close.ticket', $ticket->id) }}" class="btn btn-danger">Cerrar</a>
                                             @endif
                                            @else
                                            <a href="javascript:void(0)" class="btn btn-success" data-route="{{ route('admin.soporte.ticket.edit', $ticket->id) }}" id="{{$ticket->id}}" onclick="responderTicket(this.id);">Comentar</a>
                                             <a href="{{ route('admin.soporte.close.ticket', $ticket->id) }}" class="btn btn-danger">Cerrar</a>
                                            @endif
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                @else
                    <h3 class="white">No existen tickets generados...</h3>
                @endif
    </div>
    </div>
    </div>

    @if(!$tickets->isEmpty())
    @include('soporte.components.modal_response_ticket')

    @endif
    @endsection