@extends('layouts.dashboardnew')

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
</script>
@endpush

@section('content')
<div class="col-md-12">
        <div class="col-md-12 ticket-box"><h4 class="white">Tickets/Resueltos</h4></div>
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
    @endsection