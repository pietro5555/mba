<div class="col-md-12">
    <div class="box box-info" style="border-radius: 10px;">
        <div class="box-body">

      <h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #28a745; color: white;">Informacion de Contacto

     @if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)
    <button type="button" class="btn btn-success" onclick="activarContacto();"
        style="float: right !important;"><i class="fas fa-edit"></i> Editar</button>
        
        @endif
      </h3>      

<form action="{{ action($data['controler'], ['data' => 'contacto']) }}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <input name="id" type="hidden" value="{{$data['segundo']->ID}}">

    <div class="form-group form-group col-md-12 white">
        <label>Direccion Linea 1</label>

        <input name="dirección" type="text" placeholder="{{$data['segundo']->direccion}}" class="form-control contacto"
            value="{{$data['segundo']->direccion}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Direccion Linea 2</label>

        <input name="direccion2" type="text" placeholder="{{$data['segundo']->direccion2}}" class="form-control contacto"
            value="{{$data['segundo']->direccion2}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Pais</label>

        <input name="pais" type="text" placeholder="{{$data['segundo']->pais}}" class="form-control contacto"
            value="{{$data['segundo']->pais}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Estado</label>
        <input name="estado" type="text" placeholder="{{$data['segundo']->estado}}" class="form-control contacto"
            value="{{$data['segundo']->estado}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Ciudad</label>
        <input name="ciudad" type="text" placeholder="{{$data['segundo']->ciudad}}" class="form-control contacto"
            value="{{$data['segundo']->ciudad}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Codigo postal</label>
        <input name="codigo" type="number" placeholder="{{$data['segundo']->codigo}}" class="form-control contacto"
            value="{{$data['segundo']->codigo}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Celular</label>
        <input name="phone" type="number" placeholder="{{$data['segundo']->phone}}" class="form-control contacto"
            value="{{$data['segundo']->phone}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Telefono Fijo</label>
        <input name="fijo" type="number" placeholder="{{$data['segundo']->fijo}}" class="form-control contacto"
            value="{{$data['segundo']->fijo}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label for="">Correo</label>
        <input name="user_email" type="email" placeholder="{{$data['principal']->user_email}}" class="form-control contacto"
            value="{{$data['principal']->user_email}}" disabled>
        <div class="botom1" style="display: none;">
            <label for="">Confirmar Correo</label>
            <input name="user_email_confirmation" type="email" placeholder="{{$data['principal']->user_email}}"
                class="form-control contacto" value="{{$data['principal']->user_email}}">
        </div>
    </div>

    {{-- @if (Auth::user()->ID == $data['principal']->ID) --}}
    <div class="form-group col-md-12 white">
            <label for="">Clave</label>
            <input name="clave" type="password" placeholder="***********" class="form-control contacto" disabled>
            
            <div class="botom1" style="display: none;">
                <label for="">Confirmar Clave</label>
                <input name="clave_confirmation" type="password" placeholder="***********" class="form-control contacto">
            </div>
        </div>
    {{-- @endif --}}

        <div class="col-md-12" id="botom1" style="display: none;">
        <button type="button" class="btn btn-danger" onclick="cancelarContacto();"
            style="margin-top:5px; float: left !important; font-size: 12px;">cancelar</a>
            <button type="submit" class="btn green padding_both_small"
                style="margin-top:5px; margin-left:10px; margin-bottom: 20px;">Enviar</button>
         </div>
       </div>
     </div> 
    </div>   
</form>