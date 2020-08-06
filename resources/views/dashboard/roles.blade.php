@extends('layouts.dashboard')

@section('content')
<div class="portlet light bordered form-fit">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase">{{ $title }}</span>
            
        </div>
    </div>

    <div class="portlet-body">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <th><center>#</center></th>
                        <th><center>Rol</center></th>
                        <th><center>Requerimiento</center></th>
                    </thead>
                    <tbody>
                        @php
                            $cont = 0;
                        @endphp
                        @foreach ($roles as $rol)
                            @php
                                $cont++;
                            @endphp
                            <tr>
                                <td><center>{{ $cont }}</center></td>
                                <td><center>{{ $rol->name }}</center></td>
                                <td><center>{{ $rol->request }} Referidos</center></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><center>Tu rol actual es: {{ Auth::user()->rol->name }} </center></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop