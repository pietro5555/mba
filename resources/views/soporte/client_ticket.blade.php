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
        <div class="col-md-12 ticket-box"><h4 class="white">Mis tickets</h4></div>
        <div class="box" style="margin-top: 100px; border-radius:10px!important; background:#2f343a!important;">
            <div class="box-body">
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
                            <tr>
                                    <td class="text-center white">01</td>
                                    <td class="text-center white">MM/DD/AAAA</td>
                                    <td class="text-center white">Tipo Ticket</td>
                                    <td class="text-center white">Título Ticket</td>
                                    <td class="text-center white">Soporte</td>
                                    <td class="text-center white">Abierto</td>
                                    <td class="text-center white">
                                        <a href="javascript:void(0)" id="" data-route="" onclick="editNote(this.id)" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-success" id="" data-route="" onclick="showNote(this.id)"><i class="fa fa-eye"></i></a>
                                    <a onclick="deleteNote();" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                            </tr>
                        </tbody>
                </table>
    </div>
    </div>
    </div>
    @endsection