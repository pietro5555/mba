<div class="col-md-12">
    @if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)
    <button type="button" class="btn green padding_both_small" onclick="modalCodigo(0, 'personal');"
        style="margin-top:5px; float: right !important;">Editar</button>
        @endif
</div>
<form action="{{ action($controler, ['data' => 'general']) }}" method="post" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}


    <input name="id" type="hidden" value="{{$data['segundo']->ID}}">

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Nombre</label>

        <input name="firstname" type="text" placeholder="{{$data['segundo']->firstname}}" class="form-control personal"
            value="{{$data['segundo']->firstname}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Apellido</label>

        <input name="lastname" type="text" placeholder="{{$data['segundo']->lastname}}" class="form-control personal"
            value="{{$data['segundo']->lastname}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>N° de Documento de Identidad</label>

        <input name="n_document" type="text" placeholder="N° de Documento de Identidad" class="form-control personal"
            value="{{$data['segundo']->document}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Genero</label>

        <select class="form-control personal form-control personal-solid placeholder-no-fix form-group" name="genero"
            value="{{$data['segundo']->genero}}" disabled>
            <option value="M" id="M" @if($data['segundo']->genero == 'M' ) selected @endif>Masculino</option>
            <option value="F" id="F" @if($data['segundo']->genero == 'F' ) selected @endif>Femenino</option>
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Fecha de nacimiento</label>
        <input name="edad" type="date" placeholder="Edad" class="form-control personal"
            value="{{$data['segundo']->edad}}" disabled>
    </div>


    <div class="form-group" style="margin-bottom: 15px;">
        <label>Biografia</label>
        <textarea name="biografia" class="form-control personal" disabled>{{(!empty($data['segundo']->biografia)) ? $data['segundo']->biografia : '' }}</textarea>
    </div>

    @if (Auth::user()->rol_id == 0)
    <div class="form-group" style="margin-bottom: 15px;">
        <label>ID Patrocinado</label>
        <input name="id_referred" type="number" placeholder="patrocinador" class="form-control personal"
            value="{{$data['principal']->referred_id}}" disabled>
    </div>
    <div class="form-group" style="margin-bottom: 15px;">
        <label>ID Posicionamiento</label>
        <input name="id_position" type="number" placeholder="posicionamiento" class="form-control personal"
            value="{{$data['principal']->position_id}}" disabled>
    </div>
    @endif

    <div class="col-md-12" id="botom0" style="display: none;">
        <button type="button" class="btn btn-danger padding_both_small" onclick="cancelarPersonal();"
            style="margin-top:5px; float: left !important; font-size: 12px;">cancelar</button>
        <button class="btn btn-info padding_both_small" style="margin-top:5px; margin-left:10px;">Enviar</button>
    </div>

</form>