@extends('layouts.dashboardnew')

@section('content')
@push('style')
<style>
    .texto-central{
      text-align: center;
    }
  
    .formulario .checkbox label {
      display: inline-block;
      cursor: pointer;
      color: #000000;
      position: relative;
      padding: 5px 15px 5px 51px;
      font-size: 1em;
      border-radius: 5px;
      -webkit-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease; }
  
      .formulario .checkbox label:hover {
        background: rgba(000, 000, 000, 0.2); }
  
      .formulario .checkbox label:before {
        content: "";
        display: inline-block;
        width: 17px;
        height: 17px;
        position: absolute;
        left: 15px;
        border-radius: 50%;
        background: none;
        border: 3px solid #000000; }
  
    .formulario .checkbox label:before {
      border-radius: 3px; }
    .formulario .checkbox input[type="checkbox"] {
      display: none; }
      .formulario .checkbox input[type="checkbox"]:checked + label:before {
        display: none; }
      .formulario .checkbox input[type="checkbox"]:checked + label {
        background: #000000;
        color: white;
        padding: 5px 15px; }
  </style>
@endpush



{{-- informacion --}}
<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
          <h3>Permisos del Admin</h3>
          <button type="button" class="btn btn-info btn-block hh" data-toggle="modal" data-target="#myModalAdmin">
            Agregar Admin
          </button>
      </div>
    </div>
    <div class="box-body">
      {{-- listado --}}
        @include('setting.componentes.tablaPermiso')
    </div>
  </div>
</div>

{{-- modal admin --}}
@include('setting.componentes.formAdmin')

{{-- modal permiso --}}
<div class="modal fade" id="Modalpermiso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-content">

    </div>
  </div>
</div>

{{-- script para la tabla --}}
@include('usuario.componentes.scritpTable')
@endsection

@push('script')
    
<script>
  
    function modal_permiso(ID) {
      let url = '{{url("admin/settings/getpermisos")}}/' + ID
      $.get(url, function (response) {
        $('#modal-content').html(response)
        $('#Modalpermiso').modal('show')
      })
    }
  </script>
@endpush