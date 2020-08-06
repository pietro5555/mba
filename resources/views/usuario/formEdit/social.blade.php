<div class="col-md-12">
    @if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)  
    <button type="button" class="btn green padding_both_small" onclick="modalCodigo(2, 'social');"
        style="margin-top:5px; float: right !important;">Editar</button>
        
        @endif
</div>
<form action="{{ action($controler, ['data' => 'social']) }}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <input name="id" type="hidden" value="{{$data['segundo']->ID}}">

    
    <div class="form-group" style="margin-bottom: 15px;">
  <label class="control-label" for="email">Facebook</label>
  <div class="input-group">
<div class="input-group-addon">
  <i class="fab fa-facebook" style="color: #367fa9;"></i>
</div>
<input name="facebook" type="text" placeholder="{{$data['segundo']->facebook}}" class="form-control social"
            value="{{$data['segundo']->facebook}}" disabled>
  </div>
</div>


<div class="form-group" style="margin-bottom: 15px;">
  <label class="control-label" for="email">Twitter</label>
  <div class="input-group">
<div class="input-group-addon">
  <i class="fab fa-twitter" style="color: #33D4FF;"></i>
</div>
<input name="twitter" type="text" placeholder="{{$data['segundo']->twitter}}" class="form-control social"
            value="{{$data['segundo']->twitter}}" disabled>
  </div>
</div>

<div class="form-group" style="margin-bottom: 15px;">
  <label class="control-label" for="email">Instagram</label>
  <div class="input-group">
<div class="input-group-addon">
  <i class="fab fa-instagram" style="color: #833AB4;"></i>
</div>
<input name="instagram" type="text" placeholder="{{$data['segundo']->instagram}}" class="form-control social"
            value="{{$data['segundo']->instagram}}" disabled>
  </div>
</div>


<div class="form-group" style="margin-bottom: 15px;">
  <label class="control-label" for="email">Youtube</label>
  <div class="input-group">
<div class="input-group-addon">
  <i class="fab fa-youtube" style="color: red;"></i>
</div>
<input name="youtube" type="text" placeholder="{{$data['segundo']->youtube}}" class="form-control social"
            value="{{$data['segundo']->youtube}}" disabled>
  </div>
</div>


<div class="form-group" style="margin-bottom: 15px;">
  <label class="control-label" for="email">Linkedin</label>
  <div class="input-group">
<div class="input-group-addon">
  <i class="fab fa-linkedin" style="color: blue;"></i>
</div>
<input name="linkedin" type="text" placeholder="{{$data['segundo']->linkedin}}" class="form-control social"
            value="{{$data['segundo']->linkedin}}" disabled>
  </div>
</div>

    <div class="col-md-12" id="botom2" style="display: none;">
        <button type="button" class="btn btn-danger" onclick="cancelarSocial();"
            style="margin-top:5px; float: left !important; font-size: 12px;">cancelar</button>
        <button type="submit" class="btn green padding_both_small"
            style="margin-top:5px; margin-left:10px;">Enviar</button>
    </div>

</form>