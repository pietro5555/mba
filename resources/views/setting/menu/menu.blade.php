@extends('layouts.dashboardnew')

@section('content')

<style>
    
    hr{
    border-top: 1px solid #555;
    }
</style>


<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		    <a class="btn btn-info btn-block" data-toggle="modal" data-target="#activos">Menu Activos</a>
		    <a class="btn btn-danger btn-block" data-toggle="modal" data-target="#inactivos">Menu Inactivos</a>
		    
		    {{-- Activos --}}
		    <h3 style="text-align:center;">Menu Activos</h3>
		    
		    <div class="col-md-12">
		        
		    <div class="col-md-3">
		    <h4>Inicio</h4>
		    Estatus: @if($activos['inicio']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Actualizar</h4>
		    Estatus: @if($activos['actualizar']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    
		    <div class="col-md-3">
		    <h4>Registro</h4>
		    Estatus: @if($activos['registro']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-2">
		    <h4>Registro Cliente</h4>
		    Estatus: @if($activos['registro_cliente']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    </div>
		    
		    
		    <div class="col-md-12">
		        <hr>
		    <div class="col-md-3">
		    <h4>Red de Usuarios</h4>
		    Estatus: @if($activos['red']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    
		    <div class="col-md-3">
		    <h4>Transacciones</h4>
		    Estatus: @if($activos['transacciones']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Billetera</h4>
		    Estatus: @if($activos['billetera']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    
		    <div class="col-md-3">
		    <h4>Calendario</h4>
		    Estatus: @if($activos['calendario']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    </div>
		    
		     <div class="col-md-12">
		        <hr>
		    <div class="col-md-3">
		    <h4>Informes</h4>
		    Estatus: @if($activos['informes']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		     <div class="col-md-3">
		    <h4>Prospeccion</h4>
		    Estatus: @if($activos['prospeccion']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Envio de Correos</h4>
		    Estatus: @if($activos['correos']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Tickets</h4>
		    Estatus: @if($activos['tickets']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    </div>
		    
		    
		    <div class="col-md-12">
		        <hr>
		    <div class="col-md-3">
		    <h4>Ranking</h4>
		    Estatus: @if($activos['ranking']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Tienda</h4>
		    Estatus: @if($activos['tienda']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Herramientas</h4>
		    Estatus: @if($activos['herramientas']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    </div>
		    
		    
		    
		     {{-- Inactivos --}}
		    
		    <div class="col-md-12">
		        <h3 style="text-align:center;">Menu Inactivos</h3>
		        <hr>
		    <div class="col-md-3">
		    <h4>Inicio</h4>
		    Estatus: @if($inactivos['inicio']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Actualizar</h4>
		    Estatus: @if($inactivos['actualizar']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    
		    <div class="col-md-3">
		    <h4>Registro</h4>
		    Estatus: @if($inactivos['registro']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-2">
		    <h4>Registro Cliente</h4>
		    Estatus: @if($inactivos['registro_cliente']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    </div>
		    
		    
		    <div class="col-md-12">
		        <hr>
		    <div class="col-md-3">
		    <h4>Red de Usuarios</h4>
		    Estatus: @if($inactivos['red']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    
		    <div class="col-md-3">
		    <h4>Transacciones</h4>
		    Estatus: @if($inactivos['transacciones']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Billetera</h4>
		    Estatus: @if($inactivos['billetera']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    
		    <div class="col-md-3">
		    <h4>Calendario</h4>
		    Estatus: @if($inactivos['calendario']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    </div>
		    
		     <div class="col-md-12">
		        <hr>
		    <div class="col-md-3">
		    <h4>Informes</h4>
		    Estatus: @if($inactivos['informes']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		     <div class="col-md-3">
		    <h4>Prospeccion</h4>
		    Estatus: @if($inactivos['prospeccion']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Envio de Correos</h4>
		    Estatus: @if($inactivos['correos']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Tickets</h4>
		    Estatus: @if($inactivos['tickets']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    </div>
		    
		    
		    <div class="col-md-12">
		        <hr>
		    <div class="col-md-3">
		    <h4>Ranking</h4>
		    Estatus: @if($inactivos['ranking']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Tienda</h4>
		    Estatus: @if($inactivos['tienda']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    
		    <div class="col-md-3">
		    <h4>Herramientas</h4>
		    Estatus: @if($inactivos['herramientas']->activo == 1) Activo @else Inactivo @endif
		    </div>
		    </div>
		    
		</div>
	</div>
</div>    

@include('setting/menu/activos')
@include('setting/menu/inactivos')
@endsection