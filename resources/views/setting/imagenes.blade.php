@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-body">
            
            <div class="col-xs-12">
    {{-- bono activacion --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title white">
                <h3>Avatares del árbol</h3>
                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#cargarimagenes">
                    Agregar Nuevos Avatares
                </button>
                
                <button type="button" class="btn btn-info btn-block" id="imagenesmodal">
                    Cambiar Avatares
                </button>
            </div>
        </div>
        
        <div class="box-body">
            
           <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center white">Avatar Mujer Activa</h3>
          <h5 class="text-center">
            <img src="{{ asset('/arbol/'.$avatares->activo_mujer)}}" class="circular-avatar" alt="">
          </h5>
        </div>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div class="fav"> 
          <h3 class="text-center white">Avatar Hombre Activo</h3>
          <h5 class="text-center">
            <img src="{{ asset('/arbol/'.$avatares->activo_hombre)}}" alt="" class="circular-avatar">
          </h5>
        </div>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center white">Avatar Mujer Inactiva</h3>
          <h5 class="text-center">
            <img src="{{ asset('/arbol/'.$avatares->inactivo_mujer)}}" alt="" class="circular-avatar">
          </h5>
        </div>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center white">Avatar Hombre Inactivo</h3>
          <h5 class="text-center">
            <img src="{{ asset('/arbol/'.$avatares->inactivo_hombre)}}" alt="" class="circular-avatar">
          </h5>
        </div>
      </div>
      
      
           </div>
            
            </div>
            </div>
        </div>
    </div>
</div>